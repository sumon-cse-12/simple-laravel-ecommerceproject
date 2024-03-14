<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            // Add more validation rules as needed
        ]);
    
        // Get the authenticated user
        $authUser = auth()->user();
    
        // Update or create the customer
        $customer = Customer::updateOrCreate(
            ['email' => $validatedData['email']],
            [
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'password' => bcrypt('123456') // You may want to use a more secure method for setting passwords
                // Add other necessary fields here
            ]
        );
    
        // Proceed with the checkout process
        $checkoutData = $request->only([
            'first_name',
            'last_name',
            'email',
            'address',
            'city',
            'mobile',
            'order_notes',
            'quantity',
            'price',
            'shipping',
            'sub_total',
            'card_number',
            'expiry_date',
            'delivery_type'
        ]);
        $checkoutData['customer_id'] = $customer->id;
        $checkout = Checkout::updateOrCreate(['customer_id' => $customer->id], $checkoutData);
    
        // Clear the cart session if it exists
        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }
    
        // Redirect with a success message
        return redirect()->route('welcome.view')->with('success', 'Successfully Submitted');
    }
    
    

    public function welcome_checkout(){
        return view('frontend.welcome');
    }
}
