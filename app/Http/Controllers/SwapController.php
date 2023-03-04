<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwapController extends Controller
{
    
    public function store(Request $request)
    {
        $nilaiA = $request->A;
        $nilaiB = $request->B;

        $nilaiA = $nilaiA + $nilaiB;
        $nilaiB = $nilaiA - $nilaiB;
        $nilaiA = $nilaiA - $nilaiB;

        return [$nilaiA, $nilaiB];

        // return view('extra', compact('nilaiA','nilaiB'))->with('status', 'Variabel Berhasil Ditukar!');

    }
}
