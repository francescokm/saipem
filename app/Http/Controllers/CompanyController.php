<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    function show(){
        $companies = Company::select("*")
                        ->get()
                        ->toArray();
        dd($companies);
    }
}
