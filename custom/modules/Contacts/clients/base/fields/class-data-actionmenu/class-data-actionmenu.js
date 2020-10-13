({
    /**
     * @inheritdoc
     */
    extendsFrom: 'BaseActionmenuField',

    /**
     * Skipping ActionmenuField's override, just returning this.def.buttons
     *
     * @inheritdoc
     */
    _getChildFieldsMeta: function() {
        return app.utils.deepCopy(this.def.buttons);
    },
    /**
     * Overriding and not calling parent _loadTemplate as those are based off view/actions and we
     * specifically need it based off the modelView set by the parent layout for this row model
     *
     * @inheritdoc
     */
    _loadTemplate: function() {
        this.tplName = this.model.modelView || 'list';

        if (this.options.viewName === 'edit' && _.indexOf(['list'], this.action) < 0) {
            this.template = app.template.empty;
        } else {
            this.template = app.template.getField(this.type, this.tplName, this.module);
        }
    },
    /**
     * Triggers massCollection events to the context.parent
     *
     * @inheritdoc
     */
    toggleSelect: function(checked) {
        var event = !!checked ? 'mass_collection:add' : 'mass_collection:remove';
        this.model.selected = !!checked;
        this.context.trigger(event, this.model);        
    }
})
