<?php

class Proximity_Client_Block_Adminhtml_Clientbackend_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('proximity_client_grid');
        $this->setDefaultSort('client_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('client/client')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('client_id', array(
            'header' => 'ID',
            'align' => 'right',
            'width' => '50px',
            'index' => 'client_id',
        ));
        $this->addColumn('company_name', array(
            'header' => 'Company Name',
            'align' => 'right',
            'width' => '50px',
            'index' => 'company_name',
        ));
        $this->addColumn('company_email', array(
            'header' => 'Company Email',
            'align' => 'left',
            'index' => 'company_email',
        ));
        $this->addColumn('country', array(
            'header' => 'Country',
            'align' => 'left',
            'index' => 'country',
            'renderer' => 'Proximity_Client_Block_Adminhtml_Clientbackend_Edit_Tab_Renderer_Country',
        ));
        $this->addColumn('address', array(
            'header' => 'Address',
            'align' => 'left',
            'index' => 'address',
        ));
        $this->addColumn('lat', array(
            'header' => 'Latitude',
            'align' => 'left',
            'index' => 'lat',
        ));
        $this->addColumn('lon', array(
            'header' => 'Longitude',
            'align' => 'left',
            'index' => 'lon',
        ));
        $this->addColumn('beacon', array(
            'header' => 'Beacon',
            'align' => 'left',
            'index' => 'beacon',
        ));
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('customer')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('customer')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'client_id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('client_id' => $row->getId()));
    }

}
