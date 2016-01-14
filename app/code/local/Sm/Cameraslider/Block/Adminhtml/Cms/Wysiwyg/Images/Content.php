<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
class Sm_Cameraslider_Block_Adminhtml_Cms_Wysiwyg_Images_Content extends Mage_Adminhtml_Block_Cms_Wysiwyg_Images_Content
{
    public function getFilebrowserSetupObject()
    {
        $setupObject  = new Varien_Object();
        $setupObject->setData( array(
            'newFolderPrompt' => $this->helper( 'cms' )->__( 'New Folder Name:' ),
            'deleteFolderConfirmationMessage' => $this->helper( 'cms' )->__( 'Are you sure you want to delete current folder?' ),
            'deleteFileConfirmationMessage' => $this->helper( 'cms' )->__( 'Are you sure you want to delete the selected file?' ),
            'targetElementId' => $this->getTargetElementId(),
            'contentsUrl' => $this->getContentsUrl(),
            'onInsertUrl' => $this->getOnInsertUrl(),
            'newFolderUrl' => $this->getNewfolderUrl(),
            'deleteFolderUrl' => $this->getDeletefolderUrl(),
            'deleteFilesUrl' => $this->getDeleteFilesUrl(),
            'headerText' => $this->getHeaderText(),
            'onInsertCallback' => $this->getOnInsertCallback(),
            'onInsertCallbackParams' => $this->getOnInsertCallbackParams(),
            'popupId' => $this->getPopupId()
        ) );

        return Mage::helper( 'core' )->jsonEncode( $setupObject );
    }

    public function getOnInsertCallback()
    {
        return $this->getRequest()->getParam( 'onInsertCallback' );
    }

    public function getOnInsertCallbackParams()
    {
        return $this->getRequest()->getParam( 'onInsertCallbackParams' );
    }

    public function getPopupId()
    {
        return $this->getRequest()->getParam( 'popupId' );
    }
}