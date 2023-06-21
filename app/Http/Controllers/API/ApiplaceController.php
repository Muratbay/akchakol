<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use Illuminate\Http\Request;
use App\Models\Place;
use SebastianBergmann\CodeUnit\FunctionUnit;

class ApiplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Place::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlaceRequest $request)
    {
        $test=$request->validated();
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/images'),$imageName);
        
        $test['image'] = 'images/'.$imageName;

        Place::create($test);

        return response([
            'massage' => 'qabillandi',
            'code' => '200'
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
        $places = Place::where('id',$id)->get();
        return response([
            'massege' => 'keldi',
            'place' => $places
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdatePlaceRequest $request, $id)
    // {
    // //    Place::where('id',$id)->update($request->validated());
        
    // //     return response([
            
    // //         'code' => '200',
    // //         'massege' => 'update isledi',
    // //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::where('id',$id)->delete();
        return response([
            'massage' => 'oshirildi',
            'code' => 200
        ]);
    }
    public function search($name){
        $p=[];
        $places=Place::get();
        foreach($places as $place){
            if($place->name==$name){
                $p[]=$place;
            }
        }

        return response([
            'massage' => 'izlengen jer',
            'place' => $p
        ]);
    }
}
