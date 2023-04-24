<?php

require_once 'autoload.php';

use Alura\Bank\Model\Account\Conta;
use Alura\Bank\Model\Account\Titular;
use Alura\Bank\Endereco;


function showResults(Conta $account): void
{
    echo                  $account->getCustomer()->getName() . PHP_EOL;
    echo      "  CPF: " . $account->getCustomer()->getCpf() . PHP_EOL;
    echo    "  Saldo: " . $account->getBalance() . PHP_EOL;
    echo "  Endereço: " . $account->getCustomer()->getFullAddress() . PHP_EOL . PHP_EOL;
}


// =-=-=-=-=-=-= //

// Accounts:
$contaBruno = new Conta(
    new Titular(
        'Bruno José', 
        '495.679.608-01', 
        new Endereco(
            'Rua João Pires Monteiro', 
            '325', 
            'Jd. Sapopemba', 
            'São Paulo'
        )
    )
);

// $address->setNumber('40');

$contaJulia = new Conta(
    new Titular(
        'Júlia Ribeiro Gonçalves', 
        '987.654.321-01', 
        new Endereco(
            'Rua João Pires Monteiro', 
            '466', 
            'Jd. Sapopemba', 
            'São Paulo'
        )
    )
);

$contaJulia->getCustomer()->getAddress()->setNumber('40');

echo "(anteriormente) Contas ativas: " . Conta::getNumberOfOnlineAccounts() . PHP_EOL . PHP_EOL;

// Actions:
$contaBruno->depositBalance(5000);
$contaBruno->takeBalance(1000);

$contaJulia->depositBalance(6000);
$contaJulia->takeBalance(3000);

$contaBruno->moneyTransfer($contaJulia, 2000);

// Results:
showResults($contaBruno);
showResults($contaJulia);

unset($contaJulia);

echo 'Júlia removida!'. PHP_EOL . PHP_EOL;

echo "(posteriormente) Contas ativas: " . Conta::getNumberOfOnlineAccounts() . PHP_EOL . PHP_EOL;
