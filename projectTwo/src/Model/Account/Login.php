<?php

namespace Alura\Bank\Model\Account;

use Alura\Bank\Model\Account\Authenticator;
use Alura\Bank\Model\Account\Titular;
use Alura\Bank\Endereco;
use Alura\Bank\Database;
use Exception;

class Login extends Database implements Authenticator
{
    protected $email;
    protected $password;
    
    function __construct(string $email, string $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    function authenticate(): ?Titular
    {
        foreach ($this->accounts as $account) {

            if ($this->email == $account['email'] && $this->password == $account['password']) {

                return new Titular(
                    $account['property']['name'], 
                    $account['property']['cpf'], 

                    new Endereco(
                        $account['property']['address']['street'], 
                        $account['property']['address']['number'],
                        $account['property']['address']['neighborhood'],
                        $account['property']['address']['city']
                    )
                );
            }
        }

        echo 'E-mail ou senha inválidos!' . PHP_EOL . PHP_EOL;
        return null;
    }
}
