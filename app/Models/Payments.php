<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    //
    protected $table = "payments";

    public static function CreateData($input)
    {
        $payment = new self;
        $payment->user_id = $input['user_id'];
        $payment->order_id = $input['order_id'];
        $payment->save();
        return $payment;
    }
}
