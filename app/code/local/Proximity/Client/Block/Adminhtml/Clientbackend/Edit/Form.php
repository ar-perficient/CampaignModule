<?php

class Proximity_Client_Block_Adminhtml_Clientbackend_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form(
                array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('client_id' => $this->getRequest()->getParam('client_id'))
            ),
            'method' => 'post',
                )
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
    