<?php
namespace Ace\OrderDeliveryDate\Model\Config\Source;

class Dateformat implements \Magento\Framework\Data\OptionSourceInterface
{
    const DELIVERY_DATE_FORMAT_MM_DD_YY = 1;
    const DELIVERY_DATE_FORMAT_DD_MM_YY = 2;
    const DELIVERY_DATE_FORMAT_YY_MM_DD = 3;

    public function toOptionArray()
    {
        return [
            ['value' => self::DELIVERY_DATE_FORMAT_MM_DD_YY, 
             'label' => __('mm/dd/yy (ex: 12/05/2020)')],

            ['value' => self::DELIVERY_DATE_FORMAT_DD_MM_YY, 
             'label' => __('dd-mm-yy (ex: 05-12-2020)')],

            ['value' => self::DELIVERY_DATE_FORMAT_YY_MM_DD, 
             'label' => __('yy-mm-dd (ex: 2020-12-05)')],
        ];
    }
}
