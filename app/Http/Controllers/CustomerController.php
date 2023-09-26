<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
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

        return redirect('/dashboard');
    }

    public function show()
    {
        $users = Customer::take(30)->get();
        return view('dashboard', ['users' => $users]);
    }


    public function update($id)
    {
        $user = Customer::findOrFail($id);
        if (!$user) {
            return redirect('/dashboard')->with('msg', "Usuário não existe");
        }

        $user->save();
        return redirect('/dashboard')->with('msg', "Usuário editado com sucesso.");
    }


    public function destroy($id)
    {
        $user = Customer::findOrFail($id);
        if (!$user) {
            return redirect('/dashboard')->with('msg', "Usuário não existe");
        }

        $user->delete();
        return redirect('/dashboard')->with('msg', "Usuário deletado com sucesso.");
    }
}
