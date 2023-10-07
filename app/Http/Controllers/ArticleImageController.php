<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.article_images.index', [
            "title" => "Gallery List",
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
    public function create(ArticleImage $articleImage)
    {
        // Mengambil 'product_id' yang di klik user menggunakan $_GET
        $article_id = $_GET['article_id'];

        return view('dashboard.article_images.delete', [
            "title" => "Delete Image",
            "galleries" => $articleImage,
            "article_id" => $article_id,
            "product_name" => Article::where('id', '=', $article_id)->pluck('title'), // Menampilkan nama material berdasarkan 'article_id' yang diambil
            "images" => $articleImage::select('*')->where('article_id', '=', $article_id)->get() // Menampilkan semua galleries berdasarkan 'material_id' yang diambil
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
        // Mengambil nama material menggunakan $_POST
        $article_title = $_POST["article_title"];

        // Menampung data yang diinput user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            "article_id" => 'required',
            "url" => 'image|file|max:2048|mimes:png,jpg,jpeg',
        ]);

        // Jika Imagenya ada di upload
        if($request->file('url')){

            $filenameWithExt = $request->file('url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('url')->getClientOriginalExtension();
            $newFileName = $filename . '_' . time() . '.' . $ext;

            // Menyimpan Image ke Storage di dalam folder 'product-images'
            $validatedData['url'] = $request->file('url')->storeAs('article-images', $newFileName);
        }else{
            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/article-image')->with('failed', 'Image Must be Uploaded!');
        }

        // Simpan data yang diinput ke dalam DB dengan fungsi create()
        ArticleImage::create($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/article-image')->with('success', 'Successfully Added New Image to '. $article_title);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleImage $articleImage)
    {
        // Mengambil 'material_id' menggunakan $_GET
        $article_id = $_GET['article_id'];
        
        return view('dashboard.article_images.edit', [
            "title" => "Edit Image",
            "article_images" => $articleImage,
            "article_id" => $article_id,
            "article_title" => Article::where('id', '=', $article_id)->pluck('title'), // Menampilkan nama material berdasarkan 'article_id' yang diambil
            "images" => $articleImage::select('*')->where('article_id', '=', $article_id)->get() // Menampilkan semua galleries berdasarkan 'article_id' yang diambil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleImage $articleImage)
    {
        // Mengambil 'image_id' dengan $_POST
        $image_id = $_POST['image_id'];

        // Syarat Image yang dapat diupload
        $rules = [
            "url" => 'image|file|max:2048|mimes:png,jpg,jpeg',
        ];

        // Menampung inputan user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate($rules);

        // Jika ada gambar baru yang diupload
        if($request->file('url')){
            // Hapus gambar lama yang ada di direktori
            Storage::delete($request->oldImage);
            
            $filenameWithExt = $request->file('url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('url')->getClientOriginalExtension();
            $newFileName = $filename . '_' . time() . '.' . $ext;

            // Menyimpan Image ke Storage di dalam folder 'material-images'
            $validatedData['url'] = $request->file('url')->storeAs('article-images', $newFileName);
        } // Jika tidak ada, biarkan gunakan image lama atau image yang telah disediakan "DEFAULT"

        // Update Gallery di DB dengan fungsi update() berdasarkan kondisi where()
        $articleImage::where('id', $image_id)->update($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/article-image')->with('success', 'Successfully Changed the Image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ArticleImage $articleImage)
    {
        // Mengambil 'image_id' dengan $_POST
        $image_id = $_POST['image_id'];
        
        // Jika ada gambar yang lama
        if($request->image_url){
            // Hapus Gambar dari direktori
            Storage::delete($request->image_url);
        }

        // Hapus Gallery dari DB
        $articleImage::destroy($image_id);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/article-image')->with('success', 'Image Has Been Successfully Deleted');
    }
}
