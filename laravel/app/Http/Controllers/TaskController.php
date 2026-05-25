<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $tasks = $user->tasks()->with('category')->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function store()
    {
        $request->validate([
            "title"=> "required|string|max:255",
            "description"=> "required|string",
            "status"=>"required|",
            "priority"=> "",
            "due_date"=> "",
            "category_id"=> "",
        ]);

    }

    public function create()
    {
        /** @var User $user */
        $user = Auth::user();
        $categories = $user->categories()->get();
        return view('tasks.create', compact('categories'));

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
