@if ($errors->any())
@foreach ($errors->all() as $error)

@section('javascript')
toastr.success(      {{ $error }}, ' ')

@endsection


                @endforeach
@endif

