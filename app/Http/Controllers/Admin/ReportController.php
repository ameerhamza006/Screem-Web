<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cradits;
use App\Models\User;
use DB;

class ReportController extends Controller
{

    public function index()
    {
        $cradits = DB::table('users')
        ->join('cradits', 'users.id', '=', 'cradits.user_id')
        ->select('users.f_name', 'cradits.*')
        ->get();
        $users = User::all();
        return view('admin.report.list',compact('cradits','users'));
    }


    public function mytableAjax($id)
{
    $users = User::where('id', $id)->get();
    // if you try dd($students), you should see it in Network > Preview

    return response()->json(['users' => $users]);
}
  

    public function edit($id)
    {
        $cradits = cradits::find($id);
        $users = User::all();
        return view('admin.report.edit',compact('cradits','users'));
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
        $cradits = cradits::find($id);
        
        $cradits->user_id = $request->user;
        $cradits->cradit = $request->cradit;
        $cradits->date = $request->date;
        $cradits->cost = $request->cost;
        $cradits->remarks = $request->remarks;
        $cradits->image = $request->image;
      
       
        $cradits->save();
        
        return redirect()->route('report.index')->with('message','Record Updated Successfully');
        
        
    }



   }
