<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    public function menus(){
        return $this->hasmany(Menu::class);
    }
}
