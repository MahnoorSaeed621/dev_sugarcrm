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
    }
})
