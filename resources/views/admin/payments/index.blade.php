@extends('admin.backend_layout.master')
@section('page_title','Payments')

@section('content')
<div class="card p-4 shadow-sm">
    <h4 class="mb-4">All Payments</h4>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>User</th>
                <th>Method</th>
                <th>Status</th>
                <th>Transaction ID</th>
                <th>Paid At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->order->id ?? 'N/A' }}</td>
                <td>{{ $payment->order->user->name ?? 'Guest' }}</td>
                <td>{{ ucfirst($payment->payment_method) }}</td>
                <td>
                    @if($payment->payment_status == 'paid')
                        <span class="badge bg-success">Paid</span>
                    @else
                        <span class="badge bg-danger">{{ ucfirst($payment->payment_status) }}</span>
                    @endif
                </td>
                <td>{{ $payment->transaction_id ?? '-' }}</td>
                <td>{{ $payment->paid_at?->format('d-m-Y H:i') ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payments->links() }}
</div>
@endsection
