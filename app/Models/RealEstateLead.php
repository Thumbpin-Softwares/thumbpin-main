<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstateLead extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'real_estate_leads';

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'contact',
        'requirement',
        'marketing_budget',
        'ip',
        'user_agent',
        'url',
    ];

    protected $dates = ['deleted_at'];
}
