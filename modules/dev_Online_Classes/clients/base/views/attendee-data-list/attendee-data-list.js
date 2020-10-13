({
    /**
     * @inheritdoc
     */
    events: {
        'click [name="edit_row_button"]': '_onEditRowBtnClicked',
        'click [name="delete_row_button"]': '_onDeleteRowBtnClicked'
    },

    /**
     * @inheritdoc
     */
    plugins: [
        'Editable',
        'ErrorDecoration',
        'MassCollection',
        'SugarLogic',
    ],
    /**
     * @inheritdoc
     */
    tagName: 'tbody',

    /**
     * @inheritdoc
     */
    className: 'quote-data-group',

    /**
     * Array of fields to use in the template
     */
    _fields: undefined,

    /**
     * Array of left column fields
     */
    leftColumns: undefined,

    /**
     * Array of left column fields
     */
    leftSaveCancelColumn: undefined,

    /**
     * List of current inline edit models.
     */
    toggledModels: null,

    /**
     * Object containing the row's fields
     */
    rowFields: {},

    /**
     * Attendees List metadata
     */
    attendeeListMetadata: undefined,

    /**
     * Track all the SugarLogic Contexts that we create for each record in bundle
     *
     * @type {Object}
     */
    sugarLogicContexts: {},

    /**
     * Track the module dependencies for the line item, so we dont have to fetch them every time
     *
     * @type {Object}
     */
    moduleDependencies: {},

    /**
     * If this view is currently in the /create view or not
     */
    isCreateView: undefined,

    /**
     * CSS Classes for sortable rows
     */
    sortableCSSClass: 'sortable ui-sortable',

    /**
     * CSS Classes for non-sortable rows
     */
    nonSortableCSSClass: 'not-sortable',
    /**
     * Contains any current bulk save requests being processed
     */
    currentBulkSaveRequests: undefined,
    /**
     * @inheritdoc
     */
    initialize: function (options) {

        this.attendeeListMetadata = app.metadata.getView('Contacts', 'attendee-data-list');
        // make sure we're using the layout's model
        options.model = options.model || options.layout.model;
        options.collection = options.model.get('attendees_items');

        this._super('initialize', [options]);
        var relatedCollection = this.model.getRelatedCollection('dev_online_classes_contacts');
        this.isCreateView = this.context.get('create') || false;

        var self = this;
        relatedCollection.fetch({relate: true, success: function () {
                self.context.trigger('classes:masscollection:init', this);
                self.context.collection = self.model.get('attendees_items');
                self.collection = self.model.get('attendees_items');
            }});

        this.collection = this.model.get('attendees_items');
        this.action = 'list';
        this.viewName = this.isCreateView ? 'edit' : 'list';
        // combine attendeeListMetadata's panels into this.meta
        this.meta = _.extend(this.meta, this.attendeeListMetadata);
        this._fields = _.flatten(_.pluck(this.attendeeListMetadata.panels, 'fields'));

        this.toggledModels = {};
        this.leftColumns = [];
        this.leftSaveCancelColumn = [];
        this.addMultiSelectionAction();

        this.events = _.extend({
            'hidden.bs.dropdown .actions': 'resetDropdownDelegate',
            'shown.bs.dropdown .actions': 'delegateDropdown'
        }, this.events);

        this.el = this.layout.el;
        this.setElement(this.el);

        this.isEmptyGroup = this.collection.length === 0;

        // for each item in the collection, setup SugarLogic
        var collections = this.model.fields['attendees_items'].links;
        _.each(collections, function (link) {
            var collection = this.model.getRelatedCollection(link);
            if (collection) {
                this.setupSugarLogicForModelOrCollection(collection);
            }
        }, this);

        // listen directly on the parent Layout
        this.layout.layout.on('classes:attendee:create', this.onAddNewAttendeeItem, this);
        this.layout.on('editablelist:' + this.name + ':cancel', this.onCancelRowEdit, this);
        this.layout.on('editablelist:' + this.name + ':newSave', this.onSaveRowEdit, this);
        this.layout.on('editablelist:' + this.name + ':addRow', this.onSaveNewRowEdit, this);
        this.layout.on('editablelist:' + this.name + ':saving', this.onSavingRow, this);
        this.context.on('classes:collections:all:checked', this.onAllChecked, this);
        this.context.on('classes:collections:not:all:checked', this.onNotAllChecked, this);
    },

    /**
     * Called when a Create Attendee button is clicked
     */
    onAddNewAttendeeItem: function () {
        var linkName = 'dev_online_classes_contacts';
        var modelData = {};
        var relatedModel = app.data.createRelatedBean(this.model, null, linkName);
        var moduleName = 'Contacts';

        modelData = _.extend({
            _module: moduleName,
            _link: linkName,
            dev_online_classes_contactsdev_online_classes_ida: this.model.get('id')
        });

        relatedModel.module = moduleName;

        // set a few items on the model
        relatedModel.set(modelData);

        // this model's fields should be set to render
        relatedModel.modelView = 'edit';

        // add model to toggledModels to be toggled next render
        this.toggledModels[relatedModel.cid] = relatedModel;

        var attendees_items = this.model.get('attendees_items');
        attendees_items.add(relatedModel);
        this.model.set('attendees_items', attendees_items);

        // adding to the collection will trigger the render
        this.collection.add(relatedModel);

        $relatedRow = this.$('tr[name="' + relatedModel.module + '_' + relatedModel.id + '"]');
        if ($relatedRow.length) {
            if (this.isCreateView) {
                $relatedRow.addClass(this.sortableCSSClass);
            } else {
                $relatedRow.addClass(this.nonSortableCSSClass);
            }
        }

        this.onNewItemChanged();
    },

    /**
     * handler for when the select all checkbox is checked
     */
    onAllChecked: function () {
        //iterate over all of the masscollection checkboxes and check the ones that are unchecked.
        _.each(this.$('div.checkall input'), function (item) {
            var $item = $(item);
            //only trigger if the item isn't checked.
            if (!$item.prop('checked')) {
                $item.trigger('click');
            }
        });
    },

    /**
     * handler for when the select all checkbox is unchecked
     */
    onNotAllChecked: function () {
        //iterate over all of the masscollection checkboxes and uncheck the ones that are checked.
        _.each(this.$('div.checkall input'), function (item) {
            var $item = $(item);
            //only trigger if the item IS checked.
            if ($item.prop('checked')) {
                $item.trigger('click');
            }
        });
    },

    /**
     * Resets the dropdown css
     * @param e
     */
    resetDropdownDelegate: function (e) {
        var $b = this.$(e.currentTarget).first();
        $b.parent().closest('.action-button-wrapper').removeClass('open');
    },

    /**
     * Fixes z-index for dropdown
     * @param e
     */
    delegateDropdown: function (e) {
        var $buttonGroup = this.$(e.currentTarget).first();
        // add open class to parent list to elevate absolute z-index for iOS
        $buttonGroup.parent().closest('.action-button-wrapper').addClass('open');
    },

    /**
     * Adds the left column fields
     */
    addMultiSelectionAction: function () {
        var _generateMeta = function (buttons, disableSelectAllAlert) {
            return {
                'type': 'fieldset',
                'fields': [
                    {
                        'type': 'class-data-actionmenu',
                        'buttons': buttons || [],
                        'disable_select_all_alert': !!disableSelectAllAlert
                    }
                ],
                'value': false,
                'sortable': false
            };
        };
        var buttons = this.meta.selection.actions;
        var disableSelectAllAlert = !!this.meta.selection.disable_select_all_alert;
        this.leftColumns.push(_generateMeta(buttons, disableSelectAllAlert));

        this.leftSaveCancelColumn.push({
            'type': 'fieldset',
            'label': '',
            'sortable': false,
            'fields': [{
                    type: 'class-data-editablelistbutton',
                    label: '',
                    tooltip: 'LBL_CANCEL_BUTTON_LABEL',
                    name: 'inline-cancel',
                    icon: 'fa-close',
                    css_class: 'btn-invisible inline-cancel ellipsis_inline'
                }]
        });

        // if this is the create view, do not add a save button
        if (!this.isCreateView) {
            this.leftSaveCancelColumn[0].fields.push({
                type: 'class-data-editablelistbutton',
                label: '',
                tooltip: 'LBL_SAVE_BUTTON_LABEL',
                name: 'inline-save',
                icon: 'fa-check-circle',
                css_class: 'btn-invisible inline-save ellipsis_inline'
            });
        }
    },

    /**
     * Handler for when a new QLI/Note row has been added and then canceled
     *
     * @param {Data.Bean} rowModel The row collection model that was created and now canceled
     */
    onCancelRowEdit: function (rowModel) {
        var rowId;

        if (rowModel.isNew() || this.isCreateView) {
            rowId = rowModel.cid;
            this.collection.remove(rowModel);
            this.collection.trigger('reset');
            if (!_.isUndefined(this.sugarLogicContexts[rowId])) {
                // cleanup any sugarlogic contexts
                this.sugarLogicContexts[rowId].dispose();
            }

        }

        this.onNewItemChanged();
    },

    onSaveNewRowEdit: function (rowModel) {
        if (!_.isUndefined(rowModel)) {
            rowModel.save();
            app.alert.show('saving_attendee', {
                level: 'process',
                autoClose: false,
            });
            var callbacks = {
                success: _.bind(this._updateFromRelationshipCall, this, true),
                complete: _.bind(function () {

                    app.alert.dismiss('saving_attendee');
                    app.alert.show('adding_attendee_item', {
                        level: 'success',
                        autoClose: true,
                        messages: app.lang.get('LBL_ADDED_ATTENDEE_ITEM_SUCCESS_MSG', this.module)
                    });

                }, this, true)
            };
            this.addRowRelation(rowModel.get('id'), callbacks);
        }
    },
    bindDataChange: function () {
        this._super('bindDataChange');
        this.context.on('classes:selected:delete', this._onDeleteSelectedItems, this);
        if (!this.isCreateView) {
            bundles = this.model.get('attendees_items');
            if (bundles) {
                bundles.on('change', this.updateCollection, this);
            }
        }

    },

    /**
     * Called when line items have been selected and user has clicked Delete Selected.
     * It prepares the group lists and models to be deleted and adds GET requests
     * for each group after the deletes
     *
     * @param {Data.MixedBeanCollection} massCollection The mass_collection from the attendee data list
     * @private
     */
    _onDeleteSelectedItems: function (massCollection) {
        var bulkRequests = [];
        var rowId;
        var url;

        _.each(massCollection.models, function (model) {
            if (model.link) {
                classId = model.link.bean.id;
                rowId = model.get('id');

                // remove this row from the list's toggledModels if it exists
                delete this.toggledModels[rowId];
                url = app.api.buildURL(model.module + '/' + rowId + '/link/' + model.link.name + '/' + classId);
                bulkRequests.push({
                    url: url.substr(4),
                    method: 'DELETE'
                });
            }
        }, this);

        if (bulkRequests.length) {
            this.currentBulkSaveRequests = bulkRequests;
            this._callBulkRequests(_.bind(this._onDeleteSelectedItemsSuccess, this, this.collection));
        }
    },

    /**
     * Called on success after _onDeleteSelectedItems sets up models to be deleted. This function
     * removes deleted models from the MassCollection and the group's layout, and updates group
     * models with updated data.
     *
     * @param {Data.MixedBeanCollection} massCollection The mass_collection from the attendee data list
     * @param {Array} bulkRequests The results from the BulkAPI calls
     * @private
     */
    _onDeleteSelectedItemsSuccess: function (massCollection, bulkRequests) {
        var model;
        var $checkAllCheckbox = this.$('.checkall input').first();

        if ($checkAllCheckbox.length && $checkAllCheckbox.is(':checked')) {
            // uncheck the CheckAll box after items are deleted
            $checkAllCheckbox.prop('checked', false);
        }

        app.alert.dismiss('deleting_attendee_item');
        app.alert.show('deleted_attendee_item', {
            level: 'success',
            autoClose: true,
            messages: [
                app.lang.get('LBL_DELETED_ATTENDEE_ITEM_SUCCESS_MSG', this.module)
            ]
        });
        _.each(bulkRequests, function (request) {
            model = massCollection.get(request.contents.record.id);
            if (model) {
                // remove the model from the massCollection
                massCollection.remove(model);
            }
        }, this);
        massCollection.trigger('reset');
    },

    /**
     * Calls the bulk request endpoint with an array of requests
     *
     * @param {Function} [successCallback] The success callback function
     * @private
     */
    _callBulkRequests: function (successCallback) {
        var successWrapper = {
            success: _.bind(successCallback, this)
        };
        app.api.call('create', app.api.buildURL(null, 'bulk'), {
            requests: this.currentBulkSaveRequests
        }, successWrapper);

        // reset currentBulkSaveRequests
        this.currentBulkSaveRequests = [];
    },
    updateCollection: function () {
        bundles = this.model.get('attendees_items');
        _.each(bundles.models, function (model) {
            if (!_.isUndefined(model.changed) && !_.isUndefined(model.changed.id) && Object.keys(model.changed).length > 0) {
                model.fetch({});
            }
        });

    },
    /**
     * Handles when a row is saved. Since newly added (but not saved) rows have temporary
     * id's assigned to them, this is needed to go back and fix row id html attributes and
     * also resets the rowFields with the new model's ID so rows toggle properly
     *
     * @param {Data.Bean} rowModel
     */
    onSaveRowEdit: function (rowModel, oldModelId) {
        this.deleteRowRelation(oldModelId, null);
        var modelId = rowModel.cid;
        var modelModule = rowModel.module;
        var onlineClassID = rowModel.get('dev_online_classes_contactsdev_online_classes_ida');
        var contactId = rowModel.get('id');
        var onlineClassModel = this.context.get('model');

        this.toggleCancelButton(false, rowModel.cid);
        this.toggleRow(modelModule, modelId, false);
        this.onNewItemChanged();

        if (onlineClassModel && rowModel.module === 'Contacts') {
            // when a new row is added if it does not have class ID already, set it
            if (_.isUndefined(onlineClassID)) {
                var callbacks = {
                    success: _.bind(this._updateFromRelationshipCall, this, true)
                };
                rowModel.save();
                this.addRowRelation(contactId, callbacks);
            }
        }

    },

    /**
     * Adds relation between given attendee and this class
     * @param {type} contactId
     * @param {type} callbacks
     * @returns {undefined}
     */
    addRowRelation: function (contactId, callbacks) {
        var onlineClassID = this.model.id;
        app.api.relationships('create', 'Contacts', {
            id: contactId,
            link: 'dev_online_classes_contacts',
            relatedId: onlineClassID,
        }, null, callbacks);
    },

    /**
     * Updates the attendee model and Class model based on Relationship API calls
     *
     * @param {boolean} updateClass If we should update the class record or not
     * @param {Object} response The API Data response
     * @private
     */
    _updateFromRelationshipCall: function (updateClass, response) {
        var record = response.record;
        var relatedRecord = response.related_record;
        var pbItems = this.model.get('attendees_items');
        var classModel = this.context.get('model');
        var relatedModel = '';
        _.each(pbItems.models, function (itemModel) {
            if (itemModel.get('id') === record.id) {
                delete this.toggledModels[record.id];
                relatedModel = itemModel;
                itemModel.modelView = 'list';
                itemModel.setSyncedAttributes(record);
                itemModel.set(record);
            }
        }, this);

        if (updateClass && classModel) {
            classModel.setSyncedAttributes(relatedRecord);
            classModel.set(relatedRecord);
            classModel.modelView = 'list';
        }
        if (!_.isEmpty(relatedModel)) {
            this.toggleRow('Contacts', relatedModel.cid, false);
            relatedModel.modelView = 'list';
            this.collection.add(relatedModel, {
                silent: true
            });
            this.collection.trigger('reset');

        }

    },

    /**
     * Handles when the row is being saved but has not been saved fully yet
     *
     * @param {boolean} disableCancelBtn If we should disable the button or not
     * @param {string} rowModelCid The model.cid of the row that is saving
     */
    onSavingRow: function (disableCancelBtn, rowModelCid) {
        // todo: SFA-4541 needs to add code in here to toggle fields to readonly
        this.toggleCancelButton(disableCancelBtn, rowModelCid);
    },

    /**
     * Toggles the cancel button disabled or not
     *
     * @param {boolean} disable If we should disable the button or not
     * @param {string} rowModelCid The model.cid of the row that needs its cancel button toggled
     */
    toggleCancelButton: function (disable, rowModelCid) {
        var cancelBtn = _.find(this.fields, function (field) {
            return field.name == 'inline-cancel' && field.model.cid === rowModelCid;
        });
        if (cancelBtn) {
            cancelBtn.setDisabled(disable);
        }
    },

    /**
     * Handles updating if we should show the empty row when QLI/Notes have
     * been created or canceled before saving
     */
    onNewItemChanged: function () {
        this.isEmptyGroup = this.collection.length === 0;
        this.toggleEmptyRow(this.isEmptyGroup);
    },

    /**
     * Toggles showing and hiding the empty-row message row
     *
     * @param {boolean} showEmptyRow True to show the empty row, false to hide it
     */
    toggleEmptyRow: function (showEmptyRow) {
        if (showEmptyRow) {
            this.$('.empty-row').removeClass('hidden');
        } else {
            this.$('.empty-row').addClass('hidden');
        }
    },

    /**
     * @inheritdoc
     */
    render: function () {
        this._super('render');

        //update isEmptyGroup after render and make sure we toggle the row properly
        this.isEmptyGroup = this.collection.length === 0;
        this.toggleEmptyRow(this.isEmptyGroup);
    },

    /**
     * Overriding _renderHtml to specifically place this template after the
     * attendee data group header
     *
     * @inheritdoc
     */
    _renderHtml: function () {
        var $el = this.$('.flex-list-row-header');
        var $trs;
        if ($el.length) {
            $trs = this.$('tr.quote-data-group-list');
            if ($trs.length) {
                $trs.remove();
            }
            $el.after(this.template(this));
        } else {
            this.$el.html(this.template(this));
        }
    },

    /**
     * @inheritdoc
     */
    _render: function () {
        this._super('_render');

        // set row fields after rendering to prep if we need to toggle rows
        this._setRowFields();

        if (!_.isEmpty(this.toggledModels)) {
            _.each(this.toggledModels, function (model, modelId) {
                this.toggleRow(model.module, modelId, true);
            }, this);
        }
    },

    /**
     * Handles when the Delete button is clicked
     *
     * @param {MouseEvent} evt The mouse click event
     * @private
     */
    _onEditRowBtnClicked: function (evt) {
        var row = this.isolateRowParams(evt);

        if (!row.id || !row.module) {
            return false;
        }

        this.toggleRow(row.module, row.id, true);
    },

    /**
     * Handles when the Delete button is clicked
     *
     * @param {MouseEvent} evt The mouse click event
     * @private
     */
    _onDeleteRowBtnClicked: function (evt) {
        var row = this.isolateRowParams(evt);

        if (!row.id || !row.module) {
            return false;
        }

        app.alert.show('confirm_delete', {
            level: 'confirmation',
            title: app.lang.get('LBL_ALERT_TITLE_WARNING') + ':',
            messages: [app.lang.get('LBL_ALERT_CONFIRM_DELETE')],
            onConfirm: _.bind(function () {
                app.alert.show('deleting_attendee_item', {
                    level: 'info',
                    messages: [app.lang.get('LBL_ALERT_DELETING_ATTENDEE', this.module)]
                });
                this._onDeleteRowModelFromList(this.collection.get(row.id));
            }, this)
        });
    },

    /**
     * Deletes the relation between given attendee and class
     * @param {type} rowID
     * @param {type} callbacks
     * @returns {undefined}
     */
    deleteRowRelation: function (rowID, callbacks) {
        var onlineClassID = this.model.id;
        app.api.relationships('delete', 'Contacts', {
            id: rowID,
            link: 'dev_online_classes_contacts',
            relatedId: onlineClassID,
        }, null, callbacks);
    },

    /**
     * Called when deleting a row is confirmed, this removes the model
     * from the collection
     *
     * @param {Data.Bean} deletedRowModel The model being deleted
     * @private
     */
    _onDeleteRowModelFromList: function (deletedRowModel) {
        var callbacks = {
            success: _.bind(function () {
                app.alert.dismiss('deleting_attendee_item');
                app.alert.show('deleting_attendee_item', {
                    level: 'success',
                    autoClose: true,
                    messages: app.lang.get('LBL_DELETED_ATTENDEE_ITEM_SUCCESS_MSG', this.module)
                });
                this.collection.remove(deletedRowModel, {
                    silent: true
                });
                this.collection.trigger('reset');

            }, this, true)
        };
        this.deleteRowRelation(deletedRowModel.id, callbacks);
    },

    /**
     * Parse out a row module and ID
     *
     * @param {MouseEvent} evt The mouse click event
     * @private
     */
    isolateRowParams: function (evt) {
        var $ulEl = $(evt.target).closest('ul');
        var rowParams = {};

        if ($ulEl.length) {
            rowParams.module = $ulEl.data('row-module');
            rowParams.id = $ulEl.data('row-model-id');
        }

        return rowParams;
    },

    /**
     * Toggle editable selected row's model fields.
     *
     * @param {string} rowModule The row model's module.
     * @param {string} rowModelId The row model's ID
     * @param {boolean} isEdit True for edit mode, otherwise toggle back to list mode.
     */
    toggleRow: function (rowModule, rowModelId, isEdit) {
        var toggleModel;
        var $row;

        // this.context.parent.trigger('quotes:item:toggle', isEdit, rowModelId);
        toggleModel = this.collection.find(function (model) {
            return (model.cid == rowModelId || model.id == rowModelId);
        });

        if (isEdit) {
            if (_.isUndefined(toggleModel)) {
                // its not there any more, so remove it from the toggledModels and return out from this method
                delete this.toggledModels[rowModelId];
                return;
            } else {
                toggleModel.modelView = 'edit';
                this.toggledModels[rowModelId] = toggleModel;
            }
        } else {
            if (this.toggledModels[rowModelId]) {
                this.toggledModels[rowModelId].modelView = 'list';
            }
            delete this.toggledModels[rowModelId];
        }

        $row = this.$('tr[name=' + rowModule + '_' + rowModelId + ']');
        $row.toggleClass('tr-inline-edit', isEdit);
        this.toggleFields(this.rowFields[rowModelId], isEdit);
    },

    /**
     * Set, or reset, the collection of fields that contains each row.
     *
     * This function is invoked when the view renders. It will update the row
     * fields once the `Pagination` plugin successfully fetches new records.
     *
     * @private
     */
    _setRowFields: function () {
        this.rowFields = {};
        _.each(this.fields, function (field) {
            if (field.model && field.model.cid && _.isUndefined(field.parent)) {
                this.rowFields[field.model.cid] = this.rowFields[field.model.cid] || [];
                this.rowFields[field.model.cid].push(field);
            }
        }, this);
    },

    /**
     * Overriding to allow panels to come from whichever module was passed in
     *
     * @inheritdoc
     */
    getFieldNames: function (module) {
        var fields = [];
        var panels;
        module = module || this.context.get('module');

        if (module === 'Contacts') {
            panels = _.clone(this.attendeeListMetadata.panels);
        }

        if (panels) {
            fields = _.reduce(_.map(panels, function (panel) {
                var nestedFields = _.flatten(_.compact(_.pluck(panel.fields, 'fields')));
                return _.pluck(panel.fields, 'name').concat(
                        _.pluck(nestedFields, 'name')).concat(
                        _.flatten(_.compact(_.pluck(panel.fields, 'related_fields'))));
            }), function (memo, field) {
                return memo.concat(field);
            }, []);
        }

        fields = _.compact(_.uniq(fields));

        var fieldMetadata = app.metadata.getModule(module, 'fields');
        if (fieldMetadata) {
            // Filter out all fields that are not actual bean fields
            fields = _.reject(fields, function (name) {
                return _.isUndefined(fieldMetadata[name]);
            });

            // we need to find the relates and add the actual id fields
            var relates = [];
            _.each(fields, function (name) {
                if (fieldMetadata[name].type == 'relate') {
                    relates.push(fieldMetadata[name].id_name);
                } else if (fieldMetadata[name].type == 'parent') {
                    relates.push(fieldMetadata[name].id_name);
                    relates.push(fieldMetadata[name].type_name);
                }
                if (_.isArray(fieldMetadata[name].fields)) {
                    relates = relates.concat(fieldMetadata[name].fields);
                }
            });

            fields = _.union(fields, relates);
        }

        return fields;
    },

    /**
     * Load and cache SugarLogic dependencies for a module
     *
     * @param {Data.Bean} model
     * @return {Array}
     * @private
     */
    _getSugarLogicDependenciesForModel: function (model) {
        var module = model.module;
        if (_.isUndefined(this.moduleDependencies[module])) {
            var dependencies;
            var moduleMetadata;
            //TODO: These dependencies would normally be filtered by view action. Need to make that logic
            // external from the Sugarlogic plugin. Probably somewhere in the SidecarExpressionContext class...
            // first get the module from the metadata
            moduleMetadata = app.metadata.getModule(module) || {};
            // load any dependencies found there
            dependencies = moduleMetadata.dependencies || [];
            // now lets check the record view to see if it has any local ones on it.
            if (moduleMetadata.views && moduleMetadata.views.record) {
                var recordMetadata = moduleMetadata.views.record.meta;
                if (!_.isUndefined(recordMetadata.dependencies)) {
                    dependencies = dependencies.concat(recordMetadata.dependencies);
                }
            }

            // cache the results so we don't have to do this expensive lookup any more
            this.moduleDependencies[module] = dependencies;
        }

        return this.moduleDependencies[module];
    },

    /**
     * Setup dependencies for a specific model.
     *
     * @param {Data.Bean} model
     * @param {Data.Collection} collection
     * @param {Object} options
     */
    setupSugarLogicForModelOrCollection: function (modelOrCollection) {
        var slContext;
        var isCollection = (modelOrCollection instanceof app.data.beanCollection);
        var dependencies = this._getSugarLogicDependenciesForModel(modelOrCollection);
        if (_.size(dependencies) > 0) {
            slContext = new SUGAR.expressions.SidecarExpressionContext(
                    this,
                    isCollection ? new modelOrCollection.model() : modelOrCollection,
                    isCollection ? modelOrCollection : false
                    );
            slContext.initialize(dependencies);
            var id = isCollection ? modelOrCollection.module : modelOrCollection.get('id') || modelOrCollection.cid;
            this.sugarLogicContexts[id] = slContext;
        }
    },

})
