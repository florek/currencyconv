<?php

namespace Florek\CurrencyConverter\Service\Currency;

class Validator
{

    public function isValid(array $values): bool
    {
        if (isset($values['value']) && is_numeric($values['value'])) {
            return true;
        }
        return false;
    }

}
