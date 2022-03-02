<?php

namespace App\contract;

interface usercontract
{
    public function Register(array $data);
    public function Login(array $data);
    public function Find(array $data);
}
