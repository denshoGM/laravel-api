<?php

namespace App\Http\Controllers;

use App\Helpers\Guzzle;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    public function getCombinedData()
    {
        return view('front.combined');
    }

	public function getUsersData()
	{	
		//Obtengo la data utilizando el helper de Guzzle
		$data = Guzzle::getRandomUser();
		//return json_decode(json_encode($data), true);
        return view('front.user')->with('users' , json_encode($data));
	}

    public function getTodosData()
    {
        //Obtengo la data utilizando el helper de Guzzle
        $data = Guzzle::getRandomTodo();
        //return json_decode(json_encode($data), true);
        return view('front.task')->with('todos' , json_encode($data));
    }

    public function userHistory()
    {
        return view('front.history');
    }
}
