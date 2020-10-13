({
    extendsFrom: 'EditablelistbuttonField',

    oldModelID: '',
    /**
     * Overriding EditablelistbuttonField's Events with mousedown instead of click
     */
    events: {
        'mousedown [name=inline-save]': 'saveClicked',
        'mousedown [name=inline-cancel]': 'cancelClicked',
    },

    initialize: function (options) {
        this._super('initialize', [options]);
        this.oldModelID = this.model.id;
    },

    /**
     * @inheritdoc
     */
    _render: function () {
        this._super('_render');

        if (_.isUndefined(this.changed) && this.model.isNew()) {
            // when adding additional items to the list, causing additional renders,
            // this.changed gets set undefined on re-initialize, so we need to make sure
            // if this is an unsaved model and this.changed is undefined, that we set changed true
            this.changed = true;
        }


        if (this.tplName === 'edit') {
            this.$el.closest('.left-column-save-cancel').addClass('higher');
        } else {
            this.$el.closest('.left-column-save-cancel').removeClass('higher');
        }
    },

    /**
     * Overriding and not calling parent _loadTemplate as those are based off view/actions and we
     * specifically need it based off the modelView set by the parent layout for this row model
     *
     * @inheritdoc
     */
    _loadTemplate: function () {
        if (this.context.get('create')) {
            this.tplName = 'edit';
            this.action = 'edit';
        } else {

            this.tplName = this.model.modelView || 'list';
        }

        if (this.view.action === 'list' && _.indexOf(['edit', 'disabled'], this.action) < 0) {
            this.template = app.template.empty;
            var parent = this.$el.parent().parent().parent().parent().find('.left-column-buttons');
            $(parent).css('display', 'inline-block');
        } else {
            var parent = this.$el.parent().parent().parent().parent().find('.left-column-buttons');
            $(parent).css('display', 'none');
            this.template = app.template.getField(this.type, this.tplName, this.module);
        }
    },

    /**
     * @inheritdoc
     */
    cancelEdit: function () {
        if (this.isDisabled()) {
            this.setDisabled(false);
        }
        this.changed = false;
        this.model.revertAttributes();
        this.view.clearValidationErrors();

        // this is the only line I had to change
        this.view.toggleRow(this.model.module, this.model.cid, false);

        // trigger a cancel event across the view layout so listening components
        // know the changes made in this row are being reverted
        if (this.view.layout) {
            this.view.layout.trigger('editablelist:' + this.view.name + ':cancel', this.model);
        }
    },

    /**
     * Called after the save button is clicked and all the fields have been validated,
     * triggers an event for
     *
     * @inheritdoc
     */
    _save: function () {
        this._saveRowModel();
    },

    /**
     * Saves the row's model
     *
     * @private
     */
    _saveRowModel: function () {
        var oldModelId = this.oldModelID;
        //if model is new
        if (_.isUndefined(oldModelId)) {
            //add link in with selected model
            this.view.layout.trigger('editablelist:' + this.view.name + ':addRow', this.model);
            return;
        }

        //if model has been changed
        //unlink previous one and link new one
        if (oldModelId !== this.model.id) {
            this.view.layout.trigger('editablelist:' + this.view.name + ':newSave', this.model, oldModelId);
            return;
        }

        var self = this;
        var successCallback = function (model) {
            self.changed = false;
            self.model.modelView = 'list';
            if (self.view.layout) {
                self.view.layout.trigger('editablelist:' + self.view.name + ':save', self.model, oldModelId);
            }

        };
        var options = {
            success: successCallback,
            error: function (error) {
                if (error.status === 409) {
                    app.utils.resolve409Conflict(error, self.model, function (model, isDatabaseData) {
                        if (model) {
                            if (isDatabaseData) {
                                successCallback(model);
                            } else {
                                self._save();
                            }
                        }
                    });
                }
            },
            complete: function () {
                // remove this model from the list if it has been unlinked
                if (self.model.get('_unlinked')) {
                    self.collection.remove(self.model, {silent: true});
                    self.collection.trigger('reset');
                    self.view.render();
                } else {
                    self.setDisabled(false);
                }
            },
            lastModified: self.model.get('date_modified'),
            //Show alerts for this request
            showAlerts: {
                'process': true,
                'success': {
                    messages: app.lang.get('LBL_RECORD_SAVED', self.module)
                }
            },
            relate: this.model.link ? true : false
        };

        options = _.extend({}, options, this.getCustomSaveOptions(options));
        this.model.save({}, options);
    },

    /**
     * @inheritdoc
     */
    _validationComplete: function (isValid) {
        if (!isValid) {
            this.setDisabled(false);
            return;
        }
        // also need to make sure the model.changed is empty as well
        if (!this.changed && !this.model.changed) {
            this.cancelEdit();
            return;
        }

        this._save();
    }
});
