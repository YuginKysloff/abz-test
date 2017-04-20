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
    public function index(Request $request)
    {
        $searchPhrase = $request->search['value'];
        $orderColumn = $request->columns[$request->order[0]['column']]['name'];
        $orderDirection = $request->order[0]['dir'];

        //Generate api answer
        $answer['draw'] = $request->draw;

        // Get workers list with pagination, ordering and searching
        $answer['data'] = Worker::with('post')->
            when($searchPhrase, function($query) use($searchPhrase) {
                return $query->where('name', 'like', '%'.$searchPhrase.'%');
            })->
            orderBy($orderColumn, $orderDirection)->
            limit($request->length)->
            offset($request->start)->
            get();

        $answer['recordsTotal'] = Worker::count();

        // Count records involved in query
        $answer['recordsFiltered'] = Worker::when($searchPhrase, function($query) use($searchPhrase) {
                return $query->where('name', 'like', '%'.$searchPhrase.'%');
            })->count();

        return response()->json($answer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get posts list for select
        $data['posts'] = Post::all();

        // Get possible bosses for select
        $data['bosses'] = Worker::where('post_id', 1)->get();

        return view('admin.worker_create', $data);
    }

    /**
     * Get possible bosses for given worker by ajax.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getBosses(Request $request)
    {
        if ($request->ajax()) {
            // Get possible bosses for given worker for select
            $data['bosses'] = Worker::where('post_id', $request->post_id - 1)->get();

            // Generate view with list of received bosses
            $view['html'] = view('admin.options', $data)->render();

            // Return generated view
            return response()->json($view);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate received data
        $this->validate($request, [
            'name' => 'required|string',
            'salary' => 'required|numeric|min:100|max:1000000',
        ]);

        // Store new worker
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
     * Display the specified resource by ajax.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->ajax()) {
            // Get data of given worker
            $data['worker'] = Worker::with('post')->join('workers as w2', 'workers.pid', '=', 'w2.id')->
//                                    where('w2.id', NULL)->
                                    join('posts', 'w2.post_id', '=', 'posts.id')->
                                    where('workers.id', $request->id)->
                                    select('workers.*', 'w2.name as boss_name', 'posts.name as boss_post')->
                                    first();

            // Generate view with info about given worker
            $view['html'] = view('admin.worker_info', $data)->render();

            // Return generated view
            return response()->json($view);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get worker by given id or fail if he doesn't exist
        $data['worker'] = Worker::findOrFail($id);

        // Get posts list for select
        $data['posts'] = Post::all();

        // Get possible bosses for select
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
        // Validate received data
        $this->validate($request, [
            'name' => 'required|string',
            'salary' => 'required|integer|min:100|max:1000000',
        ]);

        // Get selected worker
        $worker = Worker::find($id);

        if ($worker) {

            // If selected worker exist to store changes
            Worker::where('id', $id)->update([
                'pid' => $request->boss,
                'post_id' => $request->post,
                'name' => $request->name,
                'salary' => $request->salary,
//            'avatar' => $request->avatar,
            ]);

            // Return to workers list with message
            return redirect($request->redirect_to)->with('success', 'Новая информация сохранена');
        } else {

            // If doesn't exist return with error
            return redirect($request->redirect_to)->with('error', 'Запись не существует');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get selected worker
        $worker = Worker::find($id);

        if ($worker) {

            // If this worker exist to redirect all his colleagues to his boss
            Worker::where('pid', $worker->id)->update(['pid' => $worker->pid]);

            // Delete selected worker
            $worker->delete();

            // Return to workers list with message
            return redirect()->back()->with('success', 'Запись удалена');
        } else {

            // If doesn't exist return with error
            return redirect()->back()->with('error', 'Запись не существует');
        }
    }
}
