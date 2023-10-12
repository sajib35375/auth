<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $seo = App\Models\Seo::find(1);
    @endphp
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keywords" content="{{ $seo->meta_keywords }}">
    <meta name="robots" content="all">
    <title>Online Shop</title>
        <script>
            {{ $seo->google_analytics }}
        </script>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">


    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">



    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">


    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->

            <!-- ============================================== SIDEBAR ============================================== -->


            @yield('content')

            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->


@include('frontend.body.brand')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->








@include('frontend.body.footer')
=================================================== FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/assets/js/jquery-3.5.1.slim.min.js') }}"></script>--}}
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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
        case 'danger':
            toastr.warning("{{ Session::get('message') }}")
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;
    }

    @endif
    </script>
{{--add to cart modal--}}

<div id="addtocart" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div style="width: 800px;height: 350px;margin: auto;" class="modal-content">
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="card">
                                <label for="#">Product Name :<span id="product_name"></span></label>
                                <img style="width: 160px;height: 200px;" id="p_img" src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price :<span id="price"></span> </li>
                                <li class="list-group-item">Product code :<span id="code"></span></li>
                                <li class="list-group-item">Brands :<span id="brands"></span></li>
                                <li class="list-group-item">Category :<span id="category"></span></li>
                                <li class="list-group-item">stock :<span style="background: green;" class="badge badge-pill badge-success" id="available"></span><span style="background: red;" class="badge badge-pill badge-danger" id="stockout"></span></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="#">Color</label>
                            <select class="form-control" name="color" id="p_color">
                                <option selected disabled value="">-select-</option>

                            </select>
                        </div>
                        <br>
                        <div id="sizeArea" class="form-group">
                            <label for="#">Size</label>
                            <select class="form-control" name="size" id="p_size">
                                <option selected disabled value="">-select-</option>

                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="#">Quantity</label>
                            <input name="quantity" id="qnt" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cart_id">
                        <input class="btn btn-danger cart_btn" value="AddToCart" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function (){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.modal_btn',function (e){
            e.preventDefault();
            let id = $(this).attr('modal_id');

            $.ajax({

                url : '/show/add_to_cart/'+id,
                success : function (data){

                    $('#addtocart').modal('show');
                    $('#qnt').html(data.product.product_quantity);
                    if (data.product.product_discount_price){
                        $('#price').html(data.product.product_discount_price);
                    }else{
                        $('#price').html(data.product.product_selling_price);
                    }
                    $('ul li #code').html(data.product.product_code);
                    $('ul li #brands').html(data.product.brand.brand_name_en);
                    $('ul li #category').html(data.product.category.category_name_en);
                    $('#p_img').attr('src','{{ URL::to('') }}/images/thumbnail/'+data.product.product_thumbnail);
                    $('#product_name').html(data.product.product_name_eng);
                    $('input[name="cart_id"]').val(data.product.id);
                    $('select[name="color"]').empty();
                    $.each(data.color,function (key,value){
                        $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
                    });
                    $('select[name="size"]').empty();
                    $.each(data.size,function (key,value){
                        $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
                    });
                    if (data.size==""){
                        $('#sizeArea').hide();
                    }else{
                        $('#sizeArea').show();
                    }
                    if (data.product.product_quantity > 0){
                        $('#stockout').text('');
                        $('#available').text('');
                        $('#available').text('available');
                    }else{
                        $('#stockout').text('');
                        $('#available').text('');
                        $('#stockout').text('stockout');
                    }
                }
            });

        });


        $(document).on('click','.cart_btn',function (e){
            e.preventDefault();
            let cart_id = $('input[name="cart_id"]').val();
            let product_name = $('#product_name').text();
            // let price = $('#price').text();
            // let code = $('#code').text();
            let brand = $('#brands').text();
            let category = $('#category').text();
            let quantity = $('#qnt').val();
            let color = $('#p_color option:selected').text();
            let size = $('#p_size option:selected').text();


            $.ajax({
                type :"POST",
                dataType:'json',
                 data :{
                     name:product_name,
                     brand:brand,
                     category:category,
                     color:color,
                     size:size,
                     quantity:quantity
                 },
                // contentType :false,
                // processData :false,
                url :'/AddToCart-store/'+cart_id,
                success :function (data){
                    $('#addtocart').modal('hide');
                    // console.log(data);
                    miniCart();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            title:data.success
                        })
                    }else{
                        Toast.fire({
                            type:'error',
                            title:data.error
                        })
                    }

                }
            });
        })





    });


