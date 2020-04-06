<?php
namespace Ace\OrderDeliveryDate\Model\Config\Source;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Ace\OrderDeliveryDate\Block\Adminhtml\Form\Field\TimeslotsColumn;

class Timeslots extends AbstractFieldArray
{

    
    private $fromRenderer;
    private $toRenderer;
   
    protected function _prepareToRender()
    {
        $this->addColumn('from', [
            'label' => __('From'),
            'renderer' => $this->getFromRenderer(),
            'class' => 'required-entry',
            'style' => 'width:150px'
        ]);

        $this->addColumn('to', [
            'label' => __('To'),
            'renderer' => $this->getToRenderer(),
            'class' => 'required-entry',
            'style' => 'width:150px'
        ]);

        $this->addColumn('note', ['label' => __('Note'), 'style' => 'width:200px']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    protected function _prepareArrayRow(DataObject $row)
    {
        $options = [];

        $froms = $row->getFrom();
       
        if (is_array($froms) && count($froms) > 0) {
            foreach ($froms as $from) {
                $options['option_' . $this->getFromRenderer()->calcOptionHash($from)]
                    = 'selected="selected"';
            }
        }

     
        $tos = $row->getTo();
        if (is_array($tos) && count($tos) > 0) {
            foreach ($tos as $to) {
                $options['option_' . $this->getToRenderer()->calcOptionHash($to)]
                    = 'selected="selected"';
            }
        }

        $row->setData('option_extra_attrs', $options);
    }

    private function getFromRenderer()
    {
        if (!$this->fromRenderer) {
            $this->fromRenderer = $this->getLayout()->createBlock(                
                TimeslotsColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
            
        return $this->fromRenderer;
    }

    private function getToRenderer()
    {
        if (!$this->toRenderer) {
            $this->toRenderer = $this->getLayout()->createBlock(
                TimeslotsColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
            
        return $this->toRenderer;
    }
}