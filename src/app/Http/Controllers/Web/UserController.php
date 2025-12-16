<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Role;
use App\Models\Client;


class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
        $this->middleware('permission:utilisateur-access')->only(['index']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agency=Agency::all();
        $users=User::all();
        $roles=Role::all();
        $clients=Client::all();
        return view('users.listing',compact('users','agency','roles','clients'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