</script>
<script>
    function miniCart(){
        $.ajax({
           type : 'GET',
            url : '/AddTo/MiniCart/',
           dataType : 'json',
            success : function (data){
                MyCert();
                couponCal();
                $('#cartSubTotal').text(data.cartTotal);
                $('#SubTotal').text(data.cartTotal);
                $('#Qty').text(data.cartQty);
                var miniCart = "";
              $.each(data.cartCount,function (key,value){
                  miniCart += `<div class="cart-item product-summary">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="image"> <a href="detail.html"><img src="{{ URL::to('') }}/images/thumbnail/${value.options.image}" alt=""></a> </div>
                                </div>
                                <div class="col-xs-7">
                                    <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                    <div class="price">${value.price} * ${value.qty}</div>
                                </div>
                                <div class="col-xs-1 action"> <button type="submit" id=${value.rowId} onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                            </div>
                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>`;

              });
              $('#miniCart').html(miniCart);
            }
        });
    }
    miniCart();
// product delete from mini cart
    function miniCartRemove(rowId){
        $.ajax({
             type:"GET",
             url :'/remove/MiniCart/product/'+rowId,
              dataType:'json',
              success : function(data){
                  miniCart();
                  MyCert();
                  couponCal();


                  const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 1500,
                  });
                  if( $.isEmptyObject(data.error) ){
                      Toast.fire({
                      type : 'success',
                    icon: 'success',
                      title : data.success,
                  });
                  }else{
                  Toast.fire({
                  type : 'error',
                  icon: 'error',
                  title : data.error,
                  });
                  }
              }
      });
    }

</script>




{{--wishlist--}}
<script>
function addToWishlist(id){
    $.ajax({
       type:"POST",
       dataType:"json",
       url:'add/wishlist/'+id,
       success:function (data){
           const Toast = Swal.mixin({
               toast:true,
               position: 'top-end',
               showConfirmButton: false,
               timer: 1500,
           });
           if( $.isEmptyObject(data.error) ){
               Toast.fire({
                   type : 'success',
                   icon: 'success',
                   title : data.success,
               });
           }else{
               Toast.fire({
                   type : 'error',
                   icon: 'error',
                   title : data.error,
               });
           }
       }
    });
}

</script>
{{--wishlist--}}
<script>
function wishlist(){
    $.ajax({
        type:'GET',
        url:'/show/wishlist/',
        dataType:'json',
        success:function (data){
            var rows = "";
            $.each(data,function (key,value){
                rows += `
                <tr>
                    <td class="col-md-2"><img src="{{ URL::to('') }}/images/thumbnail/${value.product.product_thumbnail}"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_eng}</a></div>
                        <div class="rating">
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star non-rate"></i>
                            <span class="review">( 06 Reviews )</span>
                        </div>

                            <div class="price">
                                ${value.product.product_discount_price == null ?
                                `${value.product.product_selling_price}` :
                                `${value.product.product_discount_price}
                                <span style="color: grey;">${value.product.product_selling_price}</span>`
                            }
                         </div>
                    </td>
                    <td class="col-md-2">
                       <button  modal_id="${value.product_id}" class="btn btn-primary modal_btn"   type="button"> Add to Cart </button>

                    </td>
                    <td class="col-md-1 close-btn">
                        <button type="submit" id="${value.id}" onclick="RemoveWish(this.id)" class=""><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                `;

            });
            $('#wish').html(rows);
        }
    });





}

