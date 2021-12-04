<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute(){

        return ($this->product->price * $this->quantity);
    }

}
