<?php

class Proximity_Client_Block_Adminhtml_Clientbackend_Edit_Tab_Renderer_Country extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    public function render(Varien_Object $row) {
        $country = Mage::getModel('directory/country')->loadByCode($row->getData('country'));
        return $country->getName();
    }

}
