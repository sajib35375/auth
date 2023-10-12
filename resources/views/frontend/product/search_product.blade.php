
<div class="container mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <div class="card">
                @foreach( $products as $pro )
                    <a href="{{ route('product.details',$pro->id) }}">
                <div class="list border-bottom"> <img style="width: 50px;height: 50px;" src="{{ URL::to('') }}/images/thumbnail/{{ $pro->product_thumbnail }}" alt="">
                    <div class="d-flex flex-column ml-3"> <span>{{ $pro->product_name_eng }}</span> <small></small> </div>
                </div></a>
                @endforeach

            </div>
        </div>
    </div>
</div>

<style>

    body {
        background-color: #eee
    }

    .card {
        background-color: #fff;
        padding: 15px;
        border: none
    }

    .input-box {
        position: relative
    }

    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }

    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }

    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee
    }

    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center
    }

    .border-bottom {
        border-bottom: 2px solid #eee
    }

    .list i {
        font-size: 19px;
        color: red
    }

    .list small {
        color: #dedddd
    }


</style>
