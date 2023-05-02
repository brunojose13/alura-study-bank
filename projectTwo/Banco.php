<?php

require_once 'autoload.php';

use Alura\Bank\Model\Account\Conta;
use Alura\Bank\Model\Account\Login;

function fim()
{
    echo PHP_EOL . PHP_EOL . PHP_EOL . 'Fim do programa!' . PHP_EOL;
}

function showResults(Conta $account): void
{
    echo                  $account->getCustomer()->getName() . PHP_EOL;
    echo "  CPF: "      . $account->getCustomer()->getCpf() . PHP_EOL;
    echo "  Saldo: "    . $account->getBalance() . PHP_EOL;
    echo "  Endereço: " . $account->getCustomer()->getFullAddress() . PHP_EOL . PHP_EOL;
}


// =-=-=-=-=-=-= //

// Accounts:
$contaBruno = new Conta(
    new Login('bruno@gmail.com', '12345')
);

echo "(inicialmente) Contas ativas: " . Conta::getNumberOfOnlineAccounts() . PHP_EOL . PHP_EOL;

$contaJulia = new Conta(
    new Login('julia@gmail.com', '54321')
);

echo "Contas ativas: " . Conta::getNumberOfOnlineAccounts() . PHP_EOL . PHP_EOL;

// Actions:
$contaBruno->depositBalance(15000);
// $contaBruno->takeBalance(1000);

$contaJulia->depositBalance(10000);
// $contaJulia->takeBalance(3000);

$contaBruno->transferTo($contaJulia, 2500.5);

// Results:
showResults($contaBruno);
showResults($contaJulia);
echo '------------' . PHP_EOL . PHP_EOL;

unset($contaJulia);
echo "(atualmente) Contas ativas: " . Conta::getNumberOfOnlineAccounts();

fim();
