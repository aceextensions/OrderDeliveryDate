<?php
declare(strict_types=1);
/*
 * Filename: /project/magento234/magento/app/code/Ace/OrderDeliveryDate/Setup/InstallData.php
 * Path: /project/magento234/magento/app/code/Ace/OrderDeliveryDate/Setup
 * Created Date: Friday, April 3rd 2020, 10:20:09 am
 * Author: durga
 * 
 * Copyright (c) 2020 Your Company
 */

namespace Aceextensions\OrderDeliveryDate\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Sales\Setup\SalesSetupFactory;


class InstallData implements InstallDataInterface
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
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $quoteSetup = $this->quoteSetupFactory->create(['setup' => $setup]);
        $quoteSetup->addAttribute('quote', 'delivery_timeslot',
            [
                'type' => 'varchar',
                'length' => 255,
                'visible' => false,
                'required' => false,
                'grid' => true
            ]
        );

        $quoteSetup = $this->quoteSetupFactory->create(['setup' => $setup]);
        $quoteSetup->addAttribute('quote', 'delivery_date',
            [
                'type' => 'date',
                'length' => null,
                'visible' => false,
                'required' => false,
                'grid' => true
            ]
        );

        $salesSetup = $this->salesSetupFactory->create(['setup' => $setup]);
        $salesSetup->addAttribute('order', 'delivery_date',
            [
                'type' => 'date',
                'length' => null,
                'visible' => false,
                'required' => false,
                'grid' => true
            ]
        );

        $salesSetup = $this->salesSetupFactory->create(['setup' => $setup]);
        $salesSetup->addAttribute('order', 'delivery_timeslot',
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