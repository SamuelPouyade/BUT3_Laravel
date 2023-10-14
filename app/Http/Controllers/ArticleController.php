<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\User;
use App\Notifications\ArticleCreatedNotification;
use Illuminate\Http\Request;
use App\Events\ArticleCreated;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{

    /**
     * Affiche la liste des articles
     */
    public function index()
    {
        $articles = Article::paginate(15);

        return view('article.index', ['articles' => $articles]);
    }


    /**
     * return le formulaire de création d'un article
     */
    public function create()
    {

        return view('article.create');

    }


    /**
     * Enregistre un nouveau article dans la base de données
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'Contenu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $article = new Article([
                'titre' => $request->input('titre'),
                'Contenu' => $request->input('Contenu'),
                'image' => $imagePath,
            ]);
        } else {
            $article = new Article([
                'titre' => $request->input('titre'),
                'Contenu' => $request->input('Contenu'),
            ]);
        }


        $article->user_id = auth()->user()->id;
        $article->auteur = auth()->user()->name;
        $article->save();

        $users = User::all();

        $notification = new ArticleCreatedNotification($article);

        foreach ($users as $user) {
            $user->notify($notification);
        }

        return redirect('/')->with('success', 'Article ajouté avec succès');
    }


    /**
     * Affiche les détails d'un article spécifique
     */

    public function show($id)
    {

        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));

    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if (auth()->check() && $article) {
            if ($article->user_id === auth()->user()->id) {
                return view('article.edit', compact('article'));
            }
        }

        return redirect('/')->with('error', 'Vous n\'êtes pas autorisé à modifier cet article.');
    }



    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre'=>'required',
            'Contenu'=> 'required',
        ]);


        $article = article::findOrFail($id);
        $article->titre = $request->get('titre');
        $article->content = $request->get('Contenu');
        $article->update();

        return redirect('/')->with('success', 'article Modifié avec succès');

    }

    /**
     * Supprime l'article de la base de données
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if (auth()->check() && $article) {
            if ($article->user_id === auth()->user()->id) {
                $article->commentaires()->delete();
                $article->delete();
                return redirect('/')->with('success', 'article Supprimé avec succès');
            }
        }

        return redirect('/')->with('error', 'Vous n\'êtes pas autorisé à supprimer cet article.');

    }

}
