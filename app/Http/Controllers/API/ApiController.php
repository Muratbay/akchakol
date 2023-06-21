<?php

namespace App\Http\Controllers\API;
use App\Models\Reason;
use CreateReasonsTable;
use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Requests\StoreReasonRequest;
use App\Http\Requests\UpdateReasonRequest;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reason::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReasonRequest $request)
    {  

        Reason::create($request->validated());

        return response([
            'massege' => 'qabillandi'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reasons = Reason::where('id',$id)->get();
        return response([
            'massege' => 'keldi',
            'reasons' => $reasons
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReasonRequest $request, $id)
    {
        Reason::where('id',$id)->update($request->validated());
        
        return response([
            
            'code' => '200',
            'massege' => 'update isledi',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reason::where('id',$id)->delete();
        return response([
            'massage' => 'oshirildi',
            'code' => 200
        ]);
    }


}
