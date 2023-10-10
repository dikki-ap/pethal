@extends('dashboard.layouts.main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Article List</h1>
        </div>
    </div>

    <div class="table-responsive col-lg-12">

        {{-- Flash Message Post Added Success --}}
        @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <a href="/admin/article/create" class="btn btn-primary border-0 my-3" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="file-plus"></span>&nbsp; Add New Article</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col"><strong>No</strong></th>
                <th scope="col"><strong>Title</strong></th>
                <th scope="col"><strong></strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $article->short_title }}</td>
                    <td>
                        <a href="/admin/article/{{ $article->id }}" class="badge bg-primary">
                            <span data-feather="eye"></span>
                        </a>
                        <a href="/admin/article/{{ $article->id }}/edit" class="badge bg-success">
                            <span data-feather="edit"></span>
                        </a>
                        <form action="/admin/article/{{ $article->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf

                            <button class="badge bg-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection