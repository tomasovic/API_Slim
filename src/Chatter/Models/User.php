<?php
namespace Chatter\Models;


class User extends \Illuminate\Database\Eloquent\Model
{
    public function authenticate($apikey)
    {
        // asking for the first result
        $user = User::where('apikey', '=', $apikey)->take(1)->get();
        // taking first item from the result array
        $this->details = $user[0];

        // is this api key valid for the current user
        return ($user[0]->exists) ? true : false;
    }
}