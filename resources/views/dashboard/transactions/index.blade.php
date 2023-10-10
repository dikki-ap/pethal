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
                <th scope="col"><strong>No</strong></th>
                <th scope="col"><strong>Product</strong></th>
                <th scope="col"><strong>Product Type</strong></th>
                <th scope="col"><strong>Payment Type</strong></th>
                <th scope="col"><strong>Quantity</strong></th>
                <th scope="col"><strong></strong></th>
                <th scope="col"><strong>Order Created</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->product_type->name }}</td>
                        <td>{{ $transaction->payment_type->name }}</td>
                        <td>{{ $transaction->quantity}}</td>
                        <td>Rp. {{ $transaction->total }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->formatLocalized('%A, %d %B %Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection