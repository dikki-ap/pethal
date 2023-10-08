@extends('dashboard.layouts.user_main')

@section('container')

    <div class="row mt-5" style="color: #4dab6e">
        <div class="col">
            <h1 class="fw-bold">Services History</h1>
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

        <a href="/services" class="btn btn-primary border-0 my-3" style="background-color: #4dab6e; border-color: #FEF5ED"><span data-feather="file-plus"></span>&nbsp; Book New Service</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Service</th>
                <th scope="col">Pet Type</th>
                <th scope="col">Doctor</th>
                <th scope="col">Payment <span class="typcn typcn-beaker"></span></th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->service_type->name }}</td>
                        <td>{{ $service->pet_type->name }}</td>
                        <td>
                            @if ($service->service_type->isNeedDoctor == 0)
                                -
                            @else
                            {{ $service->doctor->name }}
                            @endif
                        </td>
                        <td>{{ $service->payment_type->name }}</td>
                        <td>{{ $service->total }}</td>
                        <td>{{ \Carbon\Carbon::parse($service->service_date)->formatLocalized('%A, %d %B %Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection