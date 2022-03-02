<?php

namespace App\Contracts;

interface studentContract
{
    public function studentRegister(array $data);
    public function studentLogin(array $data);
    public function studentFind($data);
}
