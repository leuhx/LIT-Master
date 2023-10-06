<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = ServiceOrder::all();
        return view('home', [
            'total' => $total->count(),
            'valorTotal' => $total->sum('total_price')
        ]);
    }
}
