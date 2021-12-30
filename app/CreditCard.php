<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $card_type
 * @property string $card_number
 * @property string $card_holder_name
 * @property string $cvc
 * @property string $expiry_month
 * @property string $expiry_year
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Payment[] $payments
 */
class CreditCard extends Model
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
    protected $fillable = ['user_id', 'card_type', 'card_number', 'card_holder_name', 'cvc', 'expiry_month', 'expiry_year', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
