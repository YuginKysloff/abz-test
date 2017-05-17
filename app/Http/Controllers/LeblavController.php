<?php

namespace App\Http\Controllers;

use App\Task;
use App\Flat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LeblavController extends Controller
{
    public function rss()
    {
        $rss = file_get_contents('https://habrahabr.ru/rss/interesting/');
        $rss = simplexml_load_string($rss);
        return view('leblav.rss', compact('rss'));
    }

    public function toDoList()
    {
        $tasks = Task::paginate(15);
        return view('leblav.todo', compact('tasks'));
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

    public function flatList()
    {
        $flats = Flat::orderBy('updated_at', 'desc')->paginate(6);
        return view('leblav.flats', compact('flats'));
    }

    public function createFlat() {
        return view('leblav.flat_create');
    }

    public function storeFlat(Request $request) {

        $this->validate($request, [
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'price' => 'required|integer',
        ]);

        $data = $request->except('_token, image');

        if($request->hasFile('image')) {

            // Generate filename
            $data['image'] = (Flat::orderBy('id', 'DESC')->first()->id + 1).'.'.$request->file('image')->getClientOriginalExtension();

            Storage::disk('local')->
            putFileAs(
                '/public/flats',
                $request->file('image'),
                $data['image'],
                'public'
            );
        }

        // Store new worker
        $flat = new Flat();
        $flat->fill($data);

        if($flat->save()) {
            return redirect()->route('flatList')->with('success', 'Новое объявление добавлено');
        } else {
            return redirect()->route('flatList')->with('error', 'Ошибка добавления объявления');
        }
    }
}
