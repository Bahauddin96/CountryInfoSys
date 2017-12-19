<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();


Route::get('home', [
  'middleware' => 'auth', 
  'uses' => 'HomeController@getData'
]);

Route::post('/setFav', function (Request $request) {

$data  = DB::table('favorites')->where([
    ['user_id', '=', Auth::user()->id],
    ['country_name', '=', $request->get('name')],
])->get()->toArray();

if(count($data)==0){
	DB::table('favorites')->insert([
        'user_id' => Auth::user()->id,
        'country_name' => $request->get('name'),
    ]);
   }

});

Route::post('/removeFav', function (Request $request) {

$data  = DB::table('favorites')->where([
    ['user_id', '=', Auth::user()->id],
    ['country_name', '=', $request->get('name')],
])->get()->toArray();

if(count($data) > 0){
DB::table('favorites')->where([
    ['user_id', '=', Auth::user()->id],
    ['country_name', '=', $request->get('name')],
])->delete();  
}

});

Route::post('home', function (Request $request) {
    
    	$client = new GuzzleHttp\Client();
    	try {
  		$res = $client->request('GET', 'https://restcountries.eu/rest/v2/name/'.$request->get('name'))->getBody();
	} catch (Exception $e) {
		return redirect('home');
    	}
    	$data1 = json_decode($res);
	$favdata  = DB::table('favorites')->where('user_id', '=', Auth::user()->id)->get();
	$favdata1=[];
	foreach($favdata as $fd){
 	$client = new GuzzleHttp\Client();
 	try {
    		$favres = $client->request('GET', 'https://restcountries.eu/rest/v2/name/'.$fd->country_name)->getBody();
    	} catch (Exception $e) {
		return redirect('home');
    	}
    	$favdata1= array_merge(json_decode($favres),$favdata1);
}
    if(count($data1)> 1){
     	$data = [
     	'data'=>$res,
     	'favdata'=>$favdata1,
     	'name'=>$data1[1]->name
     	];
     }
     else{
     	$data = [
     	'data'=>$res,
     	'favdata'=>$favdata1,
     	'name'=>$data1[0]->name,
     	];
     }
    return view('home1', $data);
});