wishlist();

// remove product from wishlist
function RemoveWish(id){
    $.ajax({
        type:"GET",
        url :'/remove/wishlist-product/'+id,
        dataType:'json',
        success : function(data){
            wishlist();

            const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',

                showConfirmButton: false,
                timer: 1500,
            });
            if( $.isEmptyObject(data.error) ){
                Toast.fire({
                    type : 'success',
                    icon: 'success',
                    title : data.success,
                });
            }else{
                Toast.fire({
                    type : 'error',
                    icon: 'error',
                    title : data.error,
                });
            }
        }
    });


}

// cart page function start
function MyCert(){
    $.ajax({
        type:'GET',
        url:'/load/myCart/',
        dataType:'json',
        success:function (data){
            var rows = "";
            $.each(data.cart,function (key,value){
                rows += `
                <tr>
                    <td  class="col-md-2"><img style="width: 80px;height: 80px;" src={{ URL::to('') }}/images/thumbnail/${value.options.image}></td>
                    <td class="col-md-2">
                            <div class="price">
                            ${value.price}
                            </div>
                        </td>
                    <td class="col-md-2">
                            <div >
                            ${value.options.color}
                            </div>
                        </td>

                        <td class="col-md-2">
                            <div >
                            ${value.options.size}
                            </div>
                        </td>

                        <td class="col-md-2">
                            <div >
                            <button id="${value.rowId}" onclick="cartIncrement(this.id)" type="submit" class="btn btn-sm btn-success">+</button>
                            <input style="width: 25px;" value="${value.qty}" type="text">
                            <button id="${value.rowId}" onclick="cartDecrement(this.id)" type="submit" class="btn btn-sm btn-danger">-</button>
                            </div>
                        </td>

                    <td class="col-md-1 close-btn">
                        <button type="submit" id="${value.rowId}" onclick="RemoveCart(this.id)" class=""><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                `;

            });
            $('#cart').html(rows);
        }
    });
}
MyCert();

// remove product from wishlist
function RemoveCart(rowId){
    $.ajax({
        type:"GET",
        url :'/remove/myCart/'+rowId,
        dataType:'json',
        success : function(data){
            miniCart();
            MyCert();
            couponCal();
            $('#couponDiscountTable').show();
            $('#coupon_name').val('');
            const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
            });
            if( $.isEmptyObject(data.error) ){
                Toast.fire({
                    type : 'success',
                    icon: 'success',
                    title : data.success,
                });
            }else{
                Toast.fire({
                    type : 'error',
                    icon: 'error',
                    title : data.error,
                });
            }
        }
    });


}

// cart increment

function cartIncrement(rowId){
    $.ajax({
        type:"GET",
        dataType:"json",
        url:'/cart/increment/'+rowId,
        success:function (data){
            miniCart();
            MyCert();
            couponCal();
            const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
            });
            if( $.isEmptyObject(data.error) ){
                Toast.fire({
                    type : 'success',
                    icon: 'success',
                    title : data.success,
                });
            }else{
                Toast.fire({
                    type : 'error',
                    icon: 'error',
                    title : data.error,
                });
            }
        }
    });
}

// cart decrement

function cartDecrement(rowId){
    $.ajax({
        type:"GET",
        dataType:"json",
        url:'/cart/decrement/'+rowId,
        success:function (data){
            miniCart();
            MyCert();
            couponCal();
            const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
            });
            if( $.isEmptyObject(data.error) ){
                Toast.fire({
                    type : 'success',
                    icon: 'success',
                    title : data.success,
                });
            }else{
                Toast.fire({
                    type : 'error',
                    icon: 'error',
                    title : data.error,
                });
            }
        }
    });
}

