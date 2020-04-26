define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'mage/calendar'
    ],
    function($, ko, Component) {
        'use strict';

        $.extend(true, $, {
            calendarConfig: {
                serverTimezoneOffset: parseInt(window.checkoutConfig.ace_delivery_time_zone)
            }
        });

        return Component.extend({
            defaults: {
                template: 'Ace_OrderDeliveryDate/order-delivery-date'
            },

            aceOrderDeliveryEnable: ko.observable(window.checkoutConfig.ace_order_delivery_enable),

            aceOrderDeliveryTimeSlot: ko.observable(window.checkoutConfig.ace_has_delivery_timeslot),

            listOrderDeliveryTimeSlot: function() {
                var listTimeSlot = window.checkoutConfig.ace_order_delivery_timeslot;
                var newTimeSlotArray = [];
                $.each(listTimeSlot, function(index, value) {
                    newTimeSlotArray[index] = value.value;
                });
                return newTimeSlotArray;
            },

            initDeliveryDate: function () {
                var self = this,
                    image = '',
                    icon = false;
                if (window.checkoutConfig.ace_delivery_icon) {
                    image = window.checkoutConfig.ace_delivery_icon;
                    icon = true;
                }
                $("#delivery_date").calendar({
                    showsTime: false,
                    controlType: 'select',
                    showOn: "button",
                    buttonImage: image,
                    buttonImageOnly: icon,
                    buttonText: "Select date",
                    dateFormat: window.checkoutConfig.ace_delivery_date_fomat,
                    beforeShowDay: self.configDate
                });
            },

            configDate: function (date) {
                var minTime = jQuery.datepicker._getTimezoneDate().getTime() + (window.checkoutConfig.ace_delivery_process_time - 1) * 60 * 60 * 24 * 1000;
                if (date.getTime() < minTime) {
                    return false;
                }
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return[true, ''];
           
            }
        });
    }
);
