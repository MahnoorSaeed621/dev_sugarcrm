({
    extendsFrom: 'CreateView',

    /**
     * @inheritdoc
     */
    initialize: function (options) {
        this._super('initialize', [options]);

    },

    /**
     * Override to populate related Attendee items before saving
     * @inheritdoc
     */
    getCustomSaveOptions: function (options) {

        if (this.model.get('attendees_items').length > 0 && this.model._relatedCollections.dev_online_classes_contacts._create.length == 0) {
            this.populateDataOnRecordCopy();
            return options;
        }

        if (this.model.get('attendees_items').length > 0 || this.model._relatedCollections.dev_online_classes_contacts._create.length > 0) {
            this.populateDataOnNewRecord();
        }
        return options;
    },

    /**
     * Sets related attendees on record copy
     * @returns {undefined}
     */
    populateDataOnRecordCopy: function () {
        this.updateAttendees();
        var attendees = this.model.get('attendees_items').models;
        var selectedContacts = {};
        selectedContacts.create = [];
        selectedContacts.add = [];
        selectedContacts.delete = [];
        _.each(attendees, _.bind(function (model) {
            selectedContacts.add.push(model.get('id'));
        }, this))
        this.model.set('dev_online_classes_contacts', selectedContacts);
        
    },

    /**
     * Sets related attendees on record copy
     * @returns {undefined}
     */
    populateDataOnNewRecord: function () {
        this.updateAttendees();
        var relatedModels = [];
            _.each(this.model._relatedCollections.dev_online_classes_contacts._create, _.bind(function (record) {
                relatedModels.push(record.attributes)
            }, this))
            var unique = this.getUniqueIDArray(relatedModels);
            this.model._relatedCollections.dev_online_classes_contacts._add = unique;
            this.model._relatedCollections.dev_online_classes_contacts._create = [];
    },

    updateAttendees: function(){
        var attendees = this.model.get('attendees_items').models;
        _.each(attendees, _.bind(function (model) {
            if(!_.isUndefined(model.changed) && Object.keys(model.changed).length > 0){
                model.save();
            }
        }, this))
    },
    
    /**
     * Returns unique array based on id
     * @param {type} array
     * @returns {Array}
     */
    getUniqueIDArray: function(array){
        var unique = [];
            for (i = 0; i < array.length; i++) {
                var isUnique = true;
                for (j = i + 1; j < array.length; j++) {
                    if (array[i].id == array[j].id) {
                        isUnique = false;
                    }
                }
                if (isUnique) {
                    unique.push(array[i]);
                }
            }
        return unique;    
    },
})
