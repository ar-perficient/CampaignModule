<?php

class Proximity_Client_Block_Adminhtml_Clientbackend_Edit_Tab_Renderer_Map extends Varien_Data_Form_Element_Abstract {

    public function getElementHtml() {
        if (!is_null($this->getLatitude()) && !is_null($this->getLongitude())) {
            $html = '<iframe width="800" height="240" frameborder="0" ';
            $html .= 'scrolling="no" marginheight="0" marginwidth="0" ';
            $html .= 'src="https://maps.google.com/maps?q=' . $this->getLatitude() . ',' . $this->getLongitude() . '&hl=es;z=14&amp;output=embed">';
            $html .= '</iframe>';
        } else {
            $html = 'Location is not set';
        }
        return $html;
    }

    protected function getLatitude() {
        $lat = Mage::registry('client_data')->getData('lat');
        if (isset($lat))
            return $lat;
        return null;
    }

    protected function getLongitude() {
        $lon = Mage::registry('client_data')->getData('lon');
        if (isset($lon))
            return $lon;
        return null;
    }

}
