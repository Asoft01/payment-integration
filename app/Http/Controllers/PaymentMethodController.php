<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        return view('payments.index')->with('payments', PaymentMethod::all());;
    }

    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:payment_methods'
        ]);

        PaymentMethod::create([
            'name' => $request->name, 
            'status' => 1
        ]); 
        session()->flash('success', 'Payment Created Successfully');
        return redirect(route('home'));
    }

    public function edit(Request $request, $id = null){
        $payment_details = PaymentMethod::where(['id' => $id])->first(); 
        return view('payments.create')->with(compact('payment_details')); 
    }

    public function update(Request $request, $id = null){
        $update_payment = $request->input(); 
        PaymentMethod::where('id', $id)->update(['name' => $request->name]);
        return redirect(route('home'));
    }

    public function destroy($id)
    {
           
    }
    
}
