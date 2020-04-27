<?php
namespace Aceextensions\OrderDeliveryDate\Helper;

use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Store\Model\ScopeInterface as ScopeInterface;
use Aceextensions\OrderDeliveryDate\Model\Config\Source\Dateformat as Dateformat;
use Magento\Store\Model\StoreManagerInterface ;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const ACE_EXTENSION_ORDER_DELIVERY_GENERAL = "orderdeliverydate/general/";

    protected $scopeConfig;
    protected $localeDate;
    protected $storeManager;
    protected $date;
    protected $timezone;
    protected $jsonSerializer;

    /**
     * Undocumented function
     *
     * @param TimezoneInterface $localeDate
     * @param StoreManagerInterface $storeManager
     * @param DateTime $date
     * @param TimezoneInterface $timezone
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        TimezoneInterface $localeDate,
        StoreManagerInterface $storeManager,
        DateTime $date,
        TimezoneInterface $timezone,
        ScopeConfigInterface $scopeConfig,
        Json $jsonSerializer
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->localeDate = $localeDate;
        $this->date = $date;
        $this->storeManager = $storeManager;
        $this->timezone = $timezone;
        $this->jsonSerializer = $jsonSerializer;
    }

    public function isEnabled()
    {
        $active =  $this->scopeConfig->getValue(self::ACE_EXTENSION_ORDER_DELIVERY_GENERAL.'enabled', ScopeInterface::SCOPE_STORE);
        if ($active != 1) {
            return false;
        }

        return true;
    }


    public function getDisplayAt()
    {
        $active =  $this->scopeConfig->getValue(self::ACE_EXTENSION_ORDER_DELIVERY_GENERAL.'displayat', ScopeInterface::SCOPE_STORE);

        return $active;
    }

    public function getProcessingTime()
    {
        $process_time =  $this->scopeConfig->getValue(self::ACE_EXTENSION_ORDER_DELIVERY_GENERAL.'processingtime', ScopeInterface::SCOPE_STORE);
        if (!$process_time) {
            return 0;
        }
        return $process_time;
    }

    public function getDateFormat()
    {
        $dateFormat = $this->scopeConfig->getValue(self::ACE_EXTENSION_ORDER_DELIVERY_GENERAL.'dateformat');
        if ($dateFormat) {
            switch ($dateFormat) {
                case Dateformat::DELIVERY_DATE_FORMAT_MM_DD_YY:
                    return 'mm/dd/yy';
                    break;
                case Dateformat::DELIVERY_DATE_FORMAT_DD_MM_YY:
                    return 'dd-mm-yy';
                    break;
                case Dateformat::DELIVERY_DATE_FORMAT_YY_MM_DD:
                    return 'yy-mm-dd';
                    break;
                default:
                    return 'mm/dd/yy';
                    break;
            }
        }
        return 'mm/dd/yy';
    }

    
    public function getTimeSlot()
    {
        $time_slots = $this->scopeConfig->getValue(self::ACE_EXTENSION_ORDER_DELIVERY_GENERAL.'timeslots', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $result = [];

        if ($time_slots) {
            $time_slot_arr = $this->jsonSerializer->unserialize($time_slots);
            if ($time_slot_arr) {
                foreach ($time_slot_arr as $time_slot) {
                    $a = $time_slot['note'].' ' . $time_slot['from'][0] . ' - ' . $time_slot['to'][0];
                    $b = ['value' => $a, 'label' => $a];
                    array_push($result, $b);
                }
            }
        }
        return $result;
    }

    public function getStoreTimestamp($store = null)
    {
        return $this->localeDate->scopeTimeStamp($store);
    }

    public function getTimezoneOffsetSeconds()
    {
        return $this->date->getGmtOffset();
    }

    public function getMediaUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
    }

    public function getIcon()
    {
        $icon =  $this->scopeConfig->getValue(self::ACE_EXTENSION_ORDER_DELIVERY_GENERAL.'icon_calendar', ScopeInterface::SCOPE_STORE);
        if (!isset($icon)) {
            return false;
        }
        return $this->getMediaUrl() . 'aceextensions/deliverydate/' . $icon;
    }


}
