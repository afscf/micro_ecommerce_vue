<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserStreet extends Model
{
    use HasFactory;
    protected $table = 'user_street';

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_street_id');
    }
}
