@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         
          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title"> Sub Catagory  Edit</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <form method="post" action=" {{ route('subcatagory.update',$subcatagory->id) }} ">
                       @csrf
                       <input type="hidden"name="id"  value="{{ $subcatagory->id}}">
                <div class="form-group validate">
          <h5>Catagory <span class="text-danger">*</span></h5>
          <div class="controls">
            <select name="catagory_id" selected="disabled"  class="form-control" >
           @foreach ($catagorys as $catagorys)
           <option value=" {{ $catagorys->id}}" {{ $catagorys->id==$subcatagory->catagory_id ? 'selected':''  }}>{{ $catagorys->catagory_name_eng }} </option>

           @endforeach
           @error('catagory_id')
           <span class="text-danger">{{ $message }}</span>
          @enderror
            </select>
          </div>
        </div>

                  <div class="form-group">
                  <h5>Catagory Name English <span class="text-danger"></span></h5>
                  <div class="controls">
                      <input type="text" name="sub_catagory_name_eng"  class="form-control" value="{{ $subcatagory->sub_catagory_name_eng }}" >
                      @error('sub_catagory_name_eng')
                       <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                    </div>
                    <div class="form-group">
                      <h5>Sub Catagory Name Urdu <span class="text-danger"></span></h5>
                      <div class="controls">
                          <input type="text" name="sub_catagory_name_urdu"  class="form-control" value="{{ $subcatagory->sub_catagory_name_urdu}}" >
                          @error('sub_catagory_name_urdu')
                          <span class="text-danger">{{ $message }}</span>
                         @enderror
                      </div>
                        </div>
                            <div class="text-xs-right">
                              <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value="Submit">
                         </div>
                          </form>

             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->


           <!-- /.box -->
         </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>

@endsection