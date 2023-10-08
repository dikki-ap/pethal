<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index', [
            "title" => "Product List",
            "products" => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create', [
            "title" => "Add Product",
            "product_types" => ProductType::all()
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
            'name' => 'required|max:255',
            'product_type_id' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required'
        ]);

        
        // Tambahkan data Product ke DB dengan fungsi create()
        Product::create($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/product')->with('success', 'Successfully Added New Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            "title" => "Material Details",
            "product" => $product,
            // Mengambil Galleries 'url' berdasarkan 'material_id' yang sedang dipilih
            "images" => ProductImage::select('url')->where('product_id', '=', $product->id)->get(), 
            "i" => 1
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            "title" => "Edit Product",
            "product" => $product,
            "product_types" => ProductType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'product_type_id' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required'
        ]);

        // Update Product ke DB dengan fungsi update() berdasarkan kondisi where()
        Product::where('id', $product->id)->update($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/product')->with('success', 'Successfully Changed the Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $transactionsCount = Transaction::where('product_id', $product->id)->count();
        if($transactionsCount > 0){
            return redirect('/admin/product')->with('error', 'Can\'t Delete Product Because There\'s a Data Related to This Product');
        }else{
            // Ambil semua Galleries dari Material berdasarkan 'material_id'
            $productImages = ProductImage::select('*')->where('product_id', '=', $product->id)->get();

            // Lakukan looping dengan foreach karena data berbentuk Array Assocative
            foreach($productImages as $productImage){
                // Hapus Gallery dari DB berdasarkan 'id'
                ProductImage::destroy($productImage->id);

                // Hapus file Gallery dari Storage berdasarkan 'url'
                Storage::delete($productImage->url);
            }

            // Hapus Material dari DB berdasrkan 'id'
            Product::destroy($product->id);

            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/product')->with('success', 'Product Has Been Successfully Deleted');
        }
        
    }
}
