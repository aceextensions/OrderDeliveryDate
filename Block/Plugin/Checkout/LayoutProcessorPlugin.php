<?php

namespace Ace\OrderDeliveryDate\Block\Plugin\Checkout;

use Ace\OrderDeliveryDate\Model\Config\Source\Displayat as Displayat;
use Ace\OrderDeliveryDate\Helper\Data as OrderDeliveryDateDataHelper;
use Magento\Checkout\Block\Checkout\LayoutProcessor;

class LayoutProcessorPlugin
{
    protected $helper;

    public function __construct(
        OrderDeliveryDateDataHelper $helper
    ) {
        $this->helper = $helper;
    }

    public function afterProcess(
        LayoutProcessor $subject,
        array $jsLayout
    ) {
        $container = null;
        if (!$this->helper->isEnabled()) {
            return $jsLayout;
        }
        if ($this->helper->getDisplayAt() == Displayat::DELIVERY_DATE_AT_SHIPPING_ADDRESS) {
            $container = 'before-form';
        } elseif ($this->helper->getDisplayAt() == Displayat::DELIVERY_DATE_AT_SHIPPING_METHOD) {
            $container = 'before-shipping-method-form';
        }
        $dateFormat = $this->helper->getDateFormat();
        // before place order
        if ($this->helper->getDisplayAt() == Displayat::DELIVERY_DATE_AT_REVIEW_PAYMENTS) {
            $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['beforeMethods']['children']['delivery-date'] = [
                                    'component' => 'Ace_OrderDeliveryDate/js/view/order-delivery-date',
                                    'displayArea' => 'delivery-date',
                                    'sortOrder' => 11
                                ];
        } else {
            $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
            ['shippingAddress']['children'][$container]['children']['delivery-date'] = [];

            $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
            ['shippingAddress']['children'][$container]['children']['delivery-date']['component'] = 'Ace_OrderDeliveryDate/js/view/order-delivery-date';
            
            $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
            ['shippingAddress']['children'][$container]['children']['delivery-date']['sortOrder'] = 10;
        }

        return $jsLayout;
    }
}
