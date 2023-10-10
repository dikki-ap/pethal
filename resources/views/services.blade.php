@extends('layouts.main_single_page')
@section('container')
<h1 class="text-center" style="color: #4dab6e">Services</h1>
@if ($serviceCount > 0)
<div class="row">
  @foreach ($services as $service)
    <div class="col d-flex justify-content-center my-5">
        <div class="card">
            <a href="/services/{{ $service->id }}" class="text-center"><img src="../img/services.png" alt="Image" class="img-fluid" width="300"></a>
            <div class="card-body text-center">
                <h5 class="card-title text-center"><strong>{{ $service->name }}</strong></h5>
                <h6 class="card-text"><i class="bi bi-tags-fill"></i> &nbsp; Rp. {{ $service->price }}</h6>
                <h6 class="card-text">
                    @if($service->isNeedDoctor == 1)
                    <i class="bi bi-person-check-fill"></i> &nbsp; Doctor: Yes
                    @else
                    <i class="bi bi-person-x-fill"></i> &nbsp; Doctor: No
                    @endif
                </h6>
                <a href="/services/{{ $service->id }}" class="btn btn-primary" style="background-color: #4dab6e; border-color: #FEF5ED">Details</a>
            </div>
        </div>
    </div>
    
  @endforeach
</div>

<div class="container">
  <div class="d-flex justify-content-start">
      {{ $services->links( ) }}
  </div>
</div>
@else
<h3 class="text-center" style="color: grey"><em>There are currently no articles available</em></h3>
@endif

@endsection