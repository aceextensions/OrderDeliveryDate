var config = {
    "map": {
        "*": {
            "Magento_Checkout/js/model/shipping-save-processor/default" : "Ace_OrderDeliveryDate/js/shipping-save-processor-override"
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'Ace_OrderDeliveryDate/js/model/place-order-deliverydate': true
            }
        }
    }
};
