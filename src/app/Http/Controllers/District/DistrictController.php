<?php

namespace App\Http\Controllers\District;

use App\Entity\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function index()
    {
        return response()->json(District::select('name')->get());
    }
}
