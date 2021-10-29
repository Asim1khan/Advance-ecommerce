@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-8">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Sub->sub Catagory List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>  Catagory</th>
                            <th> SubCatagory Name</th>
                            <th> Sub-SubCatagory eng</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subsubcatagory as $subcatagory)

                        <tr>
                            <td>{{ $subcatagory->catagory->catagory_name_eng }}</td>
                          <td>{{ $subcatagory->subcatagory->sub_catagory_name_eng }}</td>
                            <td>{{ $subcatagory->subsubcatagory_name_eng }}</td>
            
                           <td>
                               <a href="{{ route('subsubcatagory.edit',$subcatagory->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                               <a href="{{ route('subsubcatagory.delete',$subcatagory->id)}}" class="btn btn-danger btn-sm" id="delete" title="delete"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach

                    </tbody>

                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <div class="col-4">
          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Add  Sub->sub Catagory  Add</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 
 <form method="post" action="{{ route('subsubcatagory.store') }}" >
    @csrf


<div class="form-group">
<h5>Category Select <span class="text-danger">*</span></h5>
<div class="controls">
   <select name="category_id" class="form-control"  >
       <option value="" selected="" disabled="">Select Category</option>
       @foreach($catagorys as $category)
       <option value="{{ $category->id }}">{{ $category->catagory_name_eng }}</option>	
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
            </select>
            @error('subcatagory_id') 
         <span class="text-danger">{{ $message }}</span>
         @enderror 
         </div>
             </div>
<div class="form-group">
   <h5>Sub-SubCategory English <span class="text-danger">*</span></h5>
   <div class="controls">
<input type="text" name="subsubcategory_name_eng" class="form-control" >
@error('subsubcategory_name_en') 
<span class="text-danger">{{ $message }}</span>
@enderror 
 </div>
</div>
<div class="form-group">
   <h5>Sub-SubCategory Hindi  <span class="text-danger">*</span></h5>
   <div class="controls">
<input type="text" name="subsubcategory_name_urdu" class="form-control" >
@error('subsubcategory_name_hin') 
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
</script>

@endsection