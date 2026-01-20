<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // List all payments
    public function index()
    {
        $payments = Payment::with('order.user')->paginate(15);
        return view('admin.payments.index', compact('payments'));
    }

    // Show single payment
    public function show(Payment $payment)
    {
        $payment->load('order.user', 'order.items.product');
        return view('admin.payments.show', compact('payment'));
    }
}
