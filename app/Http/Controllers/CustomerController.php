<?php

namespace App\Http\Controllers;

use App\Events\CustomerAdded;
use App\Events\CustomerDeleted;
use App\Events\CustomerUpdated;
use App\Models\Customer;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class CustomerController extends Controller
{
    // Get customers
    public function loadAllCustomers()
    {
        try {
            // Fetch all customers from the database
            $customers = Customer::all();

            // Pass the customers to the view
            return view('dashboard', ['customers' => $customers]);
        } catch (\Exception $e) {
            // Flash error message
            flash()->error('Failed to load customers: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }

    // Show the form to create a new customer
    public function create()
    {
        return view('customers.create');
    }

    // Store a newly created customer
    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:customers,email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
            ]);

            // Create the customer
            $customer = Customer::create($request->all());

            broadcast(new CustomerAdded($customer));

            // Flash success message
            flash()->success('Customer added successfully.');
            return redirect()->route('dashboard')->with('success', 'Customer added successfully.');
        } catch (ValidationException $e) {
            // Flash validation error message
            flash()->error('Validation error: ' . $e->getMessage());
            
        } catch (\Exception $e) {
            // Flash general error message
            flash()->error('Failed to add customer: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }

     
     // Update a specific customer's details
     public function update(Request $request, Customer $customer)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:255',
            ]);

            // Update the customer
            $customer->update($request->only(['name', 'email', 'phone', 'address']));
            // Trigger event
            broadcast(new CustomerUpdated($customer));
            // Flash success message
            flash()->success('Customer updated successfully.');
            return redirect()->route('dashboard')->with('status', 'Customer updated successfully!');
        } catch (ValidationException $e) {
            // Flash validation error message
            flash()->error('Validation error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Flash general error message
            flash()->error('Failed to update customer: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }
     
    public function destroy(Customer $customer)
    {
        try {
            // Delete the customer
            $customer->delete();
            // Trigger event
            broadcast(new CustomerDeleted($customer));
            // Flash success message
            flash()->success('Customer deleted successfully.');
            return redirect()->route('dashboard')->with('status', 'Customer deleted successfully!');
        
        } catch (\Exception $e) {
            // Flash general error message
            flash()->error('Failed to delete customer: ' . $e->getMessage());
            return redirect()->route('dashboard');
        }
    }
     
}
