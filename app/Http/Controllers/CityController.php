<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CityResource::collection(City::paginate(20))
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
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $city = City::create($request->all());

        return (new CityResource($city))->response()
            ->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $city->update($request->all());

        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return $this->sendResponse('success',200);
    }
}
