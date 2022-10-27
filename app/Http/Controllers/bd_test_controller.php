<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bd_test_controller extends Controller
{
	public function index()
	{
	   $data = DB::transaction(function(){
    		 DB::table('users')->update(['name' => 1]);		
    	});
	    return view('user-view',compact('data'));
	}
	public function view()
	{
		return view('ajax-view');
	}
	public function allData()
	{
		$data = DB::table('users')->orderBy('id','desc')->get();
		return response()->json($data);
	}
	public function store(Request $request)
	{
		$validated = $request->validate([
	        'name' => 'required',
	        'email' => 'required',
	        'password' => 'required',
	    ]);

		$name = $request->input('name');
		$email = $request->input('email');
		$password = $request->input('password');
		$data = array('name'=>$name,'email'=>$email,'password'=>$password);
		$allData= DB::table('users')->insert($data);
		return response()->json($allData);
    }
	
}
