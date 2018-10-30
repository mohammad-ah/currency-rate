<?php

namespace App\Services;

use App\Currencies;

class Currency implements CurrencyService
{
    protected $url = 'https://free.currencyconverterapi.com/api/v6/currencies';
    protected $rate_url = 'https://free.currencyconverterapi.com/api/v6/convert?q=USD_';

    public function list()
    {
        $currencies = Currencies::all();
        return $currencies;
    }

    protected function fillAllCurrencies()
    {
         $currencies = Currencies::all();
         if(count($currencies) <= 0)
         {
             $currencies = collect($this->getJson($this->url));
             if(count($currencies) > 0)
             {
                $currencies = $currencies['results'];

                 foreach($currencies as $item)
                {
                    echo $item->currencyName;
                    $currency  = new Currencies;
                    $currency->name = $item->currencyName;
                    $currency->code = $item->id;
                    if(property_exists($item, 'currencySymbol'))
                    {
                        $currency->symbol = $item->currencySymbol;
                    }
                    $currency->save();

                }
             }
             return redirect('/currencies')->with('success', 'currencies filled');

          }

    }
    protected function getJson($url)
    {
        $response = file_get_contents($url, false);
        return json_decode( $response );
    }

    public function show($code)
    {
        $currency = Currencies::findOrFail($code);

        if(strtotime('-5 min') >= strtotime($currency->updated_at)){
            $rate_url = $this->rate_url.$code.'&compact=y';
            $rate = collect($this->getJson($rate_url));
             if(count($rate))
             {
                $new_rate = $rate['USD_'.strtoupper($code)]->val;

                $currency->rate = $new_rate;
                $currency->save();
             }
        }

        return $currency;
    }
}
