<?php

namespace App\Http\Controllers;

use App\Helpers\Guzzle;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
	public function getApiData()
	{	
		//Obtengo la data utilizando el helper de Guzzle
		$data = Guzzle::getData();
		//return json_decode(json_encode($data), true);
        return view('front.home')->with('users' , json_encode($data));
	}

    public function userHistory()
    {
        return view('front.history');
    }
}
