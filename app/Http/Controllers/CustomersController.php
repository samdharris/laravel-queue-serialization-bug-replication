<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessLowQuantityOrdersJob;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        info(get_called_class());
        $customers = Customer::query()->with([
            'orders' => fn(HasMany $query) => $query->where('quantity', '<', 20),
        ])->limit(1)->get();
        // Here we see the customers with their associated orders eager loaded where the order quantity is < 20 items.
        info($customers);
        dispatch(new ProcessLowQuantityOrdersJob($customers));

        return 'Job Running';
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
