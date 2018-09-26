<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 16.08.18
 * Time: 11:14
 */

namespace Florek\CurrencyConverter\Controller\Index;


use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Florek\Manufacturer\Model\ManufacturerFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    private $_pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

}