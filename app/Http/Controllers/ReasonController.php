<?php

namespace App\Http\Controllers;
use App\Models\Reason;
use CreateReasonsTable;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Reasons = Reason::get();
        return view('admin.reason',[
            'reasons' => $Reasons
        ]);           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reason-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'discription' => 'required'
        ]);

        Reason::create([
            'title' => $request->title,
            'discription' => $request->discription
        ]);

        return redirect('/reasons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reason=Reason::find($id);
        $reasons=Reason::get();

        return view('admin.reason-edit',[
            'reason'=> $reason,
            'reasons'=> $reasons   
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
        Reason::find($id)->update([
            'title' => $request->title,
            'discription'=> $request->discription
        ]);
        return redirect('reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reason::destroy($id);
        return redirect('reasons');
    }
}
