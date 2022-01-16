<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class ImageViewController extends Controller
{
    public function show($id)
    {
        return view('user.profile', [
            'user' => Images::findOrFail($id)
        ]);
    }
}

