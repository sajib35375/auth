<script>

    @if( $errors->any() )

        swal('validation Error','{{ $errors->first() }}','danger')

        @endif



    @if( Session::has('success') )



    swal('success','{{ Session::get('success') }}','success')


    @endif

</script>
