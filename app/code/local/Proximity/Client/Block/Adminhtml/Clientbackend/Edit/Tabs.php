<?php

class Proximity_Client_Block_Adminhtml_Clientbackend_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId('client_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Update/Create Client');
    }

    protected function _beforeToHtml() {
        $this->addTab('form_section', array(
            'label' => 'Client information',
            'title' => 'Client information',
            'content' => $this->getLayout()
                    ->createBlock('client/adminhtml_clientbackend_edit_tab_form')
                    ->toHtml()
        ));
        return parent::_beforeToHtml();
    }

}
