<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class MachineLearningController extends Controller
{
    public function showForm()
    {
        return view('predict');
    }

    public function detectObjects(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar ke penyimpanan sementara
        $imagePath = $request->file('image')->store('temp');

        $storagePath = storage_path('app/' . $imagePath);
        //$pythonScriptPath = storage_path('YOLOv5_EfficientNetLite_Web/detect.py');
        $pythonScriptPath = 'app.py';

        $pythonImageFilePath = str_replace('\\', '/', $storagePath);
        $pythonScriptFilePath = str_replace('\\', '/', $pythonScriptPath);

        // Jalankan skrip Python dengan PyTorch
        $process = new Process([
            '/usr/bin/python',
            $pythonScriptPath,
            //$pythonScriptFilePath,  // Sesuaikan dengan path sebenarnya
            // Gantilah dengan path sebenarnya
            //'--image_path=' . ($pythonImageFilePath),
        ]);


        $process->run();
        // Dapatkan hasil dari output skrip Python
        $output = $process->getOutput(); 
        $returnCode = $process->getExitCode();
               
        dd($returnCode);

        // Proses output atau kirim ke view
        return response()->json(['result' => $output]);
    }
}
