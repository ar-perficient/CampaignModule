<?php

class Proximity_Campaign_Block_Adminhtml_Campaignbackend_Edit_Tab_Renderer_Campaigndesc extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    public function render(Varien_Object $row) {
        return strip_tags($row->getCampaignDescription());
    }

}
