<?php

namespace App\Http\Controllers\Street;

use App\Entity\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StreetController extends Controller
{
    public function index()
    {
        return response()->json(Street::select('name')->get(), 200, [], JSON_UNESCAPED_UNICODE);
    }
}
