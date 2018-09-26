<?php

namespace Florek\CurrencyConverter\Block;

use Florek\CurrencyConverter\Service\Currency\Converter;

class Result extends \Magento\Framework\View\Element\Template
{

    public function getResult()
    {
        $currencyValueToConvert = $this->getRequest()->getParam('currency_value');
        return Converter::getResponse(['currency_value' => $currencyValueToConvert]);
    }

}
