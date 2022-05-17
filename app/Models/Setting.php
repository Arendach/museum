<?php

namespace App\Models;

use App\Casts\SettingCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $casts = [
        'content'    => SettingCast::class,
        'content_ru' => SettingCast::class,
        'content_en' => SettingCast::class,
    ];

    protected $guarded = [];
    public $timestamps = false;
}
