<?php

class Proximity_Campaign_Block_Adminhtml_Campaignbackend_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $latlon = array();
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('campaign_form', array('legend' => 'campaign information'));
        $fieldset->addField('campaign_name', 'text', array(
            'label' => 'Campaign Name',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'campaign_name',
        ));
        $fieldset->addField("campaign_description", "editor", array(
            "label" => Mage::helper("adminhtml")->__("Campaign Description"),
            "class" => "required-entry",
            "required" => true,
            "style" => "height:15em",
            "name" => "campaign_description",
            "config" => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
            "wysiwyg" => true,
        ));
        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('publish_at', 'date', array(
            'name' => 'publish_at',
            'label' => Mage::helper('catalogrule')->__('Publish Date'),
            'title' => Mage::helper('catalogrule')->__('Publish Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'input_format' => Varien_Date::DATE_INTERNAL_FORMAT,
            'format' => $dateFormatIso,
            'time' => true,
            'required' => true,
            'value' => Mage::registry('campaign_data')->getData('publish_at'),
        ));
        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('unpublish_at', 'date', array(
            'name' => 'unpublish_at',
            'label' => Mage::helper('catalogrule')->__('Unpublish Date'),
            'title' => Mage::helper('catalogrule')->__('Unpublish Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'input_format' => Varien_Date::DATE_INTERNAL_FORMAT,
            'format' => $dateFormatIso,
            'time' => true,
            'required' => true,
        ));
        $fieldset->addField('publish', 'select', array(
            'name' => 'publish',
            'label' => 'Publish Campaign',
            'id' => 'publish',
            'title' => 'Publish Campaign',
            'required' => true,
            'values' => array('1' => 'Yes', '0' => 'No'),
        ));
        $fieldset->addField('category_id', 'text', array(
            'label' => 'Select Category',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'category_id',
        ));

        if (Mage::registry('campaign_data')) {
            $form->setValues(Mage::registry('campaign_data')->getData());
        }
        return parent::_prepareForm();
    }

}
