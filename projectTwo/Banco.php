<?php

require_once 'src/Conta.php';
require_once 'src/Endereco.php';
require_once 'src/Titular.php';

$address = new Endereco('Rua João Pires Monteiro', '002', 'Jd. Sapopemba', 'São Paulo');

// Accounts:
$contaBruno = new Conta(
    new Titular(
        'Bruno José', 
        '495.679.608-01', 
        $address)
    );
    
$contaJulia = new Conta(
    new Titular(
        'Júlia Ribeiro Gonçalves', 
        '987.654.321-01', 
        $address)
    );

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

echo "(posteriormente) Contas ativas: " . Conta::getNumberOfOnlineAccounts() . PHP_EOL . PHP_EOL;


/// /////////////////////////////////////////////////// ///

function showResults(Conta $user): void
{
    echo $user->getUser()->getName() . PHP_EOL;
    echo "  CPF: " . $user->getUser()->getCpf() . PHP_EOL;
    echo "  Saldo: " . $user->getBalance() . PHP_EOL;
    echo "  Endereço: " . $user->getUser()->getFullAddress() . PHP_EOL . PHP_EOL;
}
