<?php
declare(strict_types=1);
namespace Aceextensions\OrderDeliveryDate\Model\Config\Source;

class TimeslotsColumn implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Return array of options as value-label pairs
     *
     * @return void
     */
    public function toOptionArray()
    {
        return [
            ['value' => '12:00 AM','label' => '12:00 AM'],
            ['value' => '12:30 AM','label' => '12:30 AM'],
            ['value' => '01:00 AM','label' => '01:00 AM'],
            ['value' => '01:30 AM','label' => '01:30 AM'],
            ['value' => '02:00 AM','label' => '02:00 AM'],
            ['value' => '02:30 AM','label' => '02:30 AM'],
            ['value' => '03:00 AM','label' => '03:00 AM'],
            ['value' => '03:30 AM','label' => '03:30 AM'],
            ['value' => '04:00 AM','label' => '04:00 AM'],
            ['value' => '04:30 AM','label' => '04:30 AM'],
            ['value' => '05:00 AM','label' => '05:00 AM'],
            ['value' => '05:30 AM','label' => '05:30 AM'],
            ['value' => '06:00 AM','label' => '06:00 AM'],
            ['value' => '06:30 AM','label' => '06:30 AM'],
            ['value' => '07:00 AM','label' => '07:00 AM'],
            ['value' => '07:30 AM','label' => '07:30 AM'],
            ['value' => '08:00 AM','label' => '08:00 AM'],
            ['value' => '08:30 AM','label' => '08:30 AM'],
            ['value' => '09:00 AM','label' => '09:00 AM'],
            ['value' => '09:30 AM','label' => '09:30 AM'],
            ['value' => '10:00 AM','label' => '10:00 AM'],
            ['value' => '10:30 AM','label' => '10:30 AM'],
            ['value' => '11:00 AM','label' => '11:00 AM'],
            ['value' => '11:30 AM','label' => '11:30 AM'],
            ['value' => '12:00 PM','label' => '12:00 PM'],
            ['value' => '12:30 PM','label' => '12:30 PM'],
            ['value' => '01:00 PM','label' => '01:00 PM'],
            ['value' => '01:30 PM','label' => '01:30 PM'],
            ['value' => '02:00 PM','label' => '02:00 PM'],
            ['value' => '02:30 PM','label' => '02:30 PM'],
            ['value' => '03:00 PM','label' => '03:00 PM'],
            ['value' => '03:30 PM','label' => '03:30 PM'],
            ['value' => '04:00 PM','label' => '04:00 PM'],
            ['value' => '04:30 PM','label' => '04:30 PM'],
            ['value' => '05:00 PM','label' => '05:00 PM'],
            ['value' => '05:30 PM','label' => '05:30 PM'],
            ['value' => '06:00 PM','label' => '06:00 PM'],
            ['value' => '06:30 PM','label' => '06:30 PM'],
            ['value' => '07:00 PM','label' => '07:00 PM'],
            ['value' => '07:30 PM','label' => '07:30 PM'],
            ['value' => '08:00 PM','label' => '08:00 PM'],
            ['value' => '08:30 PM','label' => '08:30 PM'],
            ['value' => '09:00 PM','label' => '09:00 PM'],
            ['value' => '09:30 PM','label' => '09:30 PM'],
            ['value' => '10:00 PM','label' => '10:00 PM'],
            ['value' => '10:30 PM','label' => '10:30 PM'],
            ['value' => '11:00 PM','label' => '11:00 PM'],
            ['value' => '11:30 PM','label' => '11:30 PM'],
        ];
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return void
     */
    public function toArray()
    {
        return   [
            '12:00 AM' => '12:00 AM',
            '12:30 AM' => '12:30 AM',
            '01:00 AM' => '01:00 AM',
            '01:30 AM' => '01:30 AM',
            '02:00 AM' => '02:00 AM',
            '02:30 AM' => '02:30 AM',
            '03:00 AM' => '03:00 AM',
            '03:30 AM' => '03:30 AM',
            '04:00 AM' => '04:00 AM',
            '04:30 AM' => '04:30 AM',
            '05:00 AM' => '05:00 AM',
            '05:30 AM' => '05:30 AM',
            '06:00 AM' => '06:00 AM',
            '06:30 AM' => '06:30 AM',
            '07:00 AM' => '07:00 AM',
            '07:30 AM' => '07:30 AM',
            '08:00 AM' => '08:00 AM',
            '08:30 AM' => '08:30 AM',
            '09:00 AM' => '09:00 AM',
            '09:30 AM' => '09:30 AM',
            '10:00 AM' => '10:00 AM',
            '10:30 AM' => '10:30 AM',
            '11:00 AM' => '11:00 AM',
            '11:30 AM' => '11:30 AM',
            '12:00 PM' => '12:00 PM',
            '12:30 PM' => '12:30 PM',
            '01:00 PM' => '01:00 PM',
            '01:30 PM' => '01:30 PM',
            '02:00 PM' => '02:00 PM',
            '02:30 PM' => '02:30 PM',
            '03:00 PM' => '03:00 PM',
            '03:30 PM' => '03:30 PM',
            '04:00 PM' => '04:00 PM',
            '04:30 PM' => '04:30 PM',
            '05:00 PM' => '05:00 PM',
            '05:30 PM' => '05:30 PM',
            '06:00 PM' => '06:00 PM',
            '06:30 PM' => '06:30 PM',
            '07:00 PM' => '07:00 PM',
            '07:30 PM' => '07:30 PM',
            '08:00 PM' => '08:00 PM',
            '08:30 PM' => '08:30 PM',
            '09:00 PM' => '09:00 PM',
            '09:30 PM' => '09:30 PM',
            '10:00 PM' => '10:00 PM',
            '10:30 PM' => '10:30 PM',
            '11:00 PM' => '11:00 PM',
            '11:30 PM' => '11:30 PM'
        ];
    }
}