<?php

class Proximity_Client_Model_Mysql4_Client extends Mage_Core_Model_Mysql4_Abstract {

    protected function _construct() {
        $this->_init("client/client", "client_id");
    }

}
