<?php

namespace ASV\TestMI2\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;
use ASV\TestMI2\Helper\Data;
//use Tutorial\SimpleNews\Model\NewsFactory;

class Products extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Tutorial\SimpleNews\Helper\Data
     */
    protected $_dataHelper;

    /**
     * @var \Tutorial\SimpleNews\Model\NewsFactory
     */
    protected $_productsFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param Data $dataHelper
     * @param NewsFactory $newsFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Data $dataHelper,
        ProductsFactory $productsFactory
    ) {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
        $this->_dataHelper = $dataHelper;
        $this->_productsFactory = $productsFactory;
    }

    /**
     * Dispatch request
     *
     * @param RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function dispatch(RequestInterface $request)
    {
        // Check this module is enabled in frontend
        if ($this->_dataHelper->isEnabledInFrontend()) {
            $result = parent::dispatch($request);
            return $result;
        } else {
            $this->_forward('noroute');
        }
    }
}
