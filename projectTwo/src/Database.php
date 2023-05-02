<?php

namespace Alura\Bank;

abstract class Database
{
    protected $accounts = [
        [
            'email'    => 'bruno@gmail.com',
            'password' => '12345',
            'property' => [
                'name'    => 'Bruno José', 
                'cpf'     => '123.456.789-10', 
                'address' => [
                    'street'       => 'Rua João Pires Monteiro',
                    'number'       => '687',
                    'neighborhood' => 'Jd. Sapopemba', 
                    'city'         => 'São Paulo'
                ]
            ]
        ],
        
        [
            'email'    => 'julia@gmail.com',
            'password' => '54321',
            'property' => [
                'name'    => 'Júlia Ribeiro Gonçalves', 
                'cpf'     => '987.654.321-01', 
                'address' => [
                    'street'       => 'Rua João Pires Monteiro',
                    'number'       => '466',
                    'neighborhood' => 'Jd. Jangadeiro', 
                    'city'         => 'São Paulo'
                ]
            ]
        ]
    ];
}
