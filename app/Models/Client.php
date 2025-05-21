<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'client_id';

    protected $fillable = [
        'full_name', 'title', 'customer_type', 'email', 'phone_number',
        'gender', 'birthday', 'address', 'working_location',
        'department', 'start_date', 'created_by', 'notes',
    ];

    public function organization()
    {
        return $this->hasOne(OrganizationDetail::class, 'client_id');
    }

    public function privateDetail()
    {
        return $this->hasOne(PrivateDetail::class, 'client_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }
}


