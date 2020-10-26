<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date_posted',
        'valid_through',
        'organization_name',
        'organization_url',
        'employment_type',
        'location_street',
        'location_postal_code',
        'location_locality',
        'location_country',
    ];

    protected $casts = [
        'date_posted' => 'date',
        'valid_through' => 'date',
    ];
}
