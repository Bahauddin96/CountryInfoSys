<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Favourite;

class FavouritesController extends Controller
{
    public function setFav(Request $request)
    {
    	$data  = Favourite::where([['user_id', '=', Auth::user()->id],
    	['country_name', '=', $request->get('name')],])->get()->toArray();

		if(count($data)==0){
			DB::table('favourites')->insert([
		        'user_id' => Auth::user()->id,
		        'country_name' => $request->get('name'),
		    ]);
		}
    }

    public function removeFav(Request $request)
    {
    	$data  = Favourite::where([['user_id', '=', Auth::user()->id],
    	['country_name', '=', $request->get('name')],])->get()->toArray();

		if(count($data) > 0){
			DB::table('favourites')->where([
			    ['user_id', '=', Auth::user()->id],
			    ['country_name', '=', $request->get('name')],
			])->delete();  
		}
    }
}
