<?php

use helpers\ArrayHelper;

/**
 * Essa classe possui o metodo getQtdeNotas ele não está completo e cabe a você concluí-lo de acordo com os requisitos.
 */
class Troco
{
    /**
     * Dado um valor em reais, retorna a quantidade de notas necessárias para formar o troco.
     * @param float $reais
     * @return array
     */
    public function getQtdeNotas(float $reais): array
    {
        $currencyStructure = $this->retrieveCurrencyStructure();
        $currenciesOnly = array_keys($currencyStructure);
        sort($currenciesOnly);
        return $this->getCurrencies($reais, $currenciesOnly, $currencyStructure);
    }

    private function retrieveCurrencyStructure(): array
    {
        return [
            "100" => 0,
            "50" => 0,
            "20" => 0,
            "10" => 0,
            "5" => 0,
            "2" => 0,
            "1" => 0,
            "0.5" => 0,
            "0.25" => 0,
            "0.1" => 0,
            "0.05" => 0,
            "0.01" => 0,
        ];
    }

    private function getCurrencies(float $amount, $currencies, array $currencyStructure = []): array
    {
        $closestCurrency = ArrayHelper::getClosestMinor($amount, $currencies);
        $difference = number_format($amount - $closestCurrency, 2);
        $currencyStructure[$closestCurrency] += 1;

        return $difference > 0
            ? $this->getCurrencies($difference, $currencies, $currencyStructure)
            : $currencyStructure;
    }
}
