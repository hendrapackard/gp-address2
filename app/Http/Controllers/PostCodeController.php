<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCodeResource;
use App\PostCode;
use Illuminate\Http\Request;

class PostCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostCodeResource::collection(PostCode::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postCode = PostCode::create([
            'code' => $request->code,
            'village_id' => $request->village_id,
        ]);

        return new PostCodeResource($postCode);
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
        $postCode->update($request->only(['code','village_id']));

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

        return response()->json(null,204);
    }
}
