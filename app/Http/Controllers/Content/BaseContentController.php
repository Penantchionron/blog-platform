<?php

namespace App\Http\Controllers\Content;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

abstract class BaseContentController extends Controller
{  
    protected string $type; // à définir dans chaque enfant

    public function index()
    {    if (empty($this->type)) {
        abort(500, 'Le type n\'est pas défini dans le contrôleur enfant');
        }
        $items = Content::where('type', $this->type)->latest()->paginate(10);
        return view("contents.{$this->type}.index", [
            'items' => $items,
            'type' => $this->type,
        ]);
        }

    public function create()
    {
        return view("contents.{$this->type}.create");
    }
    public function store(Request $request)
    {
        // Define mime types based on content type
        $mimeRules = match ($this->type) {
            'audios' => 'mimes:mp3,wav,ogg,mpga,m4a',
            'videos' => 'mimes:mp4,mov,avi,mkv',
            'pdf'    => 'mimes:pdf',
            default  => '',
        };
    
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'media'       => array_filter([
                in_array($this->type, ['pdf', 'audios', 'videos']) ? 'required' : null,
                'file',
                $mimeRules,
                'max:3221225472', // 3GB
            ]),
            'images.*'    => $this->type === 'articles' ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'nullable',
            'price'       => 'nullable|numeric|min:0',
            'status'      => 'required|in:draft,published',
            'is_free'     => 'nullable|boolean',
        ]);
    
        $content = Content::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . uniqid(),
            'description' => $request->description,
            'type'        => $this->type,
            'path'        => null,
            'price'       => $request->price ?? 0,
            'is_free'     => $request->has('is_free'),
            'status'      => $request->status ?? 'draft',
            'user_id'     => Auth::id(),
        ]);
    
        if (in_array($this->type, ['pdf', 'audios', 'videos']) && $request->hasFile('media')) {
            $media = $content->addMedia($request->file('media'))->toMediaCollection('media');
    
            $content->update([
                'path' => $media->getUrl(), // For playback or display
            ]);
        }
    
        return redirect()->route("{$this->type}.index")->with('success', ucfirst($this->type) . ' créé avec succès.');
    }
    
    
   
}
