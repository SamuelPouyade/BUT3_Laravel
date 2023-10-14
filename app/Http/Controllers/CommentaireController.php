<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $request->validate([
            'contenu' => 'required',
        ]);

        Commentaire::create([
            'contenu' => $request->input('contenu'),
            'article_id' => $articleId,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('article.show', $articleId)->with('success', 'Commentaire ajouté avec succès');
    }
}
