@extends('dashboard.layouts.user_main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Transactions History</h1>
        </div>
    </div>

    <div class="table-responsive col-lg-12">

        {{-- Flash Message Post Added Success --}}
        @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
        @endif

        {{-- Flash Message Post Added Success --}}
        @if (session()->has('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <a href="/products" class="btn btn-primary border-0 my-3" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="file-plus"></span>&nbsp; Buy New Product</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Product</th>
                <th scope="col">Product Type</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->product_type->name }}</td>
                        <td>{{ $transaction->quantity}}</td>
                        <td>{{ $transaction->total }}</td>
                        <td>{{ $transaction->payment_type->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->formatLocalized('%A, %d %B %Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection