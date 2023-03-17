<?php

require_once 'Cpf.php';
require_once 'Endereco.php';

class Titular
{
    private $name;
    private $cpf;
    private $address;

    public function __construct(string $informedName, string $informedCpf, Endereco $address)
    {
        $this->nameValidation($informedName);
        $this->cpf = new Cpf($informedCpf);
        $this->address = $address;
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

    public function getAddress(): Endereco
    {
        return $this->address;
    }

    public function getFullAddress(): string
    {
        return $this->getAddress()->getFullAddressFormatted();
    }

    /// /////////////////////////////////////////////////// ///

    private function nameValidation(string $informedName): void
    {
        if (strlen($informedName) < 5) {
            echo "O nome precisa ter pelo menos 5 caracteres!";
        }

        $this->name = $informedName;
        return;
    }
}
