<?php

class Proximity_Campaign_Block_Adminhtml_Campaignbackend_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('proximity_campaign_grid');
        $this->setDefaultSort('campaign_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('campaign/campaign')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('campaign_id', array(
            'header' => 'ID',
            'align' => 'right',
            'width' => '50px',
            'index' => 'campaign_id',
        ));
        $this->addColumn('campaign_name', array(
            'header' => 'Campaign Name',
            'align' => 'right',
            'width' => '50px',
            'index' => 'campaign_name',
        ));
        $this->addColumn('campaign_description', array(
            'header' => 'Description',
            'align' => 'left',
            'index' => 'campaign_description',
            'renderer' => 'Proximity_Campaign_Block_Adminhtml_Campaignbackend_Edit_Tab_Renderer_Campaigndesc',
        ));
        $this->addColumn('publish', array(
            'header' => 'Publish',
            'align' => 'left',
            'index' => 'publish',
        ));
        $this->addColumn('publish_at', array(
            'header' => 'Publish At',
            'align' => 'left',
            'index' => 'publish_at',
        ));
        $this->addColumn('unpublish_at', array(
            'header' => 'Unpublish At',
            'align' => 'left',
            'index' => 'unpublish_at',
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
                        'field'     => 'campaign_id'
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
        return $this->getUrl('*/*/edit', array('campaign_id' => $row->getId()));
    }

}
