<?php

require_once 'Cpf.php';

class Titular
{
    private $name;
    private $cpf;

    public function __construct(string $informedName, string $informedCpf)
    {
        $this->nameValidation($informedName);
        $this->cpf = new Cpf($informedCpf);
    }

    /// /////////////////////////////////////////////////// ///

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpf(): string
    {
        return $this->cpf->returnCpf();
    }

    /// /////////////////////////////////////////////////// ///

    private function nameValidation(string $informedName): void
    {
        if (strlen($informedName) > 5) {
            $this->name = $informedName;
            return;
        }
        
        echo "O nome precisa ter pelo menos 5 caracteres!";
    }
}
