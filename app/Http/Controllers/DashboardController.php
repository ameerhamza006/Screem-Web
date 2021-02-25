<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Cradit;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $users = DB::table('users')
        ->join('cradits', 'users.id', '=', 'cradits.user_id')
        ->select('users.f_name', 'cradits.*')->simplePaginate(10);
         //$users = DB::select('select * from cradits');
        //  $count = \DB::table('cradits')->count();
         $count = Cradit::where('credit','=','Credit')->count();
         $counts = Cradit::where('credit','=','Debit')->count();
         
        

         
        
       
      
         
    return view('admin.dashboard.dashboard',compact('users','count','counts'));
  
    
    }
   public  function pdf()
    {
        # code...
       $pdf = \App::make('dompfd.wrapper');
       $pdf->LoadHtml($this->users());
       $pdf->stream();
    }

    function users()
    {
        # code...
        $get_users = $this->get_user_data();
        $output = '<table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
         
       <th>Users</th>
          <th>Debit</th>
          <th>Cost</th>
          <th>Remarks</th>
     
          
         
        </tr>
        ';
        foreach ($users as $stat) {
         $output .='
         <tr class="trow">
       
          
         <td>{{$stat->f_name}}</td>
           </td>
         
           
           <td>
           {{$stat->credit}}</td>
           <td>{{$stat->cost}}</td>
          
           <td>{{$stat->remarks}}</td>
                 </tr>
         @endif
         @endforeach';
    }
    $output .= '</table>';
    return $output;


}

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indax()
    {
        return view('login');
    }

  
    public function downloadPDF($id) {
        $show = Cradit::find($id);
        $pdf = PDF::loadView('dashboard', compact('show'));
        
        return $pdf->download('dashboard.dashboard');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
