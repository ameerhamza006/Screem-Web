<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    function userLogin(Request $request){
        $data = $request->input();
        $request->session()->put('dashboard.dashboard',$data['dashboard.dashboard']);
        return redirect('dashboard.dashboard');
    }
}
