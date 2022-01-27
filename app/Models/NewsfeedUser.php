<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NewsfeedUser extends Model
{
    use HasFactory;

    public function checkIfexistsinNewsTable() {
        if(NewsfeedUser::where('email', Auth::user()->email)->count() >0) {
            return 1;
        }
    }

}
