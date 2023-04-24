<?php

namespace Alura\Bank;

use Alura\Bank\Cpf;

abstract class Pessoa
{
    protected $name;
    protected $cpf;
    

    protected function __construct(string $informedName, string $informedCpf)
    {
        $this->nameValidation($informedName);
        $this->cpf = new Cpf($informedCpf);
    }

    // =-=-=-=-=-=-= //

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpf(): string
    {
        return $this->cpf->returnCpf();
    }

    protected function nameValidation(string $informedName): void
    {
        if (strlen($informedName) < 5) {
            echo "O nome precisa ter pelo menos 5 caracteres!";
            exit();
        }

        $this->name = $informedName;
    }
}
