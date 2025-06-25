<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $user = User::find($model->user_id);
            if ($model->type == 'credit') {
                $user->increment('wallet_amount', $model->amount);
            } elseif ($model->type == 'debit') {
                $user->decrement('wallet_amount', $model->amount);
            }
            $user->update();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function performer()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
