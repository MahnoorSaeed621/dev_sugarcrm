({

    /**
     * @inheritdoc
     */
    tagName: 'table',

    /**
     * @inheritdoc
     */
    className: 'table dataTable quote-data-list-table',
    /**
     * The colspan value for the list
     */
    listColSpan: 0,
    

    /**
     * @inheritdoc
     */
    initialize: function (options) {
        this._super('initialize', [options]);

        var listMeta = app.metadata.getView('Contacts', 'attendee-data-list');
        if (listMeta && listMeta.panels && listMeta.panels[0].fields) {
            this.listColSpan = listMeta.panels[0].fields.length;
        }

    },

    /**
     * @inheritdoc
     */
    bindDataChange: function () {
        this.model.on('change:attendees_items', this.render, this);
        if (this.context.get('create') && this.context.get('copy')) {
                this.copyItemCount = this.model.get('attendees_items').length;

                if (this.copyItemCount) {
                    this.toggleCopyAlert(true);
                }
                
                // set this function to happen async after the alert has been displayed
                _.delay(_.bind(function() {
                    this.toggleCopyAlert(false);
                }, this), 1000);
        }
    },

    /**
     * Toggles showing and hiding the "Copying Attendee" alert when using the Copy functionality
     *
     * @param {boolean} showAlert True if we need to show alert, false if we need to dismiss it
     */
    toggleCopyAlert: function(showAlert) {
        var alertId = 'classes_copy_alert';
        var titleLabel;

        if (showAlert) {
            titleLabel = this.copyItemCount > 8 ?
                'LBL_CLASS_COPY_ALERT_MESSAGE_LONG_TIME' :
                'LBL_CLASS_COPY_ALERT_MESSAGE';

            app.alert.show(alertId, {
                level: 'process',
                closeable: false,
                autoClose: false,
                title: app.lang.get(titleLabel, 'dev_Online_Classes')
            });
        } else {
            app.alert.dismiss(alertId);
        }
    },

    /**
     * @inheritdoc
     */
    _render: function () {
        this._super('_render');

        if (!this.$el.parent().hasClass('flex-list-view-content')) {
            cssClasses = 'flex-list-view-content';
            if (this.isCreateView) {
                cssClasses += ' create-view';
            }
            this.$el.wrap(
                    '<div class="' + cssClasses + '"></div>'
                    );
            this.$el.parent().wrap(
                    '<div class="flex-list-view left-actions quote-data-table-scrollable"></div>'
                    );
        }
    },

})
