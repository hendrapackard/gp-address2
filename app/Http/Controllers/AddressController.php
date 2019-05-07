<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AddressResource::collection(Address::paginate(20))
            ->additional([
                'code' => 200,
                'message' => 'success'
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'address' => 'required',
            'note' => 'required',
            'village_id' => 'required',
            'sub_district_id' => 'required',
            'city_id' => 'required',
            'province_id' => 'required',
            'country_id' => 'required',
            'is_default' => 'required',
            'postcode' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'owner_id' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $address = Address::create($request->all());

        return (new AddressResource($address))->response()
            ->setStatusCode(200);

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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'address' => 'required',
            'note' => 'required',
            'village_id' => 'required',
            'sub_district_id' => 'required',
            'city_id' => 'required',
            'province_id' => 'required',
            'country_id' => 'required',
            'is_default' => 'required',
            'postcode' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'owner_id' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $address->update($request->all());

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

        return $this->sendResponse('success',200);
    }
}
