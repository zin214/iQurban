<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
