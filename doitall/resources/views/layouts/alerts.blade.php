@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success')}}
    </div> 
@endif
@if (session('danger'))
    <div class="alert alert-danger" role="alert">
        {{ session('danger')}}
    </div> 
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforeach
@endif

