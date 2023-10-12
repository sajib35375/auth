@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->



            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add New Product</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form id="add_product" action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Brand Name <span class="text-danger">*</span></h5>
                                                        <select name="brand_id" id="" class="form-control">
                                                            <option  value="">Select</option>
                                                            @foreach( $brands as $brand )
                                                                <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                                        <select name="category_id" id="" class="form-control">
                                                            <option  value="">Select</option>
                                                            @foreach( $cat as $category )
                                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>SubCategory Name <span class="text-danger">*</span></h5>
                                                        <select name="subcategory_id" id="" class="form-control">
                                                            <option value="">Select</option>
                                                        </select>
                                                        @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                           </div> {{-- //end 1st row--}}

                                            <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                       <h5>SubSubCategory Name English<span class="text-danger">*</span></h5>
                                                       <select name="sub_subcategory_id" class="form-control">
                                                           <option  value="">Select</option>
                                                       </select>
                                                       @error('sub_subcategory_id')
                                                       <span class="text-danger">{{ $message }}</span>
                                                       @enderror
                                                   </div>
                                               </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name English <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_eng" class="form-control" > </div>
                                                        @error('product_name_eng')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name Bangla <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_ban" class="form-control" > </div>
                                                        @error('product_name_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                          </div> {{--   end 2nd row--}}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Code <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_code" class="form-control" > </div>
                                                        @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Quantity <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_quantity" class="form-control" > </div>
                                                        @error('product_quantity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Tags English <span class="text-danger">*</span></h5>

                                                            <input type="text" name="product_tags_eng" data-role="tagsinput" value="Lorem,Ipsum,Amet" >
                                                        @error('product_tags_eng')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
{{--                                            end 3rd row--}}

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Tags Bangla<span class="text-danger">*</span></h5>

                                                        <input type="text" name="product_tags_ban" data-role="tagsinput" value="Lorem,Ipsum,Amet" >
                                                        @error('product_tags_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Size English <span class="text-danger">*</span></h5>

                                                        <input type="text" name="product_size_eng" data-role="tagsinput" value="small,medium,large" >
                                                        @error('product_size_eng')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Size Bangla <span class="text-danger">*</span></h5>

                                                        <input type="text" name="product_size_ban" data-role="tagsinput" value="ছোট,মধ্যম,বড়" >
                                                        @error('product_size_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
{{--                                                end 4th row--}}

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Color English<span class="text-danger">*</span></h5>

                                                        <input type="text" name="product_color_eng" data-role="tagsinput" value="red,white,black" >
                                                        @error('product_color_eng')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product color Bangla <span class="text-danger">*</span></h5>

                                                        <input type="text" name="product_color_ban" data-role="tagsinput" value="লাল,সাদা,কালো" >
                                                        @error('product_color_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Selling Price <span class="text-danger">*</span></h5>

                                                        <input type="text" name="product_selling_price" class="form-control" >
                                                        @error('product_selling_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
{{--                                            end 5th row--}}

                                            {{--                                            start 6th row--}}

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Discount Price<span class="text-danger">*</span></h5>

                                                        <input type="text" name="product_discount_price" class="form-control" >
                                                        @error('product_discount_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Product Thumbnail <span class="text-danger">*</span></h5>
                                                        <input type="file" name="product_thumbnail" class="form-control-file" >

                                                        <img  id="image" src="" alt="">
                                                        @error('product_thumbnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Multiple Image <span class="text-danger">*</span></h5>

                                                        <input id="multi" type="file" name="multi_img[]" class="form-control-file" multiple="" >
                                                        <div style="display: inline;"  id="multipic"></div>
                                                        @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            end 6th row--}}

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Short Description English <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="product_short_des_eng" id="textarea" class="form-control" required placeholder="Short-description-eng"></textarea>
                                                        </div>
                                                        @error('product_short_des_eng')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="product_short_des_ban" id="textarea" class="form-control" required placeholder="Short-description-ban"></textarea>
                                                        </div>
                                                        @error('product_short_des_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{--                                            end 7th row--}}

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Long Description English <span class="text-danger">*</span></h5>

                                                        <textarea id="editor1" name="product_long_des_eng" rows="10" cols="80">
                                                            Product Long Description English
                                                        </textarea>
                                                        @error('product_long_des_eng')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Long Description Bangla <span class="text-danger">*</span></h5>

                                                        <textarea id="editor2" name="product_long_des_ban" rows="10" cols="80">
                                                            Product Long Description Bangla
                                                        </textarea>
                                                        @error('product_long_des_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            end 8th row--}}

                                            <hr>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <div class="controls">
                                                            <fieldset>
                                                                <input name="featured" type="checkbox" id="checkbox_1" value="1">
                                                                <label for="checkbox_1">featured</label>
                                                            </fieldset>
                                                            <fieldset>
                                                                <input name="hot_deals" type="checkbox" id="checkbox_2" value="1">
                                                                <label for="checkbox_2">hot_deals</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <div class="controls">
                                                            <fieldset>
                                                                <input name="special_offer" type="checkbox" id="checkbox_3" value="1">
                                                                <label for="checkbox_3">special_offer</label>
                                                            </fieldset>
                                                            <fieldset>
                                                                <input name="special_deals" type="checkbox" id="checkbox_4" value="1">
                                                                <label for="checkbox_4">special_deals</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>




                                    <div class="text-xs-right">
                                        <input name="submit_button" value="add product" class="btn btn-primary" type="submit">
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>

    <script>
        $(document).ready(function (){
           $('select[name="category_id"]').change(function (){
               let id = $(this).val();

               if (id){
                   $.ajax({
                       url:"{{ url('show-subcategory') }}/"+id,
                       method:"GET",
                       dataType:"json",
                       success:function (data){
                           $('select[name="sub_subcategory_id"]').html('');
                           var d = $('select[name="subcategory_id"]').empty();
                           $.each(data,function (key,value){
                                $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.sub_cat_name_eng+'</option>');
                           });


                       }
                   });
               }else {
                   alert('danger');
               }
           });

           $('select[name="subcategory_id"]').change(function (){
                let sub_id = $(this).val();
                if (sub_id){
                    $.ajax({
                       url:"{{ url('show-SubSubCategory') }}/"+sub_id,
                       method:"GET",
                       dataType:"json",
                       success:function (data){
                           var d = $('select[name="sub_subcategory_id"]').empty();
                           $.each(data,function (key,value){
                               $('select[name="sub_subcategory_id"]').append('<option value="'+value.id+'">'+value.sub_subcategory_name_eng+'</option>');
                           });
                       }
                    });
                }else{
                    alert('danger');
                }
           });

            $('input[name="product_thumbnail"]').change(function (e){
                let url = URL.createObjectURL(e.target.files[0]);
                if (url){
                    $('#image').attr('src',url).width(80).height(80);
                }
            });

           $('input#multi').change(function (e){
               let multi_img ='';
               for (let i=0;i<e.target.files.length;i++){
                   let img_url = URL.createObjectURL(e.target.files[i]);
                   multi_img += '<img style="width: 80px;height: 80px;" src="'+img_url+'" alt=""/>';
               }
               $('#multipic').html(multi_img);

           })

            $('input[name="submit_button"]').click(function (){
                $('form#add_product').submit();
            });




        });

    </script>





    @endsection
