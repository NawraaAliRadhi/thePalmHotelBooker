<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $details
 * @property integer $price_per_night
 * @property integer $price_per_day
 * @property integer $price_per_week
 * @property string $room_types
 * @property boolean $is_room_available
 * @property integer $floor_number
 * @property string $created_at
 * @property string $updated_at
 * @property Reservation[] $reservations
 * @property RoomImage[] $roomImages
 * @property RoomReview[] $roomReviews
 */
class Room extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'details', 'price_per_night', 'price_per_day', 'price_per_week', 'room_types', 'is_room_available', 'floor_number', 'created_at', 'updated_at', 'bed_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomImages()
    {
        return $this->hasMany('App\RoomImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomReviews()
    {
        return $this->hasMany('App\RoomReview');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function amenities()
    {
        return $this->hasMany('App\RoomAmenity');
    }

    public function room_amenities()
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }
}