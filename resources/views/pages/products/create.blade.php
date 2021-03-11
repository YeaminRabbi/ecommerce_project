@extends('layouts.admin_layout')

@section('content')




<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Icons</a></li>
                                <li class="breadcrumb-item active">Basic Inputs</li>
                            </ol>
                        </div>
                        <h4 class="page-title">insert table</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            @include('alert.messages')
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Start Writing your Sub Category name & Slug</h4>
                                    <p class="sub-header">
                                            
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    {{method_field('PUT')}}

                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Product Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="product_title" id="simpleinput" class="form-control" placeholder="Write a Sub Category name which you want to add in your store" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Product Slug Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="slug" id="simpleinput" class="form-control" placeholder="Write a Sub Category name which you want to add in your store" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Product Unit Price</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="unit_price" id="simpleinput" class="form-control" placeholder="Write a Sub Category name which you want to add in your store" autocomplete="off">
                                                        </div>
                                                    </div>





                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Select Category</label>
                                                        <div class="col-md-10">

                                                            <select class="form-control selectpicker" name="category_id" data-style="btn-primary">
                                                                @foreach ($categories as $category)
                                                                 <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                                                                @endforeach
                                                                
                                                                
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                  


                                                   
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Select brand Name</label>
                                                        <div class="col-md-10">

                                                            <select class="form-control selectpicker" name="brand_id" data-style="btn-primary">
                                                                @foreach ($brands as $brand)
                                                                 <option value="{{ $brand->id }}">{{ $brand->brandname }}</option>
                                                                @endforeach
                                                                
                                                                
                                                            </select>
                                                           
                                                        </div>
                                                    </div>

                                                  




                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Select Sub Category</label>
                                                        <div class="col-md-10">

                                                            <select class="form-control selectpicker" name="subcategory_id" data-style="btn-primary">
                                                                @foreach ($subCategories as $subCategory)
                                                                 <option value="{{ $subCategory->id }}">{{ $subCategory->subcategoryname }}</option>
                                                                @endforeach
                                                                
                                                                
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                  




                                                    <div id="items">
                                                        <div class="row mg-t-20 attri">
                                                            <label for="color_id" class="col-sm-2 form-control-label">{{ __('Color')}}:</label>
                                                            <div class="col-sm-1 mg-t-10 mg-sm-t-0">
                                                                <select name="color_id[]" id="color_id" class="form-control selectpicker">
                                                                  @foreach ($colors as $color)
                                                                      <option value="{{ $color->id }}">{{ $color->colorname }}</option>
                                                                  @endforeach
                                                                </select>
                                                            </div>
                                                            <label for="size_id" class="col-sm-2 form-control-label">{{ __('Size')}}:</label>
                                                            <div class="col-sm-1 mg-t-10 mg-sm-t-0">
                                                                <select name="size_id[]" id="size_id" class="form-control selectpicker">
                                                                  @foreach ($sizes as $size)
                                                                      <option value="{{ $size->id }}">{{ $size->sizename }}</option>
                                                                  @endforeach
                                                                </select>
                                                            </div>
                                                            <label for="quantity" class="col-sm-2 form-control-label">{{ __('Quantity')}}:</label>
                                                            <div class="col-sm-1 mg-t-10 mg-sm-t-0">
                                                              <input type="text" name="quantity[]" class="form-control" placeholder="30">
                                                            </div>
                                                            {{-- ADD Button --}}
                                                            
                                                            <span id="add" class="btn btn-primary add-more button-blue tx-uppercase mr-2">ADD</span>
                                                            <span class="delete btn btn-primary add-more button-blue tx-uppercase mr-2">Remove</span>
                                                           
                                                        </div><!-- row -->
                                                    </div>    
                                                    


                                                    <div class="form-group row" style="margin-top:20px;">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Product Summary</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="summary" id="simpleinput" class="form-control" placeholder="Write a Sub Category name which you want to add in your store" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Product Description</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="description" id="simpleinput" class="form-control" placeholder="Write a Sub Category name which you want to add in your store" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Product SPECIFICATION</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="specification" id="simpleinput" class="form-control" placeholder="Write a product specification which you want to add in your store" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                    



                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Product image</label>
                                                        <div class="col-md-10">
                                                            <input type="file" name="image" id="simpleinput" class="form-control" placeholder="Write a Sub Category name which you want to add in your store" autocomplete="off">
                                                        </div>
                                                    </div>


                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div> 
                        <!-- end row -->


                      
                        <!-- end row -->


                        

                    

            
        </div> <!-- end container-fluid -->

    </div> <!-- end content -->

    



 <!-- Vendor js -->
 <script src="{{asset('anotherassets/js/vendor.min.js')}}"></script>

 <script src="{{asset('anotherassets/libs/switchery/switchery.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/select2/select2.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/jquery-mockjax/jquery.mockjax.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/autocomplete/jquery.autocomplete.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
 <script src="{{asset('anotherassets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js')}}"></script>

 <!-- Init js-->
 <script src="{{asset('anotherassets/js/pages/form-advanced.init.js')}}"></script>

 <!-- App js -->
 <script src="{{asset('anotherassets/js/app.min.js')}}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
     
     $(document).ready(function(){
         
         $(".delete").hide();
         $("#add").click(function(e){
             $(".delete").fadeIn("1500");
             $("#items").append(
                 '<div class="row mg-t-20 attri">'+
                     '<label for="color_id" class="col-sm-2 form-control-label">{{ __('Color')}}:</label>'+
                     '<div class="col-sm-1 mg-t-10 mg-sm-t-0">'+
                         '<select name="color_id[]" id="color_id" class="form-control ">'+
                             '@foreach ($colors as $color)'+
                             '<option value="{{ $color->id }}">{{ $color->colorname }}</option>'+
                             '@endforeach'+
                         '</select>'+
                     '</div>'+
                     '<label for="size_id" class="col-sm-2 form-control-label">{{ __('Size')}}:</label>'+
                     '<div class="col-sm-1 mg-t-10 mg-sm-t-0">'+
                         '<select name="size_id[]" id="size_id" class="form-control">'+
                             '@foreach ($sizes as $size)'+
                                 '<option value="{{ $size->id }}">{{ $size->sizename }}</option>'+
                             '@endforeach'+
                         '</select>'+
                     '</div>'+
                     '<label for="quantity" class="col-sm-2 form-control-label">{{ __('Quantity')}}:</label>'+
                         '<div class="col-sm-1 mg-t-10 mg-sm-t-0">'+
                             '<input type="text" name="quantity[]" class="form-control" placeholder="30">'+
                         '</div>'+
                 '</div>'
             );
         });
         $("body").on("click", ".delete", function(e){
             $(".attri").last().remove();
         });
     });
 </script>



@endsection



   




























