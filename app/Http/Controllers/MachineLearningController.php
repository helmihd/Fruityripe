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
        // Validasi form
        $request->validate([
            'image' => 'required|image',
        ]);

        // Tentukan path lengkap ke model
        $modelPath = storage_path('saved_model.pb');

        // Baca gambar dari form
        $image = file_get_contents($request->file('image')->getRealPath());

        // Load model TensorFlow dari path
        $model = TensorFlow::loadModel($modelPath);

        // Lakukan prediksi dengan model
        $outputImage = TensorFlow::predict($model, $image);

        // Tampilkan hasil prediksi ke view
        return view('predict')->with('outputImage', $outputImage);
    }
}
