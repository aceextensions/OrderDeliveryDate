<?php


namespace Ace\OrderDeliveryDate\Model\Config\Source;

/**
 * Class Displayat
 *
 * @package Ace\OrderDeliveryDate\Model\Config\Source
 */
class Displayat implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        return [['value' => 'Shipping Address', 'label' => __('Shipping Address')],['value' => 'Shipping Method', 'label' => __('Shipping Method')],['value' => 'Review & Payments', 'label' => __('Review & Payments')]];
    }

    public function toArray()
    {
        return ['Shipping Address' => __('Shipping Address'),'Shipping Method' => __('Shipping Method'),'Review & Payments' => __('Review & Payments')];
    }
}

