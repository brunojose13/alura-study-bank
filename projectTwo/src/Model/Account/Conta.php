<?php

namespace Alura\Bank\Model\Account;

use Alura\Bank\Model\Account\Titular;

class Conta
{
    private $customer;
    private $bankBalance;
    private static $onlineAccounts = 0;

    public function __construct(Titular $customer)

    {
        $this->customer = $customer;
        $this->bankBalance = 0.0;
        self::$onlineAccounts++;
    }

    public function __destruct()
    {
        self::$onlineAccounts--;
    }


    // =-=-=-=-=-=-= //

    public function getCustomer(): Titular
    {
        return $this->customer;
    }

    public function getBalance(): float
    {
        return $this->bankBalance;
    }

    public static function getNumberOfOnlineAccounts(): int
    {
        return self::$onlineAccounts;
    }

    public function takeBalance(float $moneyToTake): void
    {
        if ($moneyToTake < $this->getBalance()) {   
            $this->bankBalance -= $moneyToTake;
            return;
        }

        echo "Saldo indisponível";
    }

    public function depositBalance(float $moneyToSave): void
    {
        if ($moneyToSave > 0) {
            $this->bankBalance += $moneyToSave;
            return;
        }

        echo "O valor de depósito precisa ser positivo!";
    }

    public function moneyTransfer(Conta $anotherCustomer, float $moneyToTransfer): void
    { 
        if ($moneyToTransfer < $this->getBalance()) {   
            $this->takeBalance($moneyToTransfer);
            $anotherCustomer->depositBalance($moneyToTransfer);
            return;
        }

        echo "Saldo indisponível para efetuar a transferencia!";
    }
}
