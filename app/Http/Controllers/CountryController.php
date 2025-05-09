<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Inertia\Inertia;
class CountryController extends Controller
{
    public function create()
    {
        $countries = Country::select( 'name', 'code')->get();

        return Inertia::render('Inspection', [
            'countries' => $countries,
        ]);
    }
}
