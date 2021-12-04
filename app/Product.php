<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function organizer()
    {
        return $this->hasOne(Organizer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }


    public function getDateCarbonAttribute(){

        return new Carbon($this->date);

    }

    public function getStatusAttribute(){

        $event_date = new Carbon($this->date);
        $today = Carbon::now('Asia/Kuala_Lumpur');

        return $today->lessThan($event_date) ? 'On-Going' : 'Finished';

    }

    public function getCategoryTextAttribute(){

        return $this->category == 1 ? 'Qurban' : 'Aqiqah';

    }

    public function getTypeTextAttribute(){

        switch ($this->type){
            case 1:
                return 'Cow(Whole)';
            case 2:
                return 'Cow(Part)';
            case 3:
                return 'Lamb(Whole)';
            case 4:
                return 'Lamb(Part)';
            default:
                return '';
        }
    }

    public static function categoryLists(){

        return [
            1 => 'Qurban',
            2 => 'Aqiqah'
        ];
    }

    public static function typeLists(){

        return [
            1 => 'Cow(Whole)',
            2 => 'Cow(Part)',
            3 => 'Lamb(Whole)',
            4 => 'Lamb(Part)'
        ];
    }
}
