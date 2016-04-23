<?php

class Proximity_Client_Model_Mysql4_Client_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    public function _construct() {
        $this->_init("client/client");
    }

}
