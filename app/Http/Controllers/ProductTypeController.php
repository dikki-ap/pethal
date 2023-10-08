<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product_types.index', [
            "title" => "Product Type List",
            "product_types" => ProductType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product_types.create', [
            "title" => "Add Product Type",
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
        // Menampung data yang diinput user ke variabel $validateData dengan fungsi validate()
        $validatedData = $request->validate([
            'name' => 'required|max:30|unique:product_types',
        ]);

        // Menyimpan data yang diinput ke dalam DB dengan fungsi create()
        ProductType::create($validatedData);

        // Redirect ke halaman yang ditentukan dengan menampilkan pesan yang ditentukan
        return redirect('/admin/product-type')->with('success', 'Successfully Added New Product Type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        return view('dashboard.product_types.edit', [
            "title" => "Edit Product Type",
            "product_type" => $productType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        // Menampung data yang diinput oleh user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            'name' => 'required|max:30|unique:product_types',
        ]);

        // Mengubah data yang ada di DB dengan fungsi update() dengan kondisi where()
        ProductType::where('id', $productType->id)->update($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/product-type')->with('success', 'Successfully Changed the Product Type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $transactionsCount = Transaction::where('product_type_id', $productType->id)->count();
        if($transactionsCount > 0){
            return redirect('/admin/product-type')->with('error', 'Can\'t Delete Product Type Because There\'s a Data Related to This Product Type');
        }else{
            // Ambil jumlah Material berdasarkan Category ID
            $productsCount = Product::where('product_type_id', $productType->id)->count();

            // Ambil semua Material berdasarkan Category ID
            $products = Product::select('*')->where('product_type_id', '=', $productType->id)->get();  

            // Jika ada Material dengan Category ID yang sama
            if($productsCount > 0){
                // Looping semua Material untuk mendapatkan Material ID
                foreach($products as $product){
                    // Ambil semua Gallery berdasarkan Material ID
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
                }
                
                // Menghapus data Category dari DB dengan fungsi destroy() berdasarkan field 'id'
                ProductType::destroy($productType->id);

                // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
                return redirect('/admin/product-type')->with('success', 'Product Type and It\'s Related Product Have Been Successfully Deleted');
            }else{
                // Menghapus data Category dari DB dengan fungsi destroy() berdasarkan field 'id'
                ProductType::destroy($productType->id);

                // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
                return redirect('/admin/product-type')->with('success', 'Product Type Has Been Successfully Deleted');
            }
        }
        
    }
}
