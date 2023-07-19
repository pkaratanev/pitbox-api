<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    public function index()
    {
        return Garage::paginate(5);
    }
}
