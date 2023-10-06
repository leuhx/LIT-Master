<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceOrders = ServiceOrder::all();
        return view('admin.service-orders.index',
            ['serviceOrders' => $serviceOrders]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $services = Service::all();

        return view('admin.service-orders.create', [
            'departments' => $departments,
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $services = [];
        $totalPrice = 0;
        foreach ($request->get('services') as $serviceId) {
            $service = Service::findOrFail($serviceId);
            $services[] = [
                'id' => $service->id,
                'name' => $service->name,
                'price' => $service->price
            ];
            $totalPrice += $service->price;
        }
        $request->merge(['services' => json_encode($services), 'total_price' => $totalPrice]);
        $serviceOrder = new ServiceOrder($request->all());
        $serviceOrder->save();
        return redirect()->route('admin.service-orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serviceOrder = ServiceOrder::findOrFail($id);
        return view('admin.service-orders.show',
            ['serviceOrder' => $serviceOrder]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serviceOrder = ServiceOrder::findOrFail($id);
        return view('admin.service-orders.edit',
            ['serviceOrder' => $serviceOrder]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $serviceOrder = ServiceOrder::findOrFail($id);
        $serviceOrder->fill($request->all());
        $serviceOrder->save();
        return redirect()->route('admin.service-orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serviceOrder = ServiceOrder::findOrFail($id);
        $serviceOrder->delete();
        return redirect()->route('admin.service-orders.index');
    }
}
