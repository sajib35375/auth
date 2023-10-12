<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">





</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    @include('admin.header')

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar-->
        @include('admin.sidebar')

        @include('admin.sidebar-footer')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            @yield('admin')
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
            <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Purchase Now</a>
                </li>
            </ul>
        </div>
        &copy; 2020 <a href="#">Shahnewaj Sajib</a>
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- choose one -->

<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>--}}
<script src="{{ asset('backend/app.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

{{--tags input--}}
<script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
{{--ck editor--}}
<script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
<script src="{{ asset('backend/js/pages/editor.js') }}"></script>
<!-- Sunny Admin App -->
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>


<script>
    @if( Session::has('message') )
        var type = "{{ Session::get('alert_type','info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}")
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}")
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}")
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;
    }

    @endif
</script>

<script>
    $(document).ready(function(){
        $('select[name="division_id"]').change(function (){
            let id = $(this).val();

            if (id){
                $.ajax({
                    url:"{{ url('shipping/district/editShow/') }}/"+id,
                    method:"GET",
                    dataType:"json",
                    success:function (data){
                        var d = $('select[name="district_id"]').empty();
                        $.each(data,function (key,value){
                            $('select[name="district_id').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                        })
                    }
                });
            }else{
                alert('danger');
            }
        });

    });



    $(document).ready(function(){
        $('select[name="district_id"]').change(function (){
            let id = $(this).val();

            if (id){
                $.ajax({
                    url:"{{ url('state/editShow/') }}/"+id,
                    method:"GET",
                    dataType:"json",
                    success:function (data){
                        var d = $('select[name="state_id"]').empty();
                        $.each(data,function (key,value){
                            $('select[name="state_id').append('<option value="'+value.id+'">'+value.state_name+'</option>');
                        })
                    }
                });
            }else{
                alert('danger');
            }
        });



    });



    {{--$(document).ready(function(){--}}
    {{--    $('select[name="category_id"]').change(function (){--}}
    {{--        let id = $(this).val();--}}

    {{--        if (id){--}}
    {{--            $.ajax({--}}
    {{--                url:"{{ url('sub-category/edit/show/') }}/"+id,--}}
    {{--                method:"GET",--}}
    {{--                dataType:"json",--}}
    {{--                success:function (data){--}}
    {{--                    var d = $('select[name="subcategory_id"]').empty();--}}
    {{--                    $.each(data,function (key,value){--}}
    {{--                        $('select[name="subcategory_id').append('<option value="'+value.id+'">'+value.sub_cat_name_eng+'</option>');--}}
    {{--                    })--}}
    {{--                }--}}
    {{--            });--}}
    {{--        }else{--}}
    {{--            alert('danger');--}}
    {{--        }--}}
    {{--    });--}}

    {{--});--}}



</script>


</body>
</html>
