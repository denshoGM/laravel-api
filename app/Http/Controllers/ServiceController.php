<?php

namespace App\Http\Controllers;

use App\Helpers\Guzzle;
use App\Task;
use App\User;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function getCombinedData()
    {
        return view('front.combined');
    }

	public function getUsersData()
    {

        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        DB::statement("SET foreign_key_checks=1");

        //Obtengo la data utilizando el helper de Guzzle
        $data = Guzzle::getRandomUser();

        foreach ($data->results as $d){
            $user = new User;
            $user->name = $d->name->first;
            $user->lastName = $d->name->last;
            $user->email = $d->email;
            $user->username = $d->login->username;
            $user->password = $d->login->password;
            $user->gender = $d->gender;
            $user->phone = $d->phone;
            $user->save();
        }

        return view('front.user')->with('users' , json_encode($data));
	}

    public function getTodosData()
    {
        DB::statement("SET foreign_key_checks=0");
        Task::truncate();
        DB::statement("SET foreign_key_checks=1");

        //Obtengo la data utilizando el helper de Guzzle
        $data = Guzzle::getRandomTodo();

        foreach ($data as $d){
            $task = new Task;
            $task->user_id = $d->userId;
            $task->title = $d->title;
            $task->status = $d->completed;
            $task->save();
        }

        return view('front.task')->with('todos' , json_encode($data));
    }

    public function userHistory()
    {
        return view('front.history');
    }
}
