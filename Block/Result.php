<?php

namespace Florek\CurrencyConverter\Block;

use Florek\CurrencyConverter\Service\Currency\Converter;
use Florek\CurrencyConverter\Service\Currency\Validator;
use Magento\Framework\View\Element\Template;

class Result extends \Magento\Framework\View\Element\Template
{

    protected $_validator;
    protected $_converter;

    public function __construct(
        Template\Context $context,
        Validator $validator,
        Converter $converter,
        array $data = []
    ) {
        $this->_validator = $validator;
        $this->_converter = $converter;
        parent::__construct($context, $data);
    }

    public function getResult()
    {
        $currencyValueToConvert = $this->getRequest()->getParam('currency_value');
        if (!$this->_validator->isValid(['value' => $currencyValueToConvert])) {
            return __('Please enter a valid number in this field.');
        }
        return $this->_converter->getResponse(['currency_value' => $currencyValueToConvert]);
    }

}
