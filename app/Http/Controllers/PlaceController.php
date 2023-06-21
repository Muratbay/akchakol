<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceRequest;
use App\Models\Place;
use CreatePlacesTable;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $places = Place::get();
        return view('admin.place',[
            'places' => $places
        ]);   
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('admin.place-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlaceRequest $request)
    {
        $request->validated();

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/images'),$imageName);

        Place::create([
            'name' => $request->name,
            'time' => $request->time,
            'image' => 'images/'.$imageName,
            'price' => $request->price
        ]);

        return redirect('places');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $places = Place::get();
        return view('index',[
            'places' => $places
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place=Place::find($id);
        $places=Place::get();

        return view('admin.place-edit',[
            'place'=> $place,
            'places'=> $places   
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!isset($request->image))
        {
            $img_url = Place::where('id',$id)->get()[0]['image'];
        }
        else{
            $imageName = time().".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images'),$imageName);
            $img_url = 'images/'.$imageName;
        }

        Place::find($id)->update([
          'name' => $request->name,
            'time'=> $request->time,
            'image'=> $img_url,
            'price'=> $request->price
        ]);
        
        return redirect('places');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::destroy($id);
        return redirect('places');
    }
}
