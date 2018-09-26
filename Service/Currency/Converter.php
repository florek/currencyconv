<?php

namespace Florek\CurrencyConverter\Service\Currency;

use Florek\CurrencyConverter\Service\Api;

class Converter implements Api
{

    const RUB = 'RUB';
    const PLN = 'PLN';

    public function getResponse(array $request)
    {
        $convertedValue = $this->_convert(self::RUB, self::PLN) * $request['currency_value'];
        return round($convertedValue, 2);
    }

    protected function _convert($from, $to)
    {
        $conversionString = $from . '_' . $to;
        $string = file_get_contents("http://free.currencyconverterapi.com/api/v3/convert?q=$conversionString&compact=ultra");
        $result = json_decode($string, true);
        if (isset($result[$conversionString])) {
            return $result[$conversionString];
        }
        return null;
    }

}
