<?php

class Proximity_Campaign_Block_Adminhtml_Campaignbackend_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareLayout() {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
        }
    }

    protected function _prepareForm() {
        $form = new Varien_Data_Form(
                array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('campaign_id' => $this->getRequest()->getParam('campaign_id'))
            ),
            'method' => 'post',
                )
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }

}
