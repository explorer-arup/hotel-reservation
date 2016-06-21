<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\addRoomRequest;

use App\Room;

use App\Feature;

use Auth;

use DB;

class roomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::all();
       // $features=Feature::all();
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features=Feature::all();        
        return view ('rooms.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addRoomRequest $request)
    {
        if($request->room_no!='' && $request->description!='' && $request->features){
            $room_no_flag=Room::where('room_no',$request->room_no)->first();
            if(count($room_no_flag)==0){
                $data=Room::create(['room_no'=>$request->room_no,
                     'description'=>$request->description,
                     'features'=>implode(',',$request->features),
                     'created_at'=>\Carbon\Carbon::now(),
                     'admin_id'=>Auth::id()
                    ]);
                return response()->json(['success'=>true,'id' => $data->id,'room_no'=>$request->room_no,
                    'description'=>$request->description]);
            }else
                return response()->json(['success'=>false]);
             
        }
        //else
            //return response()->json($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room_details=DB::table('rooms')
            ->where('rooms.id',$id)
            ->leftJoin('users','rooms.admin_id','=','users.id')
            ->select('users.name','rooms.room_no','rooms.description','rooms.features','rooms.created_at','rooms.updated_at')            
            ->first();
        //dd($room_details);    
        return  view('rooms.show',compact('room_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
