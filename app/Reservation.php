<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $room_id
 * @property integer $user_id
 * @property string $checkin
 * @property string $checkout
 * @property integer $total_price
 * @property integer $guest_numbers
 * @property boolean $is_approved
 * @property integer $number_of_nights
 * @property string $created_at
 * @property string $updated_at
 * @property Room $room
 * @property User $user
 */
class Reservation extends Model
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
    protected $fillable = ['room_id', 'user_id', 'checkin', 'checkout', 'total_price', 'guest_numbers', 'is_approved', 'number_of_nights', 'created_at', 'updated_at'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updating(function ($reservation) {
            /** Cancellation Rules*/
            if ($reservation->isDirty('cancelled_at')) {
                $daysToCancel = now()->diffInDays(Carbon::parse($reservation->checkin));
                // 50% Cancellation is applied.
                if ($daysToCancel < 7) {
                    $reservation->cancellation_price = $reservation->total_price * .5;
                }

                // 80% Cancellation is applied
                if ($daysToCancel < 3) {
                    $reservation->cancellation_price = $reservation->total_price * .8;
                }

                // 95% Cancellation is applied
                if ($daysToCancel < 1) {
                    $reservation->cancellation_price = $reservation->total_price * .95;
                }
            }
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function scopeWithoutCancelled($query)
    {
        return $this->whereNull('cancelled_at');
    }
}