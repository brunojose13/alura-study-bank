<?php

class Conta
{
    private $user;
    private $bankBalance;
    private static $onlineAccounts = 0;

    public function __construct(Titular $user)
    {
        $this->user = $user;
        $this->bankBalance = 0.0;
        self::$onlineAccounts++;
    }

    public function __destruct()
    {
        self::$onlineAccounts--;
    }

    /// /////////////////////////////////////////////////// ///

    public function getUser(): Titular
    {
        return $this->user;
    }

    public function getBalance(): float
    {
        return $this->bankBalance;
    }

    public static function getNumberOfOnlineAccounts(): int
    {
        return self::$onlineAccounts;
    }

    /// /////////////////////////////////////////////////// ///

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

    public function moneyTransfer(Conta $otherUser, float $moneyToTransfer): void
    { 
        if ($moneyToTransfer < $this->getBalance()) {   
            $this->takeBalance($moneyToTransfer);
            $otherUser->depositBalance($moneyToTransfer);
            return;
        }

        echo "Saldo indisponível para efetuar a transferencia!";
    }
}
