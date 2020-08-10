@if ($errors->any())
@foreach ($errors->all() as $error)

@section('javascript')
<script>
toastr.error("{{ $error }}", 'خطاء !');
</script>
@endsection


          

      

                @endforeach
@endif

