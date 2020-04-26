define([
    "jquery",
    "mage/calendar"
], function ($) {
    "use strict";

    return function (config, element) {
        var self = this;
    	$(element).calendar({
                dateFormat:this.config.dateFormat,
                buttonText: this.config.buttonText,
            	minDate: new Date(),
                showsTime: false,
            } 
        );
    }
});
