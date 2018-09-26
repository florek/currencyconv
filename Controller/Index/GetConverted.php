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

class GetConverted extends \Magento\Framework\App\Action\Action
{

    private $_pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $block = $resultPage->getLayout()
            ->createBlock('Florek\CurrencyConverter\Block\Result', 'get_converted_result')
            ->setTemplate('Florek_CurrencyConverter::result.phtml');

        $data = [
            'html' => $block->toHtml()
        ];

        $resultJson = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
        $resultJson->setData($data);
        return $resultJson;
    }

}