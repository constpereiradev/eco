<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bio;
use App\Models\User;

class BioController extends Controller
{
    public function index(){

        
        $bios = Bio::all();
        return response()->json([$bios]);
    }
}
