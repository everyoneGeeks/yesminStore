
@if(Session::get('success'))
@if(App::getLocale()=='ar')
@section('javascript')
<script>
toastr.success("{{Session::get('success')['ar']}}");
</script>
@endsection

@else 

@section('javascript')
<script>
toastr.success("{{Session::get('success')['en']}}");
</script>
@endsection

@endif

@endif

@if(Session::get('error'))

@if(App::getLocale()=='ar')
<div class="alert alert-danger" role="alert">
{{Session::get('error')['ar']}}
</div>



@else 
<div class="alert alert-danger" role="alert">
 {{Session::get('error')['en']}}
</div>



@endif

@endif


