<?php

namespace ASV\TestMI2\Block;

use Magento\Framework\View\Element\Template;
//use ASV\TestMI2\Model\NewsFactory;

class ProductList extends Template
{
    /**
     * @var \Tutorial\SimpleNews\Model\NewsFactory
     */
    protected $_productFactory;

    /**
     * @param Template\Context $context
     * @param NewsFactory $newsFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory,
        array $data = []
    ) {
        $this->_productFactory = $productFactory;
        parent::__construct($context, $data);

        //die('block.__construct');
    }

    /**
     * Set news collection
     */
/*    protected  function _construct()
    {
        parent::_construct();
        $collection = $this->_newsFactory->create()->getCollection()
            ->setOrder('id', 'DESC');
        $this->setCollection($collection);
    }*/

    /**
     * @return $this
     */
/*    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        /** @var \Magento\Theme\Block\Html\Pager */
/*
        $pager = $this->getLayout()->createBlock(
            'Magento\Theme\Block\Html\Pager',
            'simplenews.news.list.pager'
        );
        $pager->setLimit(5)
            ->setShowAmounts(false)
            ->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();

        return $this;
    }*/

    public function getProductCollection()
    {
        //die('block.getProductCollection()');
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
