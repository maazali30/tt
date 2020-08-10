<?php

namespace App\Services;

use App\Location;

class LocationService
{
    /**
     * @param $request
     * @param $product
     */
    public function saveLocation($request, $location)
    {
        $location->name = $request->name;
        
        if ($request->location_id) {
            $location->parent_id = $request->location_id;
        }
        $location->save();
    }

    public function buildTree(){
        $locations = Location::all()->toHierarchy();
        $tree = [];
        foreach ($locations as $location) {
            $tree []= $this->buildLocationPath($location);
        }

        return $tree;
    }

    private function buildLocationPath($node, $data = []){

        if (!$node->children->count()) {
            $data = ['name' => $node->name, 'id' => $node->id];
            
            return $data;
        } else {
            foreach ($node->children as $child) {
                $data['name'] = $node->name;
                $data['id'] = $node->id;
                $data['children'][] = $this->buildLocationPath($child);
            }
            
            return $data;
        }
    }

    public function deleteLocation($id){
        $location = Location::find($id);
        $location->delete();
    }

}