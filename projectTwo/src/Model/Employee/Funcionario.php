<?php

namespace Alura\Bank\Model\Employee;

use Alura\Bank\Pessoa;

class Funcionario extends Pessoa
{
    private $cargo;

    public function __construct(string $informedName, string $informedCpf, string $cargo)
    {
        parent::__construct($informedName, $informedCpf);
        $this->cargo = $cargo;
    }

    public function changeName(string $newName): void
    {
        $this->nameValidation($newName);
    }
}
