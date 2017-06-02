<?php

namespace App\Helpers;

use GuzzleHttp;
class Guzzle {
	//Funcion base de consulta y ejecución
	public static function getData() {
		$client = new GuzzleHttp\Client();
		try {
			$response = $client->get("");
			return json_decode($response->getBody());
		} catch (BadResponseException $e){
			return json_decode($e->getResponse()->getBody(true));
		} catch (\Exception $e) {
			return false;
		}
	}

    //Función que consulta el API de RandomUser y la ejecuta
    public static function getRandomUser() {
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->get("https://randomuser.me/api/?results=50");
            return json_decode($response->getBody());
        } catch (BadResponseException $e){
            return json_decode($e->getResponse()->getBody(true));
        } catch (\Exception $e) {
            return false;
        }
    }

    //Función que consulta el API de JsonPlaceholder y la ejecuta
    public static function getRandomTodo() {
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->get("https://jsonplaceholder.typicode.com/todos");
            return json_decode($response->getBody());
        } catch (BadResponseException $e){
            return json_decode($e->getResponse()->getBody(true));
        } catch (\Exception $e) {
            return false;
        }
    }

}
