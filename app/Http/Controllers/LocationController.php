<?php

namespace App\Http\Controllers;

use App\Location;
use App\Services\LocationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationController extends Controller
{
    private $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->LocationService = $locationService;
    }

    public function create(Request $request)
    {
        $productLocations = Location::all();
        
        $params = [
            'title' => 'Add New Location',
            'productLocations' => $productLocations,
        ];
        return view('locations.create')->with($params);
    }

    public function index()
    {
        $locations = Location::where('parent_id',NULL)->get();

        $params = [
            'title' => 'Locations Listing',
            'locations' => $locations,
        ];
        return view('locations.view')->with($params);
    }

    public function store(Request $request)
    {
        $location = new Location();

        $this->LocationService->saveLocation($request, $location);

        return redirect()->route('location.index')->with('success', "The product <strong>$location->name</strong> has successfully been created.");
    }

    public function show($id)
    {
        return Location::findOrFail($id);
    }

    public function edit($id)
    {
        try
        {
            $productLocations = Location::all();
            $location = Location::findOrFail($id);

            $params = [
                'productLocations' => $productLocations,
                'location' => $location
            ];
            return view('locations.edit')->with($params);
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
        $location = Location::findOrFail($id);

        $this->LocationService->saveLocation($request, $location);

        return redirect()->route('location.index')->with('success', "The product <strong>$location->name</strong> has successfully been updated.");

        // return response($location, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
       $this->LocationService->deleteLocation($id);

       return redirect()->route('location.index')->with('success', "The location has deleted successfully.");
    }

    public function locationProducts($id)
    {
        $location = Location::findOrFail($id);
       
        return $location->products;
    }

    public function buildLocationTree()
    {
        return $this->locationService->buildTree();
    }

    public function LocationList()
    {
        return Location::all();
    }
}