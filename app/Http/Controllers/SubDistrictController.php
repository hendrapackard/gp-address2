<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubDistrictResource;
use App\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubDistrictController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubDistrictResource::collection(SubDistrict::paginate(20))
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

        $subDistrict = SubDistrict::create($request->all());

        return (new SubDistrictResource($subDistrict))->response()
            ->setStatusCode(200);
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $subDistrict->update($request->all());

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

        return $this->sendResponse('success',200);
    }
}
