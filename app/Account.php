<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $data = json_decode($json);
        if ($data) {
            foreach ($data as $el) {
                Account::create( (array) $el);
            }
        }
    }
}
