@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">
           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand Eng</th>
                              <th>Brand Urdu</th>
                              <th>Brand Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($brands as $brand)

                          <tr>
                              <td>{{ $brand->brand_name_eng }}</td>
                              <td>{{ $brand->brand_name_urdu}}</td>
                          <td>
                              <img src="{{asset($brand->brand_image) }}" style="width: 70px; heigth:50px;">
                          </td>
                             <td>
                                 <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                 <a href="{{ route('brand.delete',$brand->id)}}" class="btn btn-danger" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
                 <h3 class="box-title">Brand  Add</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                         @csrf
                    <div class="form-group">
                    <h5>Brand Name English <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="brand_name_eng"  class="form-control" >
                        @error('brand_name_eng')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      </div>
                      <div class="form-group">
                        <h5>Brand Name Urdu <span class="text-danger"></span></h5>
                        <div class="controls">
                            <input type="text" name="brand_name_urdu"  class="form-control" >
                            @error('brand_name_urdu')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                          </div>
                          <div class="form-group">
                            <h5> Brand Image<span class="text-danger"></span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image"  class="form-control">
                                @error('brand_image')
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
