<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'description',
        'features',
        'raised_amount',
        'target_amount',
        'equity_percentage',
        'pre_monthly_valuation',
        'share_price',
        'idea',
        'team',
        'campaign_end_date',
        'cover_photo_url',
        "cover_photo_medium_url",
        "cover_photo_large_url",
        'profile_photo_url',
        'team_photo_url',
        'idea_video_url',
        'total_investors',
        
    ];

}
