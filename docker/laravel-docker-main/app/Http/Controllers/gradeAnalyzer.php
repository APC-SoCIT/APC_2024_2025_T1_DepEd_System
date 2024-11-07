<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class GradeAnalyzer extends Controller
{
    public function uploadGradesGemini(Request $request)
    {
        // Validate the image input
        $request->validate([
            'file' => 'required',
        ]);

        $file = $request->file('file');

        // Generate a unique filename
        $filename = $file->hashName();

        // Store the file in the storage directory
        $path = $file->storeAs('public/uploads', $filename);

        // Use Storage::path() to get the correct file path
        $imagePath = Storage::path($path);

        // Send the image to the Python service
        try {
            $response = Http::attach('file', file_get_contents($imagePath), $filename)
                ->post('http://127.0.0.1:5000/analyze');
        
            $analysisResult = $response->json();
        
            // Parse the `text` field if it's a string that resembles an array
            if (isset($analysisResult['text'])) {
                // Remove any code block markers or newline characters
                $textData = trim($analysisResult['text'], "```python \n");
                
                // Safely parse the string into a PHP array if it’s valid array syntax
                $analysisResult['text'] = eval("return $textData;");
            }
        
            session()->flash('analysis', $analysisResult);
        
            return redirect()->back();
        
        } catch (\Exception $e) {
            session()->flash('error', 'Image analysis failed: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
