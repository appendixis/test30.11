<?php

namespace App\Http\Controllers;

use App\Models\RandomInteger;
use Illuminate\Http\Request;

class RandomIntegerController extends Controller
{
    /**
     * @param RandomInteger $randomInteger
     * @return RandomInteger
     */
    public function retrieve(RandomInteger $randomInteger): RandomInteger
    {
        return $randomInteger;
    }

    /**
     * @return RandomInteger
     */
    public function generate(): RandomInteger
    {
        return RandomInteger::create([
            'number' => mt_rand(),
        ]);
    }
}
