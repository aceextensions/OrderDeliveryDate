<?php
namespace Ace\OrderDeliveryDate\Helper;

use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Store\Model\ScopeInterface as ScopeInterface;
use Ace\OrderDeliveryDate\Model\Config\Source\Dateformat as Dateformat;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const ACE_EXTENSION_ORDER_DELIVERY_GENERAL = "orderdeliverydate/general/";

    protected $scopeConfig;
    protected $localeDate;
    protected $storeManager;
    protected $date;
    protected $timezone;

    public function __construct(
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        TimezoneInterface $timezone,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->localeDate = $localeDate;
        $this->date = $date;
        $this->storeManager = $storeManager;
        $this->timezone = $timezone;
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


}
