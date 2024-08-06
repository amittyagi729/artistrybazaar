<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;

class CountryController extends Controller
{
    public function getAllCountries(){
        $countries = Countries::all();
        return $countries;
    }
}
