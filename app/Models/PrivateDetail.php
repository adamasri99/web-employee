<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateDetail extends Model
{
    protected $fillable = [
        'client_id', 'private_address', 'industry_type',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
