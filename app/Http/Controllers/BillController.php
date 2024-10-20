<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.billing.payBill');
    }

    public function showBillingForm()
    {
        // Assume this is the array of months the user has paid for, in 'YYYY-MM' format
        $paidMonths = ['2024-01', '2024-03', '2024-06']; // Example data

        // Pass the paid months to the view
        return view('pages.billing.payBill', compact('paidMonths'));
    }

    public function processPayment(Request $request)
    {
        $selectedMonth = $request->input('month');

        // Process payment logic here

        return back()->with('success', 'Payment initiated for ' . $selectedMonth);
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
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
