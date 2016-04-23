<?php

class Proximity_Client_Block_Adminhtml_Clientbackend extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {
        //where is the controller
        $this->_controller = 'adminhtml_clientbackend';
        $this->_blockGroup = 'client';
        //text in the admin header
        $this->_headerText = 'Manage Client';
        //value of the add button
        $this->_addButtonLabel = Mage::helper('client')->__('Add a Client');
        parent::__construct();
    }

    protected function _prepareLayout() {
        $this->setChild('grid', $this->getLayout()->createBlock($this->_blockGroup . '/' . $this->_controller . '_grid', $this->_controller . '.grid')->setSaveParametersInSession(true));
        return parent::_prepareLayout();
    }

}
