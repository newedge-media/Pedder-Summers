<?php
/*------------------------------------------------------------------------
 # SM Camera SLider - Version 1.0.1
 # Copyright (c) 2015 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/
class Sm_Cameraslider_Block_Adminhtml_Cameraslider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /*
     * Init grid default properties
     * */
    public function __construct()
    {
        parent::__construct();
        $this->setId('cameraslider_list_grid');
        $this->setDefaultSort('slide_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /*
     * Retrieve collection class
     *
     * @return string
     * */
    protected function _getCollectionClass()
    {
        return 'sm_cameraslider/slide';
    }

    /*
        Prepare collection for grid

        @return Sm_Cameraslider_Block_Adminhtml_Cameraslider_Grid
    */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel($this->_getCollectionClass())->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /*
     * Create the field for grid
     * */
    public function _prepareColumns()
    {
        $this->addColumn('slide_id', array(
            'header' => Mage::helper('sm_cameraslider')->__('ID'),
            'align'  => 'right',
            'width'  => '50px',
            'index'  => 'slide_id',
        ));

        $this->addColumn('name_slide', array(
            'header' => Mage::helper('sm_cameraslider')->__('Name Slide'),
            'align'  => 'left',
            'width'  => '80%',
            'index'  => 'name_slide',
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('sm_cameraslider')->__('Status'),
            'align'  => 'center',
            'index'  => 'status',
            'type'   => 'options',
            'width'  => '100px',
            'options' => Mage::getModel($this->_getCollectionClass())->getOptionStatus(),
        ));

        $this->addColumn('preview', array(
            'header'    => Mage::helper('sm_cameraslider')->__('Preview'),
            'type'      => 'action',
            'align'     => 'center',
            'getter'    => 'getId',
            'width'     => '100px',
            'actions'   => array(
                array(
                    'caption'   => Mage::helper('sm_cameraslider')->__('Preview'),
                    'field'     => 'id',
                    'target'    => 'blank',
                    'url'       => array('base' => 'cameraslider/index/preview')
                )
            ),
            'filter'    => false,
            'sortable'  => false
        ));

        $this->addColumn('action', array(
            'header'	=> Mage::helper('sm_cameraslider')->__('Action'),
            'width'		=> '100px',
            'align'     => 'center',
            'type'		=> 'action',
            'getter'	=> 'getId',
            'actions'	=> array(array(
                'caption' 	=> Mage::helper('sm_cameraslider')->__('Edit'),
                'url'		=> array('base' => '*/*/edit'),
                'field'		=> 'id',
                'class'     => 'scalable'
            )),
            'filter' 	=> false,
            'sortable'	=> false,
            'index'     => 'stores',
            'is_system' => true,
            'class' => 'scalable'
        ));
        return parent::_prepareColumns();
    }

    /**
     * Prepare and set options for massaction
     *
     * @return Mage_Adminhtml_Block_Sales_Shipment_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('slide_id');
        $this->getMassactionBlock()->setFormFieldName('slide_id');
        $this->getMassactionBlock()->setUseSelectAll(true);

        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> Mage::helper('sm_cameraslider')->__('Delete'),
            'url'  => $this->getUrl('*/*/delete'),
            'confirm' => Mage::helper('sm_cameraslider')->__('Are you sure?'),
        ));

        return $this;
    }

    /*
        return row url for js event handles

        @return string
    */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl( '*/*/grid', array(
            '_current' => true
        ) );
    }
}