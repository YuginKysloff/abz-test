<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')) {
            if ($request->hasFile('file')) {
                if (($handle = fopen($request->file('file'), "r")) !== false) {
                    $result['countAddLines'] = $result['countMissLines'] = 0;
                    while (($data = fgetcsv($handle, 1000, ";")) !== false) {
                        if(User::where('login', $data[0])->where('email', $data[3])->first()) {
                            $result['missLines'][] = $data[1].' '.$data[2].' '.$data[3];
                            $result['countMissLines']++;
                        } else {
                            User::Create([
                                'first_name' => $data[0],
                                'last_name' => $data[1],
                                'login' => $data[2],
                                'email' => $data[3],
                                'password' => bcrypt($data[4]),
                            ]);
                            $result['countAddLines']++;
                        }
                    }
                    fclose($handle);
                    $result['users'] = User::paginate(10);
                    return view('users', $result);
                }
            }
            $result['error'] = 'Файл не выбран или ошибка загрузки файла';
        }
        $result['users'] = User::paginate(10);
        return view('users', $result);
    }

    public function random(Request $request)
    {
        if ($request->ajax()) {
            $user = User::all()->random();
            $user = $user->first_name.' '.$user->last_name." (id={$user->id})";
            return response()->json($user);
        } else {
            abort(404);
        }
    }
}
