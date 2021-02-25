<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Screen;
use Illuminate\Http\Request;
use App\Models\Userscreen;
use App\Models\User;
use DB;

class UserScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userscreen = DB::table('users')
        ->join('user_screens', 'users.id', '=', 'user_screens.user_id')
        ->join('screens', 'users.id', '=', 'user_screens.screen_id')

        ->select('users.f_name', 'screens.screen_location','user_screens.*')
        
        ->get();
        
        return view('admin.userscreen.list',compact('userscreen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $screen = Screen::all();
        return view('admin.userscreen.add',compact('users','screen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userscreen = Userscreen::create([
            'user_id' => $request->user,
            'screen_id' => $request->screen,
            'date' => $request->date,
            
            'name' => $request->description,
        
        ]);

        if($userscreen){
            return redirect()->route('userscreen.index')->with('message','Record Added Successfully');
        }else{
            return redirect()->route('userscreen.create')->with('message','Something Went Wrong');
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
        $userscreen = Userscreen::find($id);
        $users = User::all();
        return view('admin.userscreen.edit',compact('userscreen','users'));
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
         $userscreen = Userscreen::find($id);
        
        $userscreen->user_id = $request->user;
        $userscreen->date = $request->date;
        $userscreen->description = $request->description;
        
        $userscreen->save();
        
        return redirect()->route('userscreen.index')->with('message','Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $userscreen = Userscreen::find($id);
          
          if($userscreen->delete()){
               return response()->json('record deleted successfully');
        
          }else{
              return response()->json('something went wrong');
              
          }
    }
}
