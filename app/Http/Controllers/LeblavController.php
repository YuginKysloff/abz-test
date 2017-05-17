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
        return response()->json(['id' => $request->id]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = $request->except('_token');
        $task = new Task();
        $task->fill($data);

        if($task->save()) {
            $answer = ['status' => 'success', 'message' => 'Новая задача добавлена'];
        } else {
            $answer = ['status' => 'error', 'message' => 'Ошибка добавления'];
        }

        $view['html'] = view('vidgets.message', $answer)->render();
        return response()->json($view);
    }

    public function rentList()
    {
        return view('leblav.rent');
    }
}
