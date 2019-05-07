<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCodeResource;
use App\PostCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostCodeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostCodeResource::collection(PostCode::paginate(20))
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
            'code' => 'required',
            'village_id' => 'required'
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $postCode = PostCode::create($request->all());

        return (new PostCodeResource($postCode))->response()
            ->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostCode $postCode)
    {
        return new PostCodeResource($postCode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCode $postCode)
    {
        $validator = Validator::make($request->all(),[
            'code' => 'required',
            'village_id' => 'required'
        ]);

        if ($validator->fails()){
            return $this->sendError('validation error', $validator->errors());
        }

        $postCode->update($request->all());

        return new PostCodeResource($postCode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCode $postCode)
    {
        $postCode->delete();

        return $this->sendResponse('success',200);
    }
}
