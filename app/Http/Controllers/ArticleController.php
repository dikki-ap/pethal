<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.articles.index', [
            "title" => "Article List",
            // Cek jika admin yang login menggunakan fungsi guard()
            // Jika admin login tampilkan semua material menggunakan Materiall:all()
            // Jika bukan, tampilkan berdasarkan 'id' teacher yang sedang login, dan material dengan field 'teacher_id'
            "articles" => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create', [
            "title" => "Add Article",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menampung inputan user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        // Buat 'short_title' dengan limit 200 huruf
        $validatedData['short_title'] = Str::limit(strip_tags($request['title']), 27);
        
        // Buat 'excerpt' dengan limit 200 huruf
        $validatedData['excerpt'] = Str::limit(strip_tags($request['description']), 75);

        // Tambahkan data Material ke DB dengan fungsi create()
        Article::create($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/article')->with('success', 'Successfully Added New Article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('dashboard.articles.show', [
            "title" => "Article Details",
            "article" => $article,
            // Mengambil Galleries 'url' berdasarkan 'material_id' yang sedang dipilih
            "images" => ArticleImage::select('url')->where('article_id', '=', $article->id)->get(), 
            "i" => 1
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit', [
            "title" => "Edit Material",
            "article" => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'product_type_id' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required'
        ]);

        // Update Product ke DB dengan fungsi update() berdasarkan kondisi where()
        Article::where('id', $article->id)->update($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/article')->with('success', 'Successfully Changed the Article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // Ambil semua Galleries dari Material berdasarkan 'material_id'
        $articleImages = ArticleImage::select('*')->where('article_id', '=', $article->id)->get();

        // Lakukan looping dengan foreach karena data berbentuk Array Assocative
        foreach($articleImages as $articleImage){
            // Hapus Gallery dari DB berdasarkan 'id'
            ArticleImage::destroy($articleImage->id);

            // Hapus file Gallery dari Storage berdasarkan 'url'
            Storage::delete($articleImage->url);
        }

        // Hapus Material dari DB berdasrkan 'id'
        Article::destroy($article->id);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/article')->with('success', 'Article Has Been Successfully Deleted');
    }
}
