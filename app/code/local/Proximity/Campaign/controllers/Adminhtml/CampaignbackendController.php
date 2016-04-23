<?php

class Proximity_Campaign_Adminhtml_CampaignbackendController extends Mage_Adminhtml_Controller_Action {

    public function indexAction() {
        $this->getLayout()->createBlock('campaign/adminhtml_campaignbackend');
        $this->loadLayout();
        $this->_title($this->__("Manage Campaign"));
        $this->renderLayout();
    }

    public function newAction() {
        $this->_forward('edit');
    }

    public function editAction() {
        $testId = $this->getRequest()->getParam('campaign_id');
        $campaignModel = Mage::getModel('campaign/campaign')->load($testId);
        if ($campaignModel->getId() || $testId == 0) {
            Mage::register('campaign_data', $campaignModel);
            $this->loadLayout();
            $this->getLayout()->getBlock('head')
                    ->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()
                            ->createBlock('campaign/adminhtml_campaignbackend_edit'))
                    ->_addLeft($this->getLayout()
                            ->createBlock('campaign/adminhtml_campaignbackend_edit_tabs')
            );
            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')
                    ->addError('Campaign does not exist');
            $this->_redirect('*/*/');
        }
    }

    public function saveAction() {
        if ($this->getRequest()->getPost()) {
            try {
                $postData = $this->getRequest()->getPost();
                $campaignModel = Mage::getModel('campaign/campaign');
                if ($this->getRequest()->getParam('campaign_id') <= 0)
                    $campaignModel->setCreatedTime(
                            Mage::getSingleton('core/date')
                                    ->gmtDate()
                    );
                $campaignModel
                        ->addData($postData)
                        ->setUpdateTime(
                                Mage::getSingleton('core/date')
                                ->gmtDate())
                        ->setId($this->getRequest()->getParam('campaign_id'))
                        ->save();
                Mage::getSingleton('adminhtml/session')
                        ->addSuccess('Campaign Information Successfully Saved');
                Mage::getSingleton('adminhtml/session')
                        ->settestData(false);
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')
                        ->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')
                        ->settestData($this->getRequest()
                                ->getPost()
                );
                $this->_redirect('*/*/edit', array('campaign_id' => $this->getRequest()
                            ->getParam('campaign_id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction() {
        if ($this->getRequest()->getParam('campaign_id') > 0) {
            try {
                $clientModel = Mage::getModel('campaign/campaign');
                $clientModel->setId($this->getRequest()
                                ->getParam('campaign_id'))
                        ->delete();
                Mage::getSingleton('adminhtml/session')
                        ->addSuccess('Campaign Successfully Deleted');
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')
                        ->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('campaign_id' => $this->getRequest()->getParam('campaign_id')));
            }
        }
        $this->_redirect('*/*/');
    }

}
