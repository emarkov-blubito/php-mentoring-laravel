<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class Account extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'first_order', 
        'rating_date', 
        'last_order', 
        'registration',
        'last_modified', 
        'address', 
        'rating_description', 
        'ebilling_mail',
        'payment_terms', 
        'ta', 
        'country_code', 
        'rating_indicator',
        'mc_code',
        'ebilling', 
        'average_days', 
        'phone', 
        'customer_code',
    ];

    public static function seedData($json)
    {
        if ($json) {
            foreach ($json as $el) {
                //Log::info($el);
                Account::create($el);
            }
        }
    }
}
