<?php

namespace App\Service\Task;


use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskService
{

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \App\Models\Task[]|\LaravelIdea\Helper\App\Models\_IH_Task_C
     */
    public function index(Request $request)
    {
        $query = Task::where('user_id',  Auth::user()->id);

        // Фільтрація за статусом
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        // Фільтрація за пріоритетом
        if ($request->has('min_priority')) {
            $query->where('priority', '>=', $request->min_priority);
        }
        if ($request->has('max_priority')) {
            $query->where('priority', '<=', $request->max_priority);
        }
        // Повнотекстовий пошук по заголовку
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        // Сортування
        if ($request->has('sort_by')) {
            $sortDirection = $request->has('sort_desc') ? 'desc' : 'asc';
            $query->orderBy('created_at', $sortDirection);
        }

        return $query->get();
    }

    /**
     * @param $data
     *
     * @return \App\Models\Task
     */
    public function store($data){
        return Task::create([
          'status' => $data['status'],
          'priority' => $data['priority'],
          'title' => $data['title'],
          'description' => $data['description'],
          'user_id' => Auth::user()->id,
        ]);
    }

}
