<?php

namespace App\Services;

interface CurrencyService
{
    public function list();

    public function show($code);
}
