<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Billboard
 *
 * @property int $id
 * @property string|null $heading
 * @property string|null $subheading
 * @property string|null $button_text
 * @property string|null $button_url
 * @property string|null $image
 * @property int|null $order
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard query()
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereButtonText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereButtonUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereSubheading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Billboard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Billboard extends Model
{
    use HasFactory;
}
