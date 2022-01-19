<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SettingAdditional
 *
 * @property int $id
 * @property int $setting_id
 * @property string|null $terms_conditions
 * @property string|null $our_gurantee
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Setting $setting
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional whereOurGurantee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional whereTermsConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingAdditional whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SettingAdditional extends Model
{
    use HasFactory;

    public function setting() {
        return $this->belongsTo(Setting::class);
    }
}
