<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoProductionLead extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'video_production_leads';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'video_type',
        'budget_range',
        'message',
        'ip',
        'user_agent',
        'url',
    ];

    protected $dates = ['deleted_at'];
}
