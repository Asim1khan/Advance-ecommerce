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
                 <h3 class="box-title">Brand  Add</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                         @csrf
                           <input type="hidden" name="id" value="{{ $brand->id}}">
                           <input type="hidden" name="old_image" value="{{$brand->brand_image }}">
                    <div class="form-group">
                    <h5>Brand Name English <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="brand_name_eng"  class="form-control" value="{{ $brand->brand_name_eng }}" >
                        @error('brand_name_eng')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      </div>brand_name_urd
                      <div class="form-group">
                        <h5>Brand Name Urdu <span class="text-danger"></span></h5>
                        <div class="controls">
                            <input type="text" name="brand_name_urdu"  class="form-control" value="{{ $brand->brand_name_urdu }}">
                            @error('brand_name_urdu')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                          </div>
                          <div class="form-group">
                            <h5> Brand Image<span class="text-danger"></span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image"  class="form-control" value="{{ $brand->brand_image }}">
                                @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                          </div>

                              <div class="text-xs-right">
                                <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value="Update">
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
