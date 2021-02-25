<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Screen;
use Illuminate\Http\Request;

use App\Models\User;
use DB;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screen = DB::table('users')
        ->join('screens', 'users.id', '=', 'screens.user_id')
        ->select('users.f_name', 'screens.*')
        ->get();
        return view('admin.screen.list',compact('screen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.screen.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $user = screen::create([
            'user_id' => $request->user,
           
            'date' => $request->date,
            'screen_location' => $request->description,
        ]);

        if($user){
            return redirect()->route('screen.index')->with('message','Record Added Successfully');
        }else{
            return redirect()->route('screen.create')->with('message','Something Went Wrong');
        }
    
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
        $screen = screen::find($id);
        $users = User::all();
        return view('admin.screen.edit',compact('screen','users'));
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
        $screen = screen::find($id);
        
        $screen->user_id = $request->user;
        $screen->date = $request->date;
        $screen->screen_location = $request->description;
        $screen->save();
        
        return redirect()->route('screen.index')->with('message','Record Updated Successfully');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $screen = Screen::find($id);
          
          if($screen->delete()){
               return response()->json('record deleted successfully');
        
          }else{
              return response()->json('something went wrong');
              
          }
          
    }
}
