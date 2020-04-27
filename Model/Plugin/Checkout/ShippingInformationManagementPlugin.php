<?php
namespace Aceextensions\OrderDeliveryDate\Model\Plugin\Checkout;

use Aceextensions\OrderDeliveryDate\Model\Config\Source\Displayat;
use Magento\Checkout\Model\ShippingInformationManagement;
use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Quote\Model\QuoteRepository;
use Aceextensions\OrderDeliveryDate\Helper\Data;

class ShippingInformationManagementPlugin
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $quoteRepository;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $helper;

    /**
     * Undocumented function
     *
     * @param QuoteRepository $quoteRepository
     * @param Data $helper
     */
    public function __construct(
        QuoteRepository $quoteRepository,
        Data $helper
    ) {
        $this->quoteRepository = $quoteRepository;
        $this->helper = $helper;
    }

    /**
     * Undocumented function
     *
     * @param ShippingInformationManagement $subject
     * @param [type] $cartId
     * @param ShippingInformationInterface $addressInformation
     * @return void
     */
    public function beforeSaveAddressInformation(
        ShippingInformationManagement $subject,
        $cartId,
        ShippingInformationInterface $addressInformation
    ) {
        if (!$this->helper->isEnabled()) {
          return;
        }
        
        if ($this->helper->getDisplayAt() == Displayat::DELIVERY_DATE_AT_SHIPPING_ADDRESS
            || $this->helper->getDisplayAt() == Displayat::DELIVERY_DATE_AT_SHIPPING_METHOD) {

          
          $extAttributes = $addressInformation->getExtensionAttributes();
          $deliveryDate = $extAttributes->getDeliveryDate();
          $deliveryTimeSlot = $extAttributes->getDeliveryTimeslot();
    
          /**
           * get active cart
           */
          $quote = $this->quoteRepository->getActive($cartId);
          if (isset($deliveryDate)) {
            $quote->setDeliveryDate($deliveryDate);
          }

          if (isset($deliveryTimeSlot)) {
            $quote->setDeliveryTimeslot($deliveryTimeSlot);
          }

        }
    }
}
