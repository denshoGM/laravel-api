<?php

namespace App\Http\Controllers;

use App\Helpers\Guzzle;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
	public function getZohoData()
	{	
		//Obtengo la data utilizando el helper de Guzzle
		$data = Guzzle::getData();
		return json_decode(json_encode($data), true);
	}
}
