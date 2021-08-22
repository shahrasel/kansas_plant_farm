<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orderAdditional()
    {
        return $this->hasOne(OrderAdditional::class);
    }

    public static function withAdditional($arr)
    {


        return static::leftJoin(
            'order_additionals as oa',
            'oa.id', '=', 'orders.order_additional_id'
        )->Where(function ($query) use ($arr) {
            if(array_key_exists('f_first_name', $arr)) {
                $query->where('oa.first_name', '=',  $arr['f_first_name']);
            }
            if(array_key_exists('f_last_name', $arr)) {
                $query->where('oa.last_name', '=',  $arr['f_last_name']);
            }
            if(array_key_exists('f_email', $arr)) {
                $query->where('oa.email_address', '=',  $arr['f_email']);
            }
            if(array_key_exists('f_cell', $arr)) {
                $query->where('oa.phone', '=',  $arr['f_cell']);
            }
            if(array_key_exists('f_order_id', $arr)) {
                $query->where('orderid', '=',  $arr['f_order_id']);
            }
        })->select('orderid','first_name','last_name','email_address','phone','total_price','status','orders.created_at','orders.id');
    }

    public static function stateLists() {
        return array(
            'AL'=>"Alabama",
            'AK'=>"Alaska",
            'AZ'=>"Arizona",
            'AR'=>"Arkansas",
            'CA'=>"California",
            'CO'=>"Colorado",
            'CT'=>"Connecticut",
            'DE'=>"Delaware",
            'DC'=>"District Of Columbia",
            'FL'=>"Florida",
            'GA'=>"Georgia",
            'HI'=>"Hawaii",
            'ID'=>"Idaho",
            'IL'=>"Illinois",
            'IN'=>"Indiana",
            'IA'=>"Iowa",
            'KS'=>"Kansas",
            'KY'=>"Kentucky",
            'LA'=>"Louisiana",
            'ME'=>"Maine",
            'MD'=>"Maryland",
            'MA'=>"Massachusetts",
            'MI'=>"Michigan",
            'MN'=>"Minnesota",
            'MS'=>"Mississippi",
            'MO'=>"Missouri",
            'MT'=>"Montana",
            'NE'=>"Nebraska",
            'NV'=>"Nevada",
            'NH'=>"New Hampshire",
            'NJ'=>"New Jersey",
            'NM'=>"New Mexico",
            'NY'=>"New York",
            'NC'=>"North Carolina",
            'ND'=>"North Dakota",
            'OH'=>"Ohio",
            'OK'=>"Oklahoma",
            'OR'=>"Oregon",
            'PA'=>"Pennsylvania",
            'RI'=>"Rhode Island",
            'SC'=>"South Carolina",
            'SD'=>"South Dakota",
            'TN'=>"Tennessee",
            'TX'=>"Texas",
            'UT'=>"Utah",
            'VT'=>"Vermont",
            'VA'=>"Virginia",
            'WA'=>"Washington",
            'WV'=>"West Virginia",
            'WI'=>"Wisconsin",
            'WY'=>"Wyoming");
    }
}
