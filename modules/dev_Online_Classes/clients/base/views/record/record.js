({
    extendsFrom: 'RecordView',

    /**
     * Track the number of items in edit mode.
     * @type {number}
     */
    editCount: 0,

    /**
     * Hashtable to keep track of id's in edit mode
     * @type {Object}
     */
    editIds: {},

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this._super('initialize', [options]);
    },

    /**
     * @inheritdoc
     */
    bindDataChange: function() {
        this._super('bindDataChange');
        this.context.on('classes:item:toggle', this._handleItemToggled, this);
    },

    /**
     * @inheritdoc
     *
     * Overrides the existing record duplicateClicked to handle the 
     * Attendees 
     */
    duplicateClicked: function() {
        var attendees;
        var loadViewObj;
        var classModelCopy;
        var classContextCollection;
        var mainDropdownBtn;

        if (this.editCount) {
            app.alert.show('quotes_qli_editmode', {
                level: 'error',
                title: '',
                messages: [app.lang.get('LBL_COPY_LINE_ITEMS', 'Quotes')]
            });

            return;
        }

        // get the Edit dropdown button
        mainDropdownBtn = this.getField('main_dropdown');
        // close the dropdown menu
        mainDropdownBtn.$el.removeClass('open');

        attendees = this.model.get('attendees_items');
        classModelCopy = app.data.createBean(this.model.module);
        classContextCollection = this.context.get('collection');

        classModelCopy.copy(this.model);
        classModelCopy.set('attendees_items',attendees);
        classModelCopy.modelView = 'edit';
          var relatedCollection = app.data.createRelatedCollection(classModelCopy, 'dev_online_classes_contacts');
            _.each(attendees, _.bind(function (model) {
                relatedCollection.add(model);
            }, this))

        loadViewObj = {
            action: 'edit',
            collection: classContextCollection,
            copy: true,
            create: true,
            layout: 'create',
            model: classModelCopy,
            module: 'dev_Online_Classes',
        };
        // lead the Online Classes create layout
        app.controller.loadView(loadViewObj);
        // update the browser URL with the proper
        app.router.navigate('#dev_Online_Classes/create', {trigger: false});
    },

    /**
     * handles keeping track how many items are in edit mode.
     * @param {boolean} isEdit
     * @param {number} id id of the row being toggled
     * @private
     */
    _handleItemToggled: function(isEdit, id) {
        if (isEdit) {
            if (_.isUndefined(this.editIds[id])) {
                this.editIds[id] = true;
                this.editCount++;
            }
        } else if (!isEdit && this.editCount > 0) {
            delete this.editIds[id];
            this.editCount--;
        }
    },

})
