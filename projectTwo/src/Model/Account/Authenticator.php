<?php

namespace Alura\Bank\Model\Account;
use Alura\Bank\Model\Account\Titular;

interface Authenticator
{
   public function authenticate(): ?Titular;
}
