<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $home_description
 * @property string|null $home_description_video
 * @property string|null $privacy_policy
 * @property string|null $terms_conditions
 * @property string|null $our_gurantee
 * @property string|null $about_us_images
 * @property string|null $spring_plant_link
 * @property string|null $summer_plant_link
 * @property string|null $fall_plant_link
 * @property string|null $winter_plant_link
 * @property string|null $red_plant_link
 * @property string|null $orange_plant_link
 * @property string|null $yellow_plant_link
 * @property string|null $green_plant_link
 * @property string|null $blue_plant_link
 * @property string|null $lavendar_plant_link
 * @property string|null $purple_plant_link
 * @property string|null $pink_plant_link
 * @property string|null $magenta_plant_link
 * @property string|null $white_plant_link
 * @property string|null $facebook_link
 * @property string|null $twitter_link
 * @property string|null $instagram_link
 * @property string|null $youtube_link
 * @property string|null $address
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $nursery_hours
 * @property string|null $pricing_sheet_link
 * @property string|null $order_form_link
 * @property string|null $nursery_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PrivacySettings|null $privacySettings
 * @property-read \App\Models\SettingAdditional|null $settingAdditional
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAboutUsImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereBluePlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFallPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereGreenPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHomeDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHomeDescriptionVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereInstagramLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLavendarPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMagentaPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNurseryHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNurseryLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereOrangePlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereOrderFormLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereOurGurantee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePinkPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePricingSheetLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePrivacyPolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePurplePlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereRedPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSpringPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSummerPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTermsConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTwitterLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWhitePlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWinterPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereYellowPlantLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereYoutubeLink($value)
 * @mixin \Eloquent
 */
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
