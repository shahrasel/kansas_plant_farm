<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\cvsuploader
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|cvsuploader newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|cvsuploader newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|cvsuploader query()
 * @method static \Illuminate\Database\Eloquent\Builder|cvsuploader whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|cvsuploader whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|cvsuploader whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class cvsuploader extends Model
{
    use HasFactory;
}
