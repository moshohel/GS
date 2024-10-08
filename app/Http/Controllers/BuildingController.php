<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Session;
use DataTables;


class BuildingController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->expectsJson()) {
            $data = Building::latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function (Building $item) {
                    return view('actions')->withId($item->id)->withModel('buildings');
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        $data = ['title' => 'All Buildings'];
        return view('pages.building.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.building.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingRequest $request)
    {

        $data = $request->all();

        $building = Building::create($data);

        return redirect()->back()->with('success', 'Building created successfully!');


        //return to_route('buildings.show', ['building' => $building->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuildingRequest $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        //
    }
}
