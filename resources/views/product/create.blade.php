<form action="{{ route('products.store') }}" method="post">
        @csrf
       <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
         Nome do produto:
         <input type="text" name="name" id="name" class="form-control">
         <button type="submit"> OK </button>
</form>