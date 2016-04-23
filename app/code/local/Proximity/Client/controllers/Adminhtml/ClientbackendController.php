<?php

class Proximity_Client_Adminhtml_ClientbackendController extends Mage_Adminhtml_Controller_Action {

    public function indexAction() {
        $this->getLayout()->createBlock('client/adminhtml_clientbackend');
        $this->loadLayout();
        $this->_title($this->__("Manage Client"));
        $this->renderLayout();
    }

    public function newAction() {
        $this->_forward('edit');
    }

    public function editAction() {
        $testId = $this->getRequest()->getParam('client_id');
        $clientModel = Mage::getModel('client/client')->load($testId);
        if ($clientModel->getId() || $testId == 0) {
            Mage::register('client_data', $clientModel);
            $this->loadLayout();
            $this->getLayout()->getBlock('head')
                    ->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()
                            ->createBlock('client/adminhtml_clientbackend_edit'))
                    ->_addLeft($this->getLayout()
                            ->createBlock('client/adminhtml_clientbackend_edit_tabs')
            );
            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')
                    ->addError('Test does not exist');
            $this->_redirect('*/*/');
        }
    }

    public function saveAction() {
        if ($this->getRequest()->getPost()) {
            try {
                $postData = $this->getRequest()->getPost();
                $clientModel = Mage::getModel('client/client');
                if ($this->getRequest()->getParam('client_id') <= 0)
                    $clientModel->setCreatedTime(
                            Mage::getSingleton('core/date')
                                    ->gmtDate()
                    );
                $clientModel
                        ->addData($postData)
                        ->setUpdateTime(
                                Mage::getSingleton('core/date')
                                ->gmtDate())
                        ->setId($this->getRequest()->getParam('client_id'))
                        ->save();
                Mage::getSingleton('adminhtml/session')
                        ->addSuccess('Client Information Successfully Saved');
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
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()
                            ->getParam('client_id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction() {
        if ($this->getRequest()->getParam('client_id') > 0) {
            try {
                $clientModel = Mage::getModel('client/client');
                $clientModel->setId($this->getRequest()
                                ->getParam('client_id'))
                        ->delete();
                Mage::getSingleton('adminhtml/session')
                        ->addSuccess('Client Successfully Deleted');
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')
                        ->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('client_id' => $this->getRequest()->getParam('client_id')));
            }
        }
        $this->_redirect('*/*/');
    }

}
