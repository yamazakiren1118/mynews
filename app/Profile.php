<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        // 'user_id' => 'required',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function histories()
    {
        return $this->hasMany('App\HistorieProfile');
    }
}
