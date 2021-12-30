<?php
namespace App\Helpers;

use App\Room;

class Helper {
    public static function defaultPaginate()
    {
        return 10;
    }

    public static function displayMoney($int, $currency = "BD")
    {
        return $currency.number_format($int, 2);
    }

    public static function getImageUrl($path){
        return url('/storage'.$path);
    }

    public static function getAvgRating(Room $room)
    {
        $ratings = $room->roomReviews()->get()->pluck('rating');
        if($ratings->isEmpty()) return null;
        return round(array_sum($ratings->toArray()) / count($ratings));
    }
}
