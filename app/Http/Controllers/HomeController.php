<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
//use App/Country;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Country::orderBy('name','asc')->get();

        return view('home');
    }

    public function getData()
    {
        $data  = DB::table('favorites')->where('user_id', '=', Auth::user()->id)->get();

	$data1=[];
	foreach($data as $d){
		$client = new \GuzzleHttp\Client();
	   	$res = $client->request('GET', 'https://restcountries.eu/rest/v2/name/'.$d->country_name)->getBody();
		$data1= array_merge(json_decode($res),$data1);
	}
	
	$data=[
		'data'=> $data1,
	];
	
	return view('home',$data);
    }
}
