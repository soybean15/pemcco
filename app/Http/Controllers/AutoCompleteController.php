<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    //

        public function getOccupations(Request $request)
        {

            $occupations = Occupation::search($request->search)->limit(10)->get();
            return response()->json(   $occupations);
        }
}
