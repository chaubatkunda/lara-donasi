<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DonaturController extends Controller
{

    public function index()
    {
        return inertia('Donatur/Index', [
            'transactions' => Transaction::query()->with('user')->get()
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        User::create([
            //
        ]);
    }

    public function show(User $donatur)
    {
        //
    }

    public function edit(User $donatur)
    {
        //
    }

    public function update(Request $request, User $donatur)
    {
        //
    }

    public function destroy(User $donatur)
    {
        //
    }
}
