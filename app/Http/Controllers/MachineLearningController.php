<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use TensorFlow;

class MachineLearningController extends Controller
{
    public function showForm()
    {
        return view('predict');
    }

    public function predictFromForm(Request $request)
    {

    }
}
