<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AddressResource::collection(Address::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = Address::create([
            'name' => $request->name,
            'address' => $request->address,
            'note' => $request->note,
            'village_id' => $request->village_id,
            'sub_district_id' => $request->sub_district_id,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'country_id' => $request->country_id,
            'is_default' => $request->is_default,
            'postcode' => $request->postcode,
            'owner_id' => $request->owner_id,
        ]);

        return new AddressResource($address);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->update($request->only([
            'name',
            'address',
            'note',
            'village_id',
            'sub_district_id',
            'city_id',
            'province_id',
            'country_id',
            'is_default',
            'postcode',
            'owner_id',
        ]));

        return new AddressResource($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return response()->json(null,204);
    }
}
