<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\UserRequest\StoreRequest;
use App\Http\Requests\UserRequest\UpdateRequest;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $user = $request->all();

        User::insert([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($user['password']),
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('admin.user');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, string $id)
    {
        $user = $request->all();

       User::where('id', $id)->update([
            'name' => $user['name'],
            'email' => $user['email'],
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     */
    public function destroy(string $id)
    {

    }

    /**
     * restore the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function delete(string $id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.user');
    }

    /**
     * restore the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        User::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.user');
    }
}
