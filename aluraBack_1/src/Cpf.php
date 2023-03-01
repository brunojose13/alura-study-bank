<?php

class Cpf
{
    private $cpf;

    public function  __construct(string $informedCpf)
    {
        $informedCpf = filter_var($informedCpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($informedCpf === false) {
            echo "Cpf inválido";
            exit();
        }

        $this->cpf = $informedCpf;
    }

    /// /////////////////////////////////////////////////// ///

    public function returnCpf(): string
    {
        return $this->cpf;
    }
}
