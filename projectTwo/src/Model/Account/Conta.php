<?php

namespace Alura\Bank\Model\Account;

use Alura\Bank\Model\Account\Titular;
use Alura\Bank\Model\Account\Login;

class Conta
{
    private $customer;
    private float $balance;
    private static $onlineAccounts = 0;

    public function __construct(Login $login)
    {
        $this->customer = $login->authenticate();
        $this->balance = 0.0;
        self::$onlineAccounts++;

        if (!isset($this->customer)) {
            exit();
        }
    }

    public function __destruct()
    {
        self::$onlineAccounts--;
        echo 'Conta ' . $this->getCustomer()->getName() . ' desativada com sucesso!' . PHP_EOL . PHP_EOL;
    }


    // =-=-=-=-=-=-= //

    public function getCustomer(): Titular
    {   
        return $this->customer;
    }
    
    public function getBalance(): string
    {  
        $str_balance = strval($this->balance);
        $dotPosition = strpos($str_balance, '.');

        $str_balanceInteger = substr_replace($str_balance, '', $dotPosition);

        $complement = substr($str_balance, $dotPosition);
        $complement = str_replace('.', ',', $complement);

        $units = strlen($str_balanceInteger);

        $position = 3;

        while ($position < $units) {
            $str_balanceInteger = substr_replace($str_balanceInteger, '.', -$position, 0);
            $position += 4;
            $units ++;        
        }

        $str_balance = substr_replace($str_balanceInteger, 'R$ ', 0, 0) . $complement;

        return $str_balance;
    }

    public static function getNumberOfOnlineAccounts(): int
    {
        return self::$onlineAccounts;
    }

    public function takeBalance(float $moneyToTake): void
    {
        if ($moneyToTake < $this->balance) {   
            $this->balance -= $moneyToTake;
            return;
        }

        echo "Saldo indisponível";
    }

    public function depositBalance(float $moneyToSave): void
    {
        if ($moneyToSave > 0) {
            $this->balance += $moneyToSave;
            return;
        }

        echo "O valor de depósito precisa ser positivo!";
    }

    public function transferTo(Conta $anotherCustomer, float $moneyToTransfer): void
    {
        if ($moneyToTransfer <= $this->balance) {   
            $this->takeBalance($moneyToTransfer);
            $anotherCustomer->depositBalance($moneyToTransfer);
            return;
        }

        echo "Saldo indisponível para efetuar a transferencia!" . PHP_EOL . PHP_EOL;
    }
}
