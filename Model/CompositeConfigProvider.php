<?php
namespace Ace\OrderDeliveryDate\Model;

use \Ace\OrderDeliveryDate\Helper\Data as AceDataHelper;

class CompositeConfigProvider implements \Magento\Checkout\Model\ConfigProviderInterface
{
    protected $aceHelper;

    public function __construct(
        AceDataHelper $aceHelper
    ) {
        $this->aceHelper = $aceHelper;
    }

    public function getConfig()
    {
        
        $output = [];
        if ($this->aceHelper->isEnabled()) {
            
            $output['ace_order_delivery_enable'] = (boolean) $this->aceHelper->isEnabled();

            if ($this->aceHelper->getTimeSlot()) {
                $output['ace_order_delivery_timeslot'] = $this->aceHelper->getTimeSlot();
                $output['ace_has_delivery_timeslot'] = true;
            }
          
            
            $process_time = 0;
            $current_time = (int) $this->aceHelper->getStoreTimestamp();
            $process_time = $this->aceHelper->getProcessingTime();
            
            $output['ace_delivery_process_time'] = $process_time;
           
            $output['ace_delivery_date_fomat'] = $this->aceHelper->getDateFormat();
            $output['ace_delivery_current_time'] = $current_time;
            $output['ace_delivery_time_zone'] = $this->aceHelper->getTimezoneOffsetSeconds();

            /**
             * @todo  need to add uploade in system config
             */
            if ($this->aceHelper->getIcon()) {
                $output['ace_delivery_icon'] = $this->aceHelper->getIcon();
            }

        }
        return $output;
    }
}
