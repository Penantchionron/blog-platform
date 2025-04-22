<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function downloadPaid(Request $request)
    {
        $user = Auth::user();
        $content = Content::findOrFail($request->content_id);

        // Vérifie si l'utilisateur a déjà acheté ce contenu
        $alreadyPurchased = Purchase::where('user_id', $user->id)
                                    ->where('content_id', $content->id)
                                    ->exists();

        if (! $alreadyPurchased) {
            return redirect()->back()->with('error', 'Vous devez acheter ce contenu avant de le télécharger.');
        }

        return response()->download(public_path($content->file_path)); // ajuste selon ton chemin
    }
}

