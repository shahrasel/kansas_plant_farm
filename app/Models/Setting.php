<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public function settingAdditional() {
        return $this->hasOne(SettingAdditional::class);
    }


    public function privacySettings() {
        return $this->hasOne(PrivacySettings::class);
    }
}
