# currency-rate

This project has two APIs:

currencies/ which will update the DB with all new currencies from the external API: 
> https://free.currencyconverterapi.com/api/v6/currencies

And return all available currencies as JSON

And it has the command: 

> **php artisan currencies:bootstrap**

which will update the DB with all new currencies from the same external API

It also has an API to update the currency if not updated for the last 5 min:

currencies/{currencyName}

EX:
currencies/ILS

will return:

{"rate":3.71238,"updated_at":"2018-10-31 00:15:53"}

And this API is taking the rate from an external API also: 

>https://free.currencyconverterapi.com/api/v6/convert?q=USD_ils&compact=y
