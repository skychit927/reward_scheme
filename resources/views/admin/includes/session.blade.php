<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

{{-- <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/toastr.min.js') }}" defer></script>
<script src="{{ asset('js/jquery-1.9.1.js') }}" defer></script> --}}
<script>
@if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
@endif
</script>
