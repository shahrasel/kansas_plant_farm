<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CurrentPasswordVerification implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        //return $value >= 1896 && $value <= date('Y') && $value % 4 == 0;
        /*$hasher = app('hash');
        if ($hasher->check($value, $this->user->password)) {
            echo 'ddd';
        }
        else{
            echo 'eee';
            //return back()->with('error','You have entered wrong password');
        }
        exot


        if(Hash::check($value, $this->user->password)) {
            echo 'dd';
        }
        else {
            echo 'ee';
        }
        exit;*/

        return Hash::check($value, $this->user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Given password didn\'t match the existing password';
    }
}
