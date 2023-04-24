<?php
namespace Alura\Bank\Model\Account;

use Alura\Bank\Pessoa;
use Alura\Bank\Endereco;

class Titular extends Pessoa
{
    private $address;

    public function __construct(string $informedName, string $informedCpf, Endereco $address)
    {
        parent::__construct($informedName, $informedCpf);        
        $this->address = $address;
    }


    // =-=-=-=-=-=-= //


    /// /////////////////////////////////////////////////// ///

    // public function getName(): string
    // {
    //     return $this->name;
    // }

    // public function getCpf(): string
    // {
    //     return $this->cpf->returnCpf();
    // }

    public function getAddress(): Endereco
    {
        return $this->address;
    }

    public function getFullAddress(): string
    {
        return $this->getAddress()->getFullAddressFormatted();
    }

    /// /////////////////////////////////////////////////// ///

    // private function nameValidation(string $informedName): void
    // {
    //     if (strlen($informedName) < 5) {
    //         echo "O nome precisa ter pelo menos 5 caracteres!";
    //     }

    //     $this->name = $informedName;
    //     exit();
    // }
}
