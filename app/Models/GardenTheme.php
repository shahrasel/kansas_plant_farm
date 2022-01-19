<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GardenTheme
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $images
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GardenTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GardenTheme extends Model
{
    use HasFactory;
    public $guarded = [];
}
