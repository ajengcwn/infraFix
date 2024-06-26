@if ($errors->any())
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{$item}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
