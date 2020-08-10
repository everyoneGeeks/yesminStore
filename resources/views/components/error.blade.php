@if ($errors->any())
@foreach ($errors->all() as $error)

@section('javascript')
toastr.success(      {{ $error }}, 'Miracle Max Says')

@endsection


          

      

                @endforeach
@endif

