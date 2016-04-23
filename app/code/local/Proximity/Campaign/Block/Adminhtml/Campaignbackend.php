<?php

class Proximity_Campaign_Block_Adminhtml_Campaignbackend extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {
        //where is the controller
        $this->_controller = 'adminhtml_campaignbackend';
        $this->_blockGroup = 'campaign';
        //text in the admin header
        $this->_headerText = 'Manage Campaign';
        //value of the add button
        $this->_addButtonLabel = Mage::helper('campaign')->__('Add a Campaign');
        parent::__construct();
    }

    protected function _prepareLayout() {
        $this->setChild('grid', $this->getLayout()->createBlock($this->_blockGroup . '/' . $this->_controller . '_grid', $this->_controller . '.grid')->setSaveParametersInSession(true));
        return parent::_prepareLayout();
    }
    
}
