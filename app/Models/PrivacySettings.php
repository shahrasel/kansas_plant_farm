<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PrivacySettings
 *
 * @property int $id
 * @property int $setting_id
 * @property string|null $privacy_policy
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Setting $setting
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings wherePrivacyPolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacySettings whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PrivacySettings extends Model
{
    use HasFactory;

    public function setting() {

        return $this->belongsTo(Setting::class);
    }
}
