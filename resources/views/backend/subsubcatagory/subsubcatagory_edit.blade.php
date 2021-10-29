@extends('admin.admin_master')
@section('admin')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="col-12">
          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Add  Sub->sub Catagory  Add</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">        
 <form method="post" action="{{ route('subsubcatagory.update') }}" >

    @csrf
    <input type="hidden" name="id" value="{{ $subsubcatagorys->id}}">
<div class="form-group">
<h5>Category Select <span class="text-danger">*</span></h5>
<div class="controls">
   <select name="category_id" class="form-control"  >
       <option value="" selected="" disabled="">Select Category</option>
       @foreach($catagorys as $category)
       <option value="{{ $category->id }}"{{$category->id==$subsubcatagorys->catagory_id ? 'selected' : ' '}}>{{ $category->catagory_name_eng }}</option>	
       @endforeach
   </select>
   @error('category_id') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
    </div>
    <div class="form-group">
        <h5>SubCategory Select <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="subcatagory_id" class="form-control"  >
                <option value="" selected="" disabled="">Select SubCategory</option>
                @foreach ($subcatagorys as $subctagory)
             <option value="{{ $subctagory->id }}"{{ $subctagory->id==$subsubcatagorys->subcatagory_id ?'selected':' ' }}>{{$subctagory->sub_catagory_name_eng }}</option>
                      @endforeach                    
            </select>
            @error('subcatagory_id') 
         <span class="text-danger">{{ $message }}</span>
         @enderror 
         </div>
             </div>
<div class="form-group">
   <h5>Sub-SubCategory English <span class="text-danger">*</span></h5>
   <div class="controls">
<input type="text" name="subsubcategory_name_eng" class="form-control"  value="{{ $subsubcatagorys->subsubcatagory_name_eng  }} ">
@error('subsubcategory_name_en') 
<span class="text-danger">{{ $message }}</span>
@enderror 
 </div>
</div>

<div class="form-group">
   <h5>Sub-SubCategory urdu  <span class="text-danger">*</span></h5>
   <div class="controls">
 <input type="text" name="subsubcategory_name_urdu" class="form-control"  value="{{ $subsubcatagorys->subsubcatagory_name_urdu}}">
@error('subsubcategory_name_urdu') 
<span class="text-danger">{{ $message }}</span>
@enderror 
 </div>
</div> 
 <div class="text-xs-right">
  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
                   </div>
               </form>
               </div>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box --> 
       </div>

     </div>
     <!-- /.row -->
   </section>
   <!-- /.content -->

 </div>
{{-- <script type="text/javascript">
 $(document).ready(function() {
   $('select[name="category_id"]').on('change', function(){
       var category_id = $(this).val();
       if(category_id) {
           $.ajax({
               url:"{{ url('/catagory/subcategory/ajax')}}/"+category_id,
               type:"GET",
               dataType:"json",
               success:function(data) {
                  var d =$('select[name="subcatagory_id"]').empty();
                     $.each(data, function(key,value){
                     $('select[name="subcatagory_id"]').append('<option value="'+ value.id +'">' + value.sub_catagory_name_eng+ '</option>');
                          });
               },
           });
       } else {
           alert('danger');
       }
   });
});
</script> --}}

@endsection