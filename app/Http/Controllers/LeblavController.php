<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class LeblavController extends Controller
{
    public function rss()
    {
        $rss = file_get_contents('https://habrahabr.ru/rss/interesting/');
        $rss = simplexml_load_string($rss);
        return view('leblav/rss', compact('rss'));
    }

    public function toDoList()
    {
        $tasks = Task::paginate(15);
        return view('leblav/todo', compact('tasks'));
    }

    public function destroy(Request $request)
    {
        $task = Task::find($request->id);

        if ($task) {
            $task->delete();
        }
        return responce()->json(['id' => $request->id]);
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

            $data = $request->except('_token');

            $task = new Task();
            $task->fill($data);

            if($task->save()) {
                session('success', 'Новый пользователь добавлен');
                return response();
            } else {
                session('error', 'Ошибка добавления пользователя');
                return response();
            }
        } else {
            abort(404);
        }
    }
}
