<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function index(){

        $phones = Phone::all();

        return $phones;
        
    }

}