</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
function couponApply(){
    var coupon_name = $('#coupon_name').val();

    $.ajax({
        type:"POST",
        dataType:'json',
        data:{coupon_name:coupon_name},
        url:"{{ url('/couponApply') }}",
        success:function (data){
            couponCal();
            if(data.validity==true){
                $('#couponDiscountTable').hide();
            }
            const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
            });
            if( $.isEmptyObject(data.error) ){
                Toast.fire({
                    type : 'success',
                    icon: 'success',
                    title : data.success,
                });
            }else{
                Toast.fire({
                    type : 'error',
                    icon: 'error',
                    title : data.error,
                });
            }
        }
    })
}


    function shippingCharge(){

         ship_charge = $('#ship_charge option:selected').text();


        $.ajax({
            type:"POST",
            dataType: 'json',
            data:{ship_charge:ship_charge},
            url: "{{ url('/add-shipping-charge') }}",
            success:function (data) {
                couponCal();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                });
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    });
                }
            }
        })
    }
    // shippingCharge();
function couponCal(){
    $.ajax({
        type:"GET",
        dataType:'json',
        url:"{{ url('coupon/calculation') }}",
        success:function (data){
            var d = $('.cart-ship-charge span').empty();

            if (data.total) {
                $('#couponCal').html(
                    `<tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md">$ ${data.total}</span>
                            </div>
                               <div class="cart-ship-charge">
                                Ship Charge<span class="inner-left-md">$ ${data.ship_charge}</span>
                            </div>
                        </th>
                    </tr>`
                )
            }else{
                $('#couponCal').html(
                    `<tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                            </div>
                              <div class="cart-sub-total">
                                Coupon Name<span class="inner-left-md">$ ${data.coupon_name}</span>
                                <button type="submit" onclick="couponRemove()"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                             <div class="cart-sub-total">
                                Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
                            </div>
                             </div>
                               <div class="cart-ship-charge">
                                Ship Charge<span class="inner-left-md">$ ${data.ship_charge}</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md">$ ${data.Grand_total}</span>
                            </div>
                        </th>
                    </tr>`
                )
            }
        }
    });
}
    couponCal();

function couponRemove(){
    $.ajax({
        type:"GET",
        dataType:'json',
        url:"{{ url('/coupon/remove') }}",
        success:function (data){
            couponCal();
            $('#couponDiscountTable').show();
            $('#coupon_name').val('');
            const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
            });
            if( $.isEmptyObject(data.error) ){
                Toast.fire({
                    type : 'success',
                    icon: 'success',
                    title : data.success,
                });
            }else{
                Toast.fire({
                    type : 'error',
                    icon: 'error',
                    title : data.error,
                });
            }
        }
    })
}




</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    const site_url = "http://127.0.0.1:8000/";
    $("body").on("keyup",'#search',function (){
        let text = $('#search').val();

        if (text.length > 0){
        $.ajax({
            data:{search:text},
            url:"{{ URL::to('') }}/advance/search/",
            method:"post",
            success:function (result){
                $('#adsearch').html(result);
            }
        });
        }
        if (text.length < 1){
            $('#adsearch').html("");
        }

    });


</script>

<script>
    // getAddress();
function getAddress(){
   let div = $('#division option:selected').text();
   let div_id = $('#division option:selected').val();
   let dis = $('#district option:selected').text();
   let dis_id = $('#district option:selected').val();
   let st = $('#state option:selected').text();
   let st_id = $('#state option:selected').val();

    $.ajax({
        type:"POST",
        dataType: "json",
        data: {div:div,dis:dis,st:st,div_id:div_id,dis_id:dis_id,st_id:st_id},
        url: "{{ url('shipping/address') }}",
        success: function (data){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
            });
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                });
            } else {
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                });
            }
        }
    })
}




</script>
<script>
    $(document).ready(function (){
        $(document).on('click','#ship_btn',function (e){

            $('#proceedCheck').show();

        });

    });
</script>


</body>
</html>
