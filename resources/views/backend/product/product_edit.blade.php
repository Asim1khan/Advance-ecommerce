@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add Product</h4>
        </div>
        <!-- /.box-header -->
    <div class="box-body">
  <div class="row">
  <div class="col">
  <form  action="{{ route('product.update') }}" method="POST">
    @csrf

  <div class="row">
  <div class="col-12">
   <div class="row">
   <div class="col-md-4">
    <div class="form-group">
        <input type="hidden" name="id" value="{{ $product->id}}">
        <h5> Select Brand <span class="text-danger">*</span></h5>
        <div class="controls">
           <select name="brand_id" class="form-control"  required>
               <option value="" selected="" disabled="">Select Brand</option>
               @foreach($brands as $brand)
               <option value="{{ $brand->id }}"{{$brand->id==$product->brand_id? 'selected':'' }}>{{$brand->brand_name_eng }}</option>	
               @endforeach
           </select>
           @error('brand_id') 
        <span class="text-danger">{{ $message }}</span>
        @enderror 
        </div>
            </div>
   </div>
   <div class="col-md-4">
    <div class="form-group">
        <h5> Select Catagory <span class="text-danger">*</span></h5>
        <div class="controls">
           <select name="category_id" class="form-control"  >
               <option value="" selected="" disabled="">Select Category</option>
               @foreach($catagories as $categorie)
               <option value="{{$categorie->id}}"{{ $categorie->id==$product->category_id? 'selected':'' }}>{{ $categorie->catagory_name_eng }}</option>	
               @endforeach
           </select>
           @error('category_id') 
        <span class="text-danger">{{ $message }}</span>
        @enderror 
        </div>
            </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <h5> Select Sub  Category<span class="text-danger">*</span></h5>
        <div class="controls">
           <select name="subcategor_id" class="form-control" >
            <option value="" selected="" disabled="">Select Sub Category</option>
            @foreach($subcatagories as $subcatagory)
            <option value="{{$subcatagory->id}}"{{ $subcatagory->id==$product->subcategor_id ? 'selected':'' }}>{{ $categorie->catagory_name_eng }}</option>	
            @endforeach
           </select>
           @error('subcategor_id') 
        <span class="text-danger">{{ $message }}</span>
        @enderror 
        </div>
         </div>
</div>
   </div>
   {{-- end row 1 --}}
         {{-- start row 2 --}}
         <div class="row">
            <div class="col-md-4">
             <div class="form-group">
                 <h5> Select Sub Sub category<span class="text-danger">*</span></h5>
                 <div class="controls">
                    <select name="subsubcategory_id" class="form-control"  >
                        <option value="" selected="" disabled="">Select Sub sub Category</option>
                        @foreach($subsubcatagories as $subsubcatagory)
                        <option value="{{$subsubcatagory->id}}"{{ $subsubcatagory->id==$product->subsubcategory_id ? 'selected':'' }}>{{ $categorie->catagory_name_eng }}</option>	
                        @endforeach
                    </select>
                    @error('subsubcategory_id') 
                 <span class="text-danger">{{$message }}</span>
                 @enderror 
                 </div>
                     </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Name English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_name_eng" class="form-control" value="{{$product->product_name_eng }}">
                     </div>
                </div>
                @error('product_name_eng') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Name Urdu <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_name_urdu" class="form-control" value="{{$product->product_name_urdu }}">
                     </div>
                </div>
                @error('product_name_urdu') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>
         {{-- end row 2 --}}
         {{-- start 3rd row --}}
         <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product code<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_code" class="form-control" required value="{{ $product->product_code }}">
                     </div>
                </div>
                @error('product_code') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_qty" class="form-control" required value="{{ $product->product_qty }}">
                     </div>
                </div>
                @error('product_qty') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Tag Enflish <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_tag_eng" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"  value="{{ $product->product_tag_eng }}">
                     </div>
                </div>
                @error('product_tag_eng') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>
         {{-- end of 3rd row --}}

         {{-- row 4 --}}
         <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Tag Urdu<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_tag_urdu" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" value="{{ $product->product_tag_urdu }}">
                     </div>
                </div>
                @error('product_code') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Size English <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_size_eng" class="form-control" value="small,Iarge,medium" data-role="tagsinput" value="{{ $product->product_size_eng }}">
                     </div>
                </div>
                @error('product_size_eng') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Size Urdu <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_tag_eng" class="form-control"  value="small,Iarge,medium" data-role="tagsinput" value="{{ $product->product_tag_eng }}">
                     </div>
                </div>
                @error('product_tag_eng') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>
         {{-- end of row 4 --}}
         {{-- row 5 --}}
         <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5>Product color English<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_color_eng" class="form-control" value="Red,white,blue" data-role="tagsinput" value="{{ $product->product_color_eng }}">
                     </div>
                </div>
                @error('product_code') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5>Product Color Urdu <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="product_color_urdu" class="form-control" value="red,green,blue" data-role="tagsinput" value="{{ $product->product_color_urdu }}">
                     </div>
                </div>
                @error('product_color_urdu') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
       
            </div>
         {{-- end of row 5 --}}
     {{-- start row 6 --}}

     <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="selling_price" class="form-control"  value="{{ $product->selling_price }}">
                 </div>
            </div>
            @error('selling_price') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <h5>Product Discount  Price<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="discount_price" class="form-control"  value="{{ $product->discount_price }}">
                 </div>
            </div>
            @error('product_code') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-4">
           
        </div>
        <div class="col-md-4">
       
        </div>
        </div>
     {{-- end row 6 --}}


   {{-- start row 7 --}}

   <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>Short Description English<span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea name="short_descp_eng" id="textarea" class="form-control" required placeholder="Textarea text">
                    {!! $product->short_descp_eng!!}
                </textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <h5>Short Description Urdu<span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea name="short_descp_urdu" id="textarea" class="form-control" required placeholder="Textarea text">
                    {!!$product->short_descp_urdu !!}
                </textarea>
            </div>
        </div>
      
    </div>
    </div>
 {{-- end row 7 --}}
   {{-- row 8 --}}
 <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <h5>long Description English<span class="text-danger">*</span></h5>
            <div class="controls">
        <textarea id="editor1" name="long_descp_eng" rows="10" cols="80">
                     {!!$product->long_descp_eng!!}
