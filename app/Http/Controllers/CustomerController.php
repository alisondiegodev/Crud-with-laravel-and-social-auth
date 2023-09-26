<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('welcome');
    }


    public function create()
    {
        return view('/customers/create');
    }


    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        return redirect('/dashboard')->with('success', "Usuário criado com successo!");
    }


    public function show()
    {

        $userAdmin = Auth::user();
        $users = Customer::take(30)->get();
        return view('dashboard', ['users' => $users, 'userAdmin', $userAdmin]);
    }



    public function destroy($id)
    {
        $user = Customer::findOrFail($id);
        if (!$user) {
            return redirect('/dashboard')->with('success', "Client does not exist!");
        }

        $user->delete();
        return redirect('/dashboard')->with('success', "Client deleted with success!");
    }



    public function edit($id)
    {
        $user = Customer::find($id);
        if (!$user) {
            return redirect('/dashboard')->with('error', "Client does not exist!");
        }

        return view('customers.edit', ['user' => $user]);
    }



    public function update(Request $request, $id)
    {

        $user = Customer::find($id);
        if (!$user) {
            return redirect('/dashboard')->with('error', "Client does not exist!");
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        return redirect('/dashboard')->with('success', "Client update with success!");
    }
}
