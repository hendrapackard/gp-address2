<?php

namespace App\Http\Controllers;

use App\Http\Resources\VillageResource;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VillageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VillageResource::collection(Village::paginate(20))
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

        $village = Village::create($request->all());

        return (new VillageResource($village))->response()
                ->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        return new VillageResource($village);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $village->update($request->all());

        return new VillageResource($village);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        $village->delete();

        return $this->sendResponse('success',200);
    }
}
