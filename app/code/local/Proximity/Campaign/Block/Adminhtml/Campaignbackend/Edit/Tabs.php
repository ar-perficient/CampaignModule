<?php

class Proximity_Campaign_Block_Adminhtml_Campaignbackend_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId('campaign_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Update/Create Campaign');
    }

    protected function _beforeToHtml() {
        $this->addTab('form_section', array(
            'label' => 'Campaign information',
            'title' => 'Campaign information',
            'content' => $this->getLayout()
                    ->createBlock('campaign/adminhtml_campaignbackend_edit_tab_form')
                    ->toHtml()
        ));
        return parent::_beforeToHtml();
    }

}
