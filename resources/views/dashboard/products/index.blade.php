@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Products</h1>
        </div>
    </div>

    <div class="table-responsive col-lg-12">

        {{-- Flash Message Post Added Success --}}
        @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <a href="/admin/product/create" class="btn btn-primary border-0 my-3" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="file-plus"></span>&nbsp; Add New product</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->product_type->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="/admin/product/{{ $product->id }}" class="badge bg-primary">
                            <span data-feather="eye"></span>
                        </a>
                        <a href="/admin/product/{{ $product->id }}/edit" class="badge bg-success">
                            <span data-feather="edit"></span>
                        </a>
                        <form action="/admin/product/{{ $product->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf

                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete this data?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection