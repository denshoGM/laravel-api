<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Helpers\Guzzle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ServiceController extends Controller
{

    /**
     * Load Combined View
     */
    public function getCombinedData()
    {
        //Obtengo la data utilizando el helper de Guzzle
        $data = Guzzle::getRandomUser();
        return view('front.combined')->with('users' , json_encode($data));
    }

    /**
     * Get Users data, and save to the DB
     */
	public function getUsersData()
    {

        try {
            DB::statement("SET foreign_key_checks=0");
            User::truncate();
            DB::statement("SET foreign_key_checks=1");

            //Obtengo la data utilizando el helper de Guzzle
            $data = Guzzle::getRandomUser();

            foreach ($data->results as $d) {
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

            return view('front.user')->with('users', json_encode($data));
        }catch (\Exception $exception){
            return view('front.user')->with('users', null);
        }
	}

    /**
     * Get Tasks data, and save to the DB
     */
    public function getTodosData()
    {
        try{
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
        }catch (\Exception $exception){
            return view('front.task')->with('todos', null);
        }
    }

    /**
     * Store both Users and Tasks
     */
    public function storeCombined(Request $request)
    {
        $users = $request->users;
        $tasks = $request->tasks;

        try {
            DB::statement("SET foreign_key_checks=0");
            User::truncate();
            DB::statement("SET foreign_key_checks=1");

            DB::statement("SET foreign_key_checks=0");
            Task::truncate();
            DB::statement("SET foreign_key_checks=1");

            for ($i = 0; $i < count($users["results"]); $i++) {
                $results = $users["results"][$i];
                $user = new User;
                $user->name = $results["name"] ["first"];
                $user->lastName = $results["name"] ["last"];
                $user->email = $results["email"];
                $user->username = $results["login"] ["username"];
                $user->password = $results["login"] ["password"];
                $user->gender = $results["gender"];
                $user->phone = $results["phone"];
                $user->save();
            }

            for ($j = 0; $j < count($tasks); $j++) {
                $task = new Task;
                $task->user_id = $tasks[$j]["userId"];
                $task->title = $tasks[$j]["title"];
                if ($tasks[$j]["completed"] === "false") {
                    $task->status = 0;
                } else {
                    $task->status = 1;
                }
                $task->save();
            }
        } catch (\Exception $exception){
            return $exception;
        }
        return 'Datos Guardados Exitosamente!';
    }

    public function userHistory()
    {
        return view('front.history');
    }
}
