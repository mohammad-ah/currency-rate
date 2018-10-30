<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    protected $curr;

    public function __construct(CurrencyService $curr)
    {
    	$this->curr = $curr;
    }

    public function index()
    {
        return $this->curr->list();
    }

    public function show($code)
    {
        $currency = $this->curr->show($code);

        return response()->json([
            'rate' => $currency->rate,
            'updated_at' => $currency->updated_at->toDateTimeString()
        ]);
    }
}
