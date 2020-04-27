<?php
namespace Aceextensions\OrderDeliveryDate\Model;

use \Aceextensions\OrderDeliveryDate\Helper\Data as AceDataHelper;

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
            
            $output['aceextensions_order_delivery_enable'] = (boolean) $this->aceHelper->isEnabled();

            if ($this->aceHelper->getTimeSlot()) {
                $output['aceextensions_order_delivery_timeslot'] = $this->aceHelper->getTimeSlot();
                $output['aceextensions_has_delivery_timeslot'] = true;
            }
          
            
            $process_time = 0;
            $current_time = (int) $this->aceHelper->getStoreTimestamp();
            $process_time = $this->aceHelper->getProcessingTime();
            
            $output['aceextensions_delivery_process_time'] = $process_time;
           
            $output['aceextensions_delivery_date_fomat'] = $this->aceHelper->getDateFormat();
            $output['aceextensions_delivery_current_time'] = $current_time;
            $output['aceextensions_delivery_time_zone'] = $this->aceHelper->getTimezoneOffsetSeconds();

            /**
             * @todo  need to add uploade in system config
             */
            if ($this->aceHelper->getIcon()) {
                $output['aceextensions_delivery_icon'] = $this->aceHelper->getIcon();
            }

        }
        return $output;
    }
}
