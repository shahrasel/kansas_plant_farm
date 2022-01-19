<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderAdditional
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email_address
 * @property string|null $phone
 * @property string|null $street_address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $person
 * @property string|null $p_first_name
 * @property string|null $p_last_name
 * @property string|null $p_email_address
 * @property string|null $p_phone
 * @property string|null $pickup_date
 * @property string|null $time
 * @property string|null $preferred_pick_optinos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional wherePreferredPickOptinos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereStreetAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderAdditional whereZip($value)
 * @mixin \Eloquent
 */
class OrderAdditional extends Model
{
    use HasFactory;
}
