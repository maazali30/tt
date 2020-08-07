<?php

namespace App\Http\Controllers;

use App\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function create(Request $request)
    {
        $productCategories = Category::all();
        
        $params = [
            'title' => 'Add New Category',
            'productCategories' => $productCategories,
        ];
        return view('categories.create')->with($params);
    }

    public function index()
    {
        $categories = Category::where('parent_id',NULL)->get();

        $params = [
            'title' => 'Categories Listing',
            'categories' => $categories,
        ];
        return view('categories.view')->with($params);
    }

    public function store(Request $request)
    {
        // dd($request);

        $category = new Category();

        $this->categoryService->saveCategory($request, $category);

        return redirect()->route('category.index')->with('success', "The product <strong>$category->name</strong> has successfully been created.");
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function edit($id)
    {
        try
        {
            $productCategories = Category::all();
            $category = Category::findOrFail($id);

            $params = [
                'productCategories' => $productCategories,
                'category' => $category
            ];
            return view('categories.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->categoryService->saveCategory($request, $category);

        return redirect()->route('category.index')->with('success', "The product <strong>$category->name</strong> has successfully been updated.");

        // return response($category, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
       $this->categoryService->deleteCategory($id);

       return redirect()->route('category.index')->with('success', "The category has deleted successfully.");
    }

    public function categoryProducts($id)
    {
        $category = Category::findOrFail($id);
       
        return $category->products;
    }

    public function buildCategoryTree()
    {
        return $this->categoryService->buildTree();
    }

    public function categoryList()
    {
        return Category::all();
    }
}