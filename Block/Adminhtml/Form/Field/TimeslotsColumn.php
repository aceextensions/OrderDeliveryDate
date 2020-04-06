<?php
declare(strict_types=1);
namespace Ace\OrderDeliveryDate\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;
use Ace\OrderDeliveryDate\Model\Config\Source\TimeslotsColumn as TimeslotsColumnSource;

class TimeslotsColumn extends Select
{
    private $columnScource;

    public function __construct(
        Context $context,
        TimeslotsColumnSource $columnScource,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->columnScource = $columnScource;
    }

    public function setInputName($value)
    {
        return $this->setName($value . '[]');
    }

    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->columnScource->toOptionArray());
        }
        return parent::_toHtml();
    }
}