</textarea>            
</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <h5>long Description Urdu<span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea id="editor2" name="long_descp_urdu" rows="10" cols="80">
                    {!! $product->long_descp_urdu!!}
</textarea> 
</div>
        </div>
    </div>

    </div>
{{-- end row 8 --}}
<br>         
  
</div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_2" name="hot_deals"  value="1" {{ $product->hot_deals==1 ? 'checked': '' }}>
                    <label for="checkbox_2">Hot Deals</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured==1 ?'checked': '' }}>
                    <label for="checkbox_3">Featured</label>
                </fieldset>
            </div>
        </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <div class="controls">
            <fieldset>
                <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $product->special_offer==1? 'checked': '' }}>
                <label for="checkbox_4">Special Offer</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $product->special_deals==1? 'checked':''}}>
                <label for="checkbox_5">Special Deals</label>
            </fieldset>
        </div>
    </div>
</div>
</div>   
                    <div class="text-xs-right">
                        <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value=" Product Update">
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

    <!-- start multiple image section-->
    <section class="content">
        <div class="row"> 
    <div class="col-md-12">
        <div class="box bt-3 border-info">
          <div class="box-header">
            <h4 class="box-title"> Product Multiple Image <strong>Update</strong></h4>
          </div>
      <form method="Post"  action="{{ route('update-product-img') }}"  enctype="multipart/form-data">
        @csrf
     <div class="row row-sm">
      @foreach($multimges as $img)
        <div class="col-md-3">
            <div class="card" style="">
                <img class="card-img-top" src="{{ asset($img->photo_name) }}"  style="width:210px; height:130px;">
                <div class="card-body">
                  <h5 class="card-title">
                      <a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                  </h5>
                  <p class="card-text">
                      <div class="form-group">
                        <label class="form-control-label">Change Image<span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="multi_img[{{$img->id }}]">
                    </div>
                  </p>
                </div>
              </div> <!-- end of multiple image-->


              
              
   </div>    <!-- end of row-->

   @endforeach
 
     </div>
     <div class="text-xs-right">
        <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value=" Imge Update">
    </div>
      </form>
         

        </div>
      </div>

    </div>   <!--end of row -->
    </section>
          <!-- end multiple image update section-->



          <section class="content">
            <div class="row"> 
        <div class="col-md-12">
            <div class="box bt-3 border-info">
              <div class="box-header">
                <h4 class="box-title"> Product Thumbnil Image <strong>Update</strong></h4>
              </div>
          <form method="Post"  action="{{ route('update-product-thumbnil') }}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id }}">
            <input type="hidden" name="old_image" value="{{$product->product_thambnail}}">
         <div class="row row-sm">
            <div class="col-md-3">
                <div class="card" style="">
                    <img class="card-img-top" src="{{ asset($product->product_thambnail) }}"  style="width:210px; height:130px;">
                    <div class="card-body">
                      <h5 class="card-title">
                          <a href="" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                      </h5>
                      <p class="card-text">
                        <div class="form-group">
                            <h5>Main Thambnil<span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)">
                             </div>
                        </div>
                        @error('product_thambnail') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <img src="" id="mainThmb">
                      </p>
                    </div>
                  </div> <!-- end of single image--> 
       </div>    <!-- end of row-->
    
       
     
         </div>
         <div class="text-xs-right">
            <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value=" Imge Update">
        </div>
          </form>
            </div>
          </div>
    
        </div>   <!--end of row -->
        </section>

  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url:"{{ url('/catagory/subcategory/ajax')}}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      // when sub catagory change subsubcatagory will be empty automaticaly
                    $('select[name="subsubcategory_id"]').html('');
                    //end 
                     var d =$('select[name="subcategor_id"]').empty();
                        $.each(data, function(key,value){
                        $('select[name="subcategor_id"]').append('<option value="'+ value.id +'">' + value.sub_catagory_name_eng+ '</option>');
                             });
                  },
              });
          } else {
              alert('danger');
          }
      });
      
      $('select[name="subcategor_id"]').on('change', function(){
          var subcategor_id= $(this).val();
          if(subcategor_id) {
              $.ajax({
                  url:"{{ url('/catagory/sub-subcategory/ajax')}}/"+subcategor_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key,value){
                        $('select[name="subsubcategory_id"]').append('<option value="'+value.id +'">' + value.subsubcatagory_name_eng+'</option>');
                             });
                  },
              });
          } else {
              alert('danger');
          }
      });

   });

   </script>
{{-- //for singale  imaeg --}}
<script type="text/javascript">
       function mainThamUrl(input){
           if(input.files && input.files[0]){
               var reader=new FileReader();
                reader.onload=function (e){
             $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
             reader.readAsDataURL(input.files[0]);
           }
       }
   </script>
   {{-- //for multiple image --}}
   {{-- multiimage --}}
   <script>
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
     
    </script>
   {{-- end of multiImg --}}
@endsection