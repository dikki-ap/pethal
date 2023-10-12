@extends('layouts.main_single_page')
@section('container')
<h1 class="text-center" style="color: #4dab6e">Articles</h1>
@if ($articleCount > 0)
<div class="row">
  @foreach ($articles as $article)
    <div class="col d-flex justify-content-center my-5">
      <div class="card">
        @if ($article->galleries->isNotEmpty())
            @php $firstImageUrl = $article->galleries->first()->url; @endphp
            <a href="/articles/{{ $article->id }}" class="text-center"><img src="{{ $firstImageUrl }}" alt="Image" class="img-fluid" width="275"></a> 
        @endif
        <div class="card-body text-center">
          <h5 class="card-title"><strong>{{ $article->short_title }}</strong></h5>
          <p class="card-text">{{ $article->excerpt }}</p>
          <a href="/articles/{{ $article->id }}" class="btn btn-primary" style="background-color: #4dab6e; border-color: #FEF5ED">Read More</a>
        </div>
      </div>
    </div>
    
  @endforeach
</div>

<div class="container">
  <div class="d-flex justify-content-start">
      {{ $articles->links( ) }}
  </div>
</div>
@else
  <h3 class="text-center" style="color: grey"><em>There are currently no articles available</em></h3>
@endif

@endsection