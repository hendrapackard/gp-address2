<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubDistrictResource;
use App\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubDistrictResource::collection(SubDistrict::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subDistrict = SubDistrict::create([
            'name' => $request->name,
        ]);

        return new SubDistrictResource($subDistrict);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubDistrict $subDistrict)
    {
        return new SubDistrictResource($subDistrict);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDistrict $subDistrict)
    {
        $subDistrict->update($request->only('name'));

        return new SubDistrictResource($subDistrict);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubDistrict $subDistrict)
    {
        $subDistrict->delete();

        return response()->json(null,204);
    }
}
