<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Country;
use App\Favourite;

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
        $data  = Favourite::where('user_id', '=', Auth::user()->id)->get();

        $data1=[];
        foreach($data as $d)
        {
            $client = new Client();
            $res = $client->request('GET', 'https://restcountries.eu/rest/v2/name/'.$d->country_name)->getBody();
            $data1= array_merge(json_decode($res),$data1);
        }
    
        $data=[
            'data'=> $data1,
        ];
    
        return view('home',$data);
    }

    public function search(Request $request)
    {
        $client = new Client();

        try {
            $res = $client->request('GET', 'https://restcountries.eu/rest/v2/name/'.$request->get('name'))->getBody();
        } 
        catch (Exception $e) {
            return redirect('home');
        }

        $data1 = json_decode($res);
        $favdata  = Favourite::where('user_id', '=', Auth::user()->id)->get();
        $favdata1=[];

        foreach($favdata as $fd)
        {
            //$client = new Client();
            try {
                $favres = $client->request('GET', 'https://restcountries.eu/rest/v2/name/'.$fd->country_name)->getBody();
            }
            catch (Exception $e) {
                return redirect('home');
            }
            $favdata1= array_merge(json_decode($favres),$favdata1);
        }

        if(count($data1)> 1)
        {
            $data = [
            'data'=>$res,
            'favdata'=>$favdata1,
            'name'=>$data1[1]->name
            ];
        }
        else
        {
            $data = [
            'data'=>$res,
            'favdata'=>$favdata1,
            'name'=>$data1[0]->name,
            ];
        }
        return view('home1', $data);	
    }
    
    public function getCountries()
    {
    	$data = Country::pluck('country_name')->all();
    	return $data;
    }
    
    public static function getCurrency($cur_code)
    {
    	$client = new Client();
    	$url = 'https://free.currencyconverterapi.com/api/v5/convert?q='.$cur_code.'_INR&compact=ultra';
    	try {
    		$res = $client->request('GET', $url)->getBody();
    	} 
        catch (Exception $e) {
    		return redirect('home');
    	}
    	$res = json_decode($res,true);
    	return $res[$cur_code.'_INR'];
    }
}
