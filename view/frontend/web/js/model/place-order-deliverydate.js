define(
    [
        'jquery',
        'mage/utils/wrapper',
        'Magento_Checkout/js/model/quote'
    ],
    function ($, wrapper, quote) {
        'use strict';

        return function (placeOrderAction) {
            return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, redirectOnSuccess, messageContainer) {
                var billingAddress = quote.billingAddress();
                if (billingAddress['extension_attributes'] === undefined) {
                    billingAddress['extension_attributes'] = {};
                }
                if ($('.checkout-payment-method #delivery_date').length > 0) {
                    var order_date = '',
                        order_time_slot = '';
           
                    if ($('#delivery_date').val()) {
                        billingAddress['extension_attributes']['delivery_date'] = $('#delivery_date').val();
                    }
                    if ($('#delivery_timeslot').length > 0 && $('#delivery_timeslot').val()) {
                        billingAddress['extension_attributes']['delivery_timeslot'] = $('#delivery_timeslot').val();
                    }
                }
                return originalAction(paymentData, redirectOnSuccess, messageContainer);
            });
        };
    }
);
