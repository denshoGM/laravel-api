<?php

namespace App\Helpers;

use GuzzleHttp;
class Guzzle {
	//Funcion que guarda la ruta de consulta y la ejecuta
	public static function getData() {
		$client = new GuzzleHttp\Client();
		try {
			$response = $client->get("https://invoice.zoho.com/api/v3/invoices?authtoken=d76851bc47ec38a79fae531429335b74&organization_id=641654789");
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
