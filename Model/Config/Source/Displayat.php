<?php


namespace Ace\OrderDeliveryDate\Model\Config\Source;

/**
 * Class Displayat
 *
 * @package Ace\OrderDeliveryDate\Model\Config\Source
 */
class Displayat implements \Magento\Framework\Data\OptionSourceInterface
{

    const DELIVERY_DATE_AT_SHIPPING_ADDRESS = 0;
    const DELIVERY_DATE_AT_SHIPPING_METHOD = 1;
    const DELIVERY_DATE_AT_REVIEW_PAYMENTS = 2;

    /**
     * Return array of options as value-label pairs
     *
     * @return void
     */
    public function toOptionArray()
    {
        return [['value' => self::DELIVERY_DATE_AT_SHIPPING_ADDRESS, 'label' => __('Shipping Address')],
                ['value' => self::DELIVERY_DATE_AT_SHIPPING_METHOD, 'label' => __('Shipping Method')],
                ['value' => self::DELIVERY_DATE_AT_REVIEW_PAYMENTS, 'label' => __('Review & Payments')]];
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return void
     */
    public function toArray()
    {
        return [self::DELIVERY_DATE_AT_SHIPPING_ADDRESS => __('Shipping Address'),
                self::DELIVERY_DATE_AT_SHIPPING_METHOD => __('Shipping Method'),
                self::DELIVERY_DATE_AT_REVIEW_PAYMENTS => __('Review & Payments')];
    }
}

