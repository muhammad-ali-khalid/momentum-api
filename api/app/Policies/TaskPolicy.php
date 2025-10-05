<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    public function access(User $user, Task $task): Response
    {
        return $user->id === $task->user_id ? Response::allow() : Response::deny('You do not own this post');
    }
}
