<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SearchTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(SearchTaskRequest $request)
    {
        $tasks = Task::where(function ($query) use ($request) {
            if ($request->input('search')) {
                $query->where('description', 'ILIKE', '%' . $request->input('search') . '%');
            }
            if ($request->input('start_date')) {
                $query->where('date', '>=', $request->input('start_date'));
            }
            if ($request->input('end_date')) {
                $query->where('date', '<=', $request->input('end_date'));
            }
            $query->where('user_id', auth()->user()->id);
        })
            ->when($request->input('sort_order'), function ($query) use ($request) {
                $query->orderBy('date', $request->input('sort_order'));
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->paginate(25)
            ->withQueryString();

        return view('backend.tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('backend.tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        try {

            $task = new Task();
            $task->user_id = auth()->user()->id;
            $task->date = $request->date;
            $task->description = $request->description;
            $task->save();

            return redirect()->route('backend.tasks.create')->with('success', 'Tarefa cadastrada com sucesso!')->withInput();

        } catch (\Throwable $th) {

            report($th);
            return redirect()->route('backend.tasks.create')->with('error', 'Erro ao cadastrar Tarefa!')->withInput();
        }
    }

    public function edit(Task $task)
    {
        abort_if($task->user_id != auth()->user()->id, 403);

        return view('backend.tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        try {

            $task->date = $request->date;
            $task->description = $request->description;
            $task->save();

            return redirect()->route('backend.tasks.edit', $task->id)->with('success', 'Tarefa atualizada com sucesso!')->withInput();

        } catch (\Throwable $th) {

            report($th);
            return redirect()->route('backend.tasks.edit', $task->id)->with('error', 'Erro ao atualizar Tarefa!')->withInput();
        }
    }

    public function destroy(Task $task)
    {
        abort_if($task->user_id != auth()->user()->id, 403);

        try {

            $task->delete();

            return redirect()->route('backend.tasks')->with('success', 'Tarefa excluída com sucesso!');
            
        } catch (\Throwable $th) {

            report($th);
            return redirect()->route('backend.tasks')->with('error', 'Erro ao excluir Tarefa!');
        }
    }
}
