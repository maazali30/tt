<?php

namespace App\Services;

use App\Category;

class CategoryService
{
    /**
     * @param $request
     * @param $product
     */
    public function saveCategory($request, $category)
    {
        $category->name = $request->name;
        
        if ($request->category_id) {
            $category->parent_id = $request->category_id;
        }
        $category->save();
    }

    public function buildTree(){
        $categories = Category::all()->toHierarchy();
        $tree = [];
        foreach ($categories as $category) {
            $tree []= $this->buildCategoryPath($category);
        }

        return $tree;
    }

    private function buildCategoryPath($node, $data = []){

        if (!$node->children->count()) {
            $data = ['name' => $node->name, 'id' => $node->id];
            
            return $data;
        } else {
            foreach ($node->children as $child) {
                $data['name'] = $node->name;
                $data['id'] = $node->id;
                $data['children'][] = $this->buildCategoryPath($child);
            }
            
            return $data;
        }
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
    }

}