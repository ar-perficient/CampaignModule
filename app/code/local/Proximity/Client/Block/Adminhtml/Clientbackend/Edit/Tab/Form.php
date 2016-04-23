<?php

class Proximity_Client_Block_Adminhtml_Clientbackend_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $latlon = array();
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('client_form', array('legend' => 'client information'));
        $fieldset->addField('company_name', 'text', array(
            'label' => 'Company Name',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'company_name',
        ));
        $fieldset->addField('company_email', 'text', array(
            'label' => 'Company Email',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'company_email',
        ));
        $fieldset->addField('address', 'text', array(
            'label' => 'address',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'address',
        ));
        $fieldset->addField('country', 'select', array(
            'label' => 'Country',
            'name' => 'country',
            'values' => Mage::getModel('adminhtml/system_config_source_country')->toOptionArray(),
        ));
        $fieldset->addField('city', 'text', array(
            'label' => 'City',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'city',
        ));
        $fieldset->addField('state', 'text', array(
            'label' => 'State',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'state',
        ));
        $fieldset->addField('zip', 'text', array(
            'label' => 'Zip',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'zip',
        ));
        $fieldset->addField('lat', 'text', array(
            'label' => 'Latitude',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'lat',
        ));
        $fieldset->addField('lon', 'text', array(
            'label' => 'Longitude',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'lon',
        ));
        $fieldset->addType('customtype', 'Proximity_Client_Block_Adminhtml_Clientbackend_Edit_Tab_Renderer_Map');
        $fieldset->addField('latlon', 'customtype', array(
            'name' => 'latlon',
            'label' => Mage::helper('client')->__(''),
        ));
        $fieldset->addField('beacon', 'text', array(
            'label' => 'Beacon',
            'class' => 'required-entry',
            'required' => true,
            'name' => 'beacon',
        ));
        if (Mage::registry('client_data')) {
            $form->setValues(Mage::registry('client_data')->getData());
        }
        return parent::_prepareForm();
    }

}
