<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'id','name','value','title', 'type','active'
    ];

    public static function value($name){
    	$row = self::where('name', $name)->first();
    	if ($row) {
    		return $row->value;
    	}
    }
}

