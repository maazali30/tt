<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $productCategories = Category::all();
        
        $params = [
            'title' => 'Add New Product',
            'productCategories' => $productCategories,
        ];
        return view('products.create')->with($params);
    }
    
    /**
     * List of all products
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        // $products = Product::orderBy('id');

        $products = Product::all();

        $params = [
            'title' => 'Products Listing',
            'products' => $products,
        ];
        return view('products.view')->with($params);
    }

    /**
     * Create a new product
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;

        if ($request->hasFile('avatar')) {
            $fileName = str_random(30);
            $extension = $request->avatar->extension();
            $fullFileName = "{$fileName}.{$extension}";

            if ($request->avatar->storeAs('public/avatars', $fullFileName)) {
                $product->avatar = $fullFileName;
            }else{
                $product->avatar = "product.jpg";
            }
        }else{
            $product->avatar = "product.jpg";
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        $categories = $request->input('categories');
        
        $counter = 0; 
        $categories_list = '';
        foreach ($categories as $key => $value) {
            if( $counter == 0 ){
                $categories_list = $value;
            }else{
                $categories .= ", " .  $value;
                $categories_list .= ", " .  $value;
            }
            $counter++;
        }

        $category = Category::find([$categories_list]); // [1, 2]
        $product->categories()->attach($category);

        return 'Success';

        // ===
    }






    public function show(Product $product)
    {
       return view('products.show', compact('product'));
    }

    // /**
    //  * Update specific product
    //  *
    //  * @param ProductRequest $request
    //  * @param $id
    //  * @return Response
    //  */
    // public function update(ProductRequest $request, $id)
    // {
    //     $product = Product::findOrFail($id);

    //     if ($request->hasFile('avatar')) {
    //         $this->productService->deleteCurrentAvatar($product);
    //         $this->productService->uploadAvatar($request, $product);
    //     }

    //     $this->productService->saveProduct($request, $product);

    //     return response($product, Response::HTTP_CREATED);
    // }

    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);

    //     $this->productService->deleteCurrentAvatar($product);

    //     Product::destroy($id);
    // }


    public function removeCategory(Product $product)
    {
            $category = Category::find(2);

            $product->categories()->detach($category);
            
            return 'Success';
    }

}