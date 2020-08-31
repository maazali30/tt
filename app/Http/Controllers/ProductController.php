<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Location;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $productCategories = Category::all();
        $productLocations = Location::all();
        
        $params = [
            'title' => 'Add New Product',
            'productCategories' => $productCategories,
            'productLocations' => $productLocations,
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


public function inventory_detail(Request $request)
    {
        // $products = Product::orderBy('id');

        $products = Product::all();

        $params = [
            'title' => 'Products Listing',
            'products' => $products,
        ];
        return view('products.inventory-detail')->with($params);
    }

    /**
     * Create a new product
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        if ($request->hasFile('avatar')) {
            $fileName = Str::random(30);
            $extension = $request->avatar->extension();
            $fullFileName = "{$fileName}.{$extension}";

            if ($request->avatar->storeAs('public/images/inventory', $fullFileName)) {
                $product->avatar = $fullFileName;
            }else{
                $product->avatar = "product.jpg";
            }
        }else{
            $product->avatar = "product.jpg";
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->location_id = $request->location_id;

        $product->save();

        $categories = $request->input('category_id');
        
        $counter = 0; 
        $categories_list = '';
        foreach ($categories as $key => $value) {
            if( $counter == 0 ){
                $categories_list = $value;
            }else{
                $categories_list .= ", " .  $value;
            }
            $counter++;
        }

        $category = Category::find([$categories_list]); // [1, 2]
        $product->categories()->attach($category);

        return redirect()->route('product.index')->with('success', "The product <strong>$product->name</strong> has successfully been created.");
    }






    public function show(Product $product)
    {
       return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        try
        {
            $productCategories = Category::all();
            $productLocations = Location::all();
            $product = Product::findOrFail($id);

            foreach($product->categories as $cat) {
                $currentCats[] = $cat->pivot->category_id;
            }

            $params = [
                'productCategories' => $productCategories,
                'productLocations' => $productLocations,
                'product' => $product,
                'currentCats' => $currentCats,
            ];
            return view('products.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Update specific product
     *
     * @param ProductRequest $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $currentAvatar = $product->avatar;

            if($currentAvatar) {
                $file = "public/images/inventory/{$currentAvatar}";

                if(Storage::exists($file)) {
                    Storage::delete($file);
                }
            }

            $fileName = Str::random(30);
            $extension = $request->avatar->extension();
            $fullFileName = "{$fileName}.{$extension}";

            if ($request->avatar->storeAs('public/images/inventory', $fullFileName)) {
                $product->avatar = $fullFileName;
            }else{
                $product->avatar = "product.jpg";
            }
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->location_id = $request->location_id;

        $product->save();

        $categories = $request->input('category_id');
        
        $counter = 0; 
        $categories_list = '';
        foreach ($categories as $key => $value) {
            if( $counter == 0 ){
                $categories_list = $value;
            }else{
                // $categories .= ", " .  $value;
                $categories_list .= ", " .  $value;
            }
            $counter++;
        }

        $category = Category::find([$categories_list]);
        $product->categories()->sync($category);

        return redirect()->route('product.index')->with('success', "The product <strong>$product->name</strong> has successfully been updated.");

        // return response($product, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $currentAvatar = $product->avatar;

        if($currentAvatar) {
            $file = "public/images/inventory/{$currentAvatar}";

            if(Storage::exists($file)) {
                Storage::delete($file);
            }
        }

        $product->categories()->detach();

        Product::destroy($id);

        return redirect()->route('product.index')->with('success', "The product has deleted successfully.");
    }


    public function removeCategory(Product $product)
    {
            $category = Category::find(2);

            $product->categories()->detach($category);
            
            return 'Success';
    }

}