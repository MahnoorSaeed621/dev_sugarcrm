({
    /**
     * @inheritdoc
     */
    events: {
        'click [name="create_attendee_button"]': '_onCreateAttendeeBtnClicked',
    },

    /**
     * @inheritdoc
     */
    className: 'quote-data-grand-totals-header-wrapper quote-totals-row',

    /**
     * Handles when the create Quoted Line Item button is clicked
     *
     * @param {MouseEvent} evt The mouse click event
     * @private
     */
    _onCreateAttendeeBtnClicked: function(evt) {
        this.layout.trigger('classes:attendee:create', this);
    },

})
