<?php declare(strict_types=1);


namespace Aceextensions\OrderDeliveryDate\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Sales\Setup\SalesSetupFactory;


class UpgradeData implements UpgradeDataInterface
{
    private $quoteSetupFactory;
    private $salesSetupFactory;

    /**
     * Constructor
     *
     * @param \Magento\Quote\Setup\QuoteSetupFactory $quoteSetupFactory
     */
    public function __construct(
        QuoteSetupFactory $quoteSetupFactory,
        SalesSetupFactory $salesSetupFactory
    ) {
        $this->quoteSetupFactory = $quoteSetupFactory;

        $this->salesSetupFactory = $salesSetupFactory;
    }


    /**
     * {@inheritdoc}
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
        
    ) {
        if (version_compare($context->getVersion(), "1.0.2", "<")) {

            $salesSetup = $this->salesSetupFactory->create(['setup' => $setup]);
            $salesSetup->addAttribute('order', 'delivery_comments',
                [
                    'type' => 'date',
                    'length' => null,
                    'visible' => false,
                    'required' => false,
                    'grid' => true
                ]
            );
    
            $quoteSetup = $this->quoteSetupFactory->create(['setup' => $setup]);
            $quoteSetup->addAttribute('quote', 'delivery_comments',
                [
                    'type' => 'date',
                    'length' => null,
                    'visible' => false,
                    'required' => false,
                    'grid' => true
                ]
            );

        }
    }
}