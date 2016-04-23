<?php

class Proximity_Campaign_Block_Adminhtml_Campaignbackend_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        $this->_objectId = 'campaign_id';
        //vwe assign the same blockGroup as the Grid Container
        $this->_blockGroup = 'campaign';
        //and the same controller
        $this->_controller = 'adminhtml_campaignbackend';
        parent::__construct();
        //define the label for the save and delete button
        $this->_updateButton('save', 'label', 'Save Campaign');
        $this->_updateButton('delete', 'label', 'Delete Campaign');
    }

    /* Here, we're looking if we have transmitted a form object,
      to update the good text in the header of the page (edit or add) */

    public function getHeaderText() {
        return 'Create/Update Campaign';
    }

}
