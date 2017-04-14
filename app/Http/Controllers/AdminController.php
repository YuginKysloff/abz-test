<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use App\Post;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['workers'] = Worker::with('post')->paginate(10);
        return view('admin.workers', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['posts'] = Post::all();
        $data['workers'] = Worker::where('post_id', 1)->get();
        return view('admin.worker_create', $data);
    }

    /**
     * Get possible bosses for given worker.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getBosses(Request $request)
    {
        $bosses = Worker::where('post_id', $request->post_id - 1)->get();

        $view['html'] = '';
        foreach($bosses as $boss) {
            $view['html'] .= "<option value=\"$boss->id\">$boss->name</option>";
        }
        return response()->json($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'salary' => 'required|numeric|min:100|max:1000000',
        ]);

        Worker::create([
            'pid' => $request->boss,
            'post_id' => $request->post,
            'name' => $request->name,
            'salary' => $request->salary,
//            'avatar' => $request->avatar,
        ]);

        return redirect()->route('listWorkers')->with('success', 'Новый пользователь добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data['worker'] = Worker::with('post')->join('workers as w2', 'workers.pid', '=', 'w2.id')->
        join('posts', 'w2.post_id', '=', 'posts.id')->
        where('workers.id', $request->id)->
        select('workers.*', 'w2.name as boss_name', 'posts.name as boss_post')->
        first();
        $view['html'] = view('admin.worker_info', $data)->render();
        return response()->json($view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['posts'] = Post::all();
        $data['worker'] = Worker::findOrFail($id);
        $data['bosses'] = Worker::where('post_id', $data['worker']->post_id - 1)->get();
        return view('admin.worker_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'salary' => 'required|integer|min:100|max:1000000',
        ]);

        Worker::where('id', $id)->update([
            'pid' => $request->boss,
            'post_id' => $request->post,
            'name' => $request->name,
            'salary' => $request->salary,
//            'avatar' => $request->avatar,
        ]);
        return redirect($request->redirect_to)->with('success', 'Новая информация сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Запись удалена');
    }
}
