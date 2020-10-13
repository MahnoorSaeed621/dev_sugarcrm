({
    /**
     * @inheritdoc
     */
    events: {
        'click [name="massdelete_button"]': '_onDeleteBtnClicked',
        'click [data-check=all]': 'checkAll'
    },

    /**
     * @inheritdoc
     */
    plugins: [
        'MassCollection',
        'Editable',
        'ErrorDecoration'
    ],

    /**
     * @inheritdoc
     */
    tagName: 'thead',

    /**
     * @inheritdoc
     */
    className: 'quote-data-list-header',

    /**
     * Array of left column fields
     */
    leftColumns: undefined,

    /**
     * Array of fields to use in the template
     */
    _fields: undefined,

    /**
     * If this view is currently in the /create view or not
     */
    isCreateView: undefined,

    /**
     * @inheritdoc
     */
    initialize: function (options) {
        this._super('initialize', [options]);

        this.layout.on('classes:attendee:fetch', this.setCollection, this);
        this.leftColumns = [];
        this.massCollection = this.collection;
        var attendeeListMetadata = app.metadata.getView('Contacts', 'attendee-data-list');
        if (attendeeListMetadata && attendeeListMetadata.panels) {
            this.meta.panels = attendeeListMetadata.panels;
        }

        _.each(this.meta.panels, function (panel) {
            _.each(panel.fields, function (field) {
                if (!field.labelModule) {
                    field.labelModule = 'dev_Online_Classes';
                }
            }, this);
        }, this);

        this.isCreateView = this.context.get('create') || false;

        if (this.isCreateView) {
            this.leftColumns.push({
                'type': 'fieldset',
                'fields': [],
                'value': false,
                'sortable': false
            });
        } else {
            this.addMultiSelectionAction();
        }
        this._fields = _.flatten(_.pluck(this.meta.panels, 'fields'));
    },
    

    /**
     * @inheritdoc
     */
    bindDataChange: function () {
        this._super('bindDataChange');
        this.context.on('classes:masscollection:init', this.initMassCollection, this);

        if (!this.isCreateView) {
            bundles = this.model.get('attendees_items');
            if (bundles) {
                bundles.on('change', this.test, this);
            }
        }
    },
    initMassCollection: function () {
        this.massCollection = this.collection;
    },
    /**
     * Called when items are added or removed from the massCollection. Handles checking or
     * unchecking the CheckAll checkbox 
     *
     * @param {Data.Bean} model The model that was added or removed
     * @param {Data.MixedBeanCollection} massCollection The mass collection on the context
     * @private
     */
    _massCollectionChange: function (model, massCollection) {
        var $checkAllField = this.$('[data-check=all]');

        if (massCollection.length === 0 && $checkAllField.length) {
            // uncheck the check-all box if there are no more items
            $checkAllField.prop('checked', false);
        }
    },

    /**
     * @inheritdoc
     */
    _render: function () {
        this._super('_render');
        this._setRowFields();
        if (this.massCollection) {
            // remove any Quotes models from the massCollectio
            this.massCollection.models = _.filter(this.massCollection.models, function(model) {
                return model.module !== 'dev_Online_Classes';
            });
        }
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
     * Handles checking and unchecking all items in the quote data list
     *
     * @param {jQuery.Event} event The click event from the input checkbox
     */
    checkAll: function (event) {
        console.log('checkAll');
        var $checkbox = $(event.currentTarget);

        if ($(event.target).hasClass('checkall') || event.type === 'keydown') {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
        }

        if ($checkbox.is(':checked')) {
            this.context.trigger('classes:collections:all:checked');
        } else {
            this.context.trigger('classes:collections:not:all:checked');
        }
    },

    /**
     * Returns if the bundles are empty or not
     *
     * @return {boolean} True if bundles are empty, false if any bundle contains an item
     * @private
     */
    _bundlesAreEmpty: function () {
        var items = this.model.get('attendees_items');
        return items.length === 0;
    },

    /**
     * Adds the left column fields
     */
    addMultiSelectionAction: function () {
        var _generateMeta = function (buttons, disableSelectAllAlert) {
            return {
                name: 'quote-data-mass-actions',
                type: 'fieldset',
                fields: [
                    {
                        type: 'class-data-actionmenu',
                        buttons: buttons || [],
                        disable_select_all_alert: !!disableSelectAllAlert
                    }
                ],
                value: false,
                sortable: false
            };
        };
        var buttons = this.meta.selection.actions;
        var disableSelectAllAlert = !!this.meta.selection.disable_select_all_alert;
        this.leftColumns.push(_generateMeta(buttons, disableSelectAllAlert));
    },

    /**
     * Handles when the Delete button is clicked
     *
     * @param {MouseEvent} evt The mouse click event
     * @private
     */
    _onDeleteBtnClicked: function (evt) {
        var deleteConfirmMsg = 'LBL_ALERT_CONFIRM_DELETE';
        if (this.massCollection.models.length > 0) {

            app.alert.show('confirm_delete', {
                level: 'confirmation',
                title: app.lang.get('LBL_ALERT_TITLE_WARNING') + ':',
                messages: [app.lang.get(deleteConfirmMsg, '')],
                onConfirm: _.bind(function () {
                    app.alert.show('deleting_attendee_item', {
                        level: 'info',
                        messages: [app.lang.get('LBL_ALERT_DELETING_ATTENDEE', this.module)]
                    });
                    this.context.trigger('classes:selected:delete', this.massCollection);
                }, this)
            });
        } else {
            app.alert.show('no_attendee', {
                level: 'error',
                title: '',
                messages: [
                    app.lang.get('LBL_DELETE_NOTHING_SELECTED', this.module)
                ]
            });
        }
    },

})
