<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Service\Task\TaskService;
use Illuminate\Support\Facades\Gate;
use App\Enums\ResponseJson;

class TaskController extends Controller
{

    /**
     * @param  \App\Service\Task\TaskService  $service
     */
    public function __construct(private readonly TaskService $service)
    {
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(FilterRequest $request) {
        return TaskResource::collection($this->service->index($request));
    }


    /**
     * @param  \App\Http\Requests\TaskRequest  $request
     *
     * @return \App\Http\Resources\TaskResource
     */
    public function store(TaskRequest $request)
    {
        return new TaskResource($this->service->store($request->validated()));
    }

    /**
     * @param  \App\Models\Task  $task
     *
     * @return \App\Http\Resources\TaskResource
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * @param  \App\Http\Requests\TaskRequest  $request
     * @param  \App\Models\Task  $task
     *
     * @return \App\Http\Resources\TaskResource
     */
    public function update(TaskRequest $request, Task $task)
    {
        if (Gate::denies('update', $task)) {
            return response()->json(ResponseJson::UNAUTHORIZED);
        }
        $task->update($request->validated());
        return new TaskResource($task);
    }

    /**
     * @param  \App\Models\Task  $task
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Task $task)
    {
        if (Gate::denies('delete', $task)) {
            return response()->json(ResponseJson::UNAUTHORIZED);
        }
        $task->delete();
        return response()->json(200,ResponseJson::DELETE);
    }

}
