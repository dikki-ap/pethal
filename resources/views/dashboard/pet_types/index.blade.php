@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Pet Types</h1>
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

        <a href="/admin/pet-type/create" class="btn btn-primary border-0 my-3" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="file-plus"></span>&nbsp; Add New Pet Type</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col"><strong>No</strong></th>
                <th scope="col"><strong>Name</strong></th>
                <th scope="col"><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pet_types as $pet_type)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pet_type->name }}</td>
                    <td>
                        <a href="/admin/pet-type/{{ $pet_type->id }}/edit" class="badge bg-success">
                            <span data-feather="edit"></span>
                        </a>
                        <form action="/admin/pet-type/{{ $pet_type->id }}" method="POST" class="d-inline">
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