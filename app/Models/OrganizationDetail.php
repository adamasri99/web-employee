<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationDetail extends Model
{
    protected $fillable = [
        'client_id', 'company_name', 'company_address',
        'registration_number', 'industry_type',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}


