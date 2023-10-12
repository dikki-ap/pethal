@extends('layouts.main_single_page')
@section('container')
<h1 class="text-center" style="color: #4dab6e">Products</h1>
@if ($productCount > 0)
<div class="row">
  @foreach ($products as $product)
    <div class="col d-flex justify-content-center my-5">
        <div class="card">
            @if ($product->galleries->isNotEmpty())
                @php $firstImageUrl = $product->galleries->first()->url; @endphp
                <a href="/products/{{ $product->id }}" class="text-center"><img src="{{ $firstImageUrl }}" alt="Image" class="img-fluid" width="300"></a> 
                
            @endif
            <div class="card-body text-center">
                <h5 class="card-title"><strong>{{ $product->name }}</strong></h5>
                <h6 class="card-text"><i class="bi bi-box"></i></i> &nbsp; Category: {{ $product->product_type->name }}</h6>
                <h6 class="card-text"><i class="bi bi-tags-fill"></i> &nbsp; Rp. {{ $product->price }}</h6>
                <a href="/products/{{ $product->id }}" class="btn btn-primary" style="background-color: #4dab6e; border-color: #FEF5ED">Read More</a>
            </div>
        </div>
    </div>
    
  @endforeach
</div>

<div class="container">
  <div class="d-flex justify-content-start">
      {{ $products->links( ) }}
  </div>
</div>
@else
  <h3 class="text-center" style="color: grey"><em>There are currently no articles available</em></h3>
@endif

@endsection