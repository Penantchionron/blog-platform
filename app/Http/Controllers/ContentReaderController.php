<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
class ContentReaderController extends Controller
{
    // Affiche un contenu (lecture en ligne)
    public function show($id)
        {
            $content = Content::findOrFail($id);
            
            return view('frontend.contents.show', compact('content'));
        }
        public function stream($id)
        {
            $content = Content::findOrFail($id);
            // Debug information
            \Log::info('Content ID: ' . $id);
            \Log::info('Content type: ' . $content->type);
            \Log::info('File path: ' . $content->path);
        
            // Si MediaLibrary est utilisé
            if ($content->hasMedia('media')) {
                $media = $content->getFirstMedia('media');
                $path = $media->getPath();
                
                \Log::info('Media path: ' . $path);
                \Log::info('Media exists: ' . (file_exists($path) ? 'Yes' : 'No'));
        
                if (!file_exists($path)) {
                    abort(404, 'Fichier introuvable (Media).');
                }
        
                // Set proper Content-Type header for audio files
                $headers = [];
                if ($content->type === 'audios') {
                    $extension = pathinfo($path, PATHINFO_EXTENSION);
                    $mimeType = $this->getAudioMimeType($extension);
                    $headers = ['Content-Type' => $mimeType];
                }
        
                return response()->file($path, $headers);
        }
        
            // Si le fichier est dans le champ `file_path`
            if (!empty($content->path)) {
                // Try both with and without leading slash
                $paths = [
                    storage_path('app/' . ltrim($content->path, '/')),
                    storage_path('app' . $content->path),
                    storage_path($content->path),
                    $content->Path // If it's an absolute path
                ];
        
                $foundPath = null;
                foreach ($paths as $path) {
                    \Log::info('Checking path: ' . $path);
                    \Log::info('Path exists: ' . (file_exists($path) ? 'Yes' : 'No'));
                    
                    if (file_exists($path)) {
                        $foundPath = $path;
                        break;
                    }
                }
        
                if (!$foundPath) {
                    abort(404, 'Fichier introuvable (Storage).');
                }
        
                // Set proper Content-Type header for audio files
                $headers = [];
                if ($content->type === 'audios') {
                    $extension = pathinfo($foundPath, PATHINFO_EXTENSION);
                    $mimeType = $this->getAudioMimeType($extension);
                    $headers = ['Content-Type' => $mimeType];
                }
        
                return response()->file($foundPath, $headers);
            }
        
            return redirect()->back()->with('error', 'Le fichier n\'est pas disponible.');
        }
        
        // Helper function to get the correct MIME type for audio files
        private function getAudioMimeType($extension)
        {
            $mimeTypes = [
                'mp3' => 'audio/mpeg',
                'wav' => 'audio/wav',
                'ogg' => 'audio/ogg',
                'm4a' => 'audio/mp4',
                'aac' => 'audio/aac',
                'flac' => 'audio/flac'
            ];
        
            return $mimeTypes[strtolower($extension)] ?? 'audio/mpeg';
        }

    // Téléchargement sécurisé
    public function download($id)
    {
        $content = Content::findOrFail($id);

        if (!Session::get("paid_content_{$id}") && !$content->is_free) {
            return redirect()->route('accueil')->with('error', 'Paiement requis pour ce téléchargement.');
        }

        // Si vous utilisez Spatie Media Library
        if ($content->hasMedia('media')) {
            $media = $content->getFirstMedia('media');
            return response()->download($media->getPath(), $media->file_name);
        }
        
        // Si vous stockez directement le chemin
        if (!empty($content->path)) {
            return response()->download(public_path($content->path));
        }
        
        return redirect()->back()->with('error', 'Fichier non disponible.');
    }
}