<?php

namespace App;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade{

    protected static function getFacadeAccessor(){
       
       //return Test::class; //explicit binding
       return 'test';//implicit binding
    }

} 