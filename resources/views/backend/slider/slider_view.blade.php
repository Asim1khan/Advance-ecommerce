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
                <h3 class="box-title">Slider</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Slider Image</th>
                              <th>Title </th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($sliders as $slider)

                          <tr>
                                  <td><img src="{{(asset( $slider->slider_img )) }}" style="width: 60px; height:40px;"></td>

                              <td> {{ $slider->title }}</td>
                              <td>{{ $slider->description }}</td>
                              <td>
                                @if ($slider->status==1)
                                     <a href="{{ route('slider-incative',$slider->id) }}"><span class="badge badge-pill badge-success">Active</span></a>
                                     @else
                                  <a href="{{ route('slider-active',$slider->id ) }}"> <span class="badge badge-pill badge-danger"> In Active</span></a>
                                @endif
                              </td>
                                 <td width="30%">
                                     <a href="{{ route('slider.edit',$slider->id)}}" class="btn btn-info btn-sm" value="Edit"><i class="fa fa-pencil"> </i></a>
                                     <a href="{{ route('slider.delete',$slider->id) }}" class="btn btn-danger btn-sm"   id="delete" value="delete"><i class="fa fa-trash"></i></a>
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
                 <h3 class="box-title">Slider Add</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                         @csrf
                    <div class="form-group">
                    <h5>Title <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="title"  class="form-control" >
                   
                    </div>
                      </div>
                      <div class="form-group">
                        <h5>Description <span class="text-danger"></span></h5>
                        <div class="controls">
                            <input type="text" name="description"  class="form-control" >
                        
                        </div>
                          </div>
                          <div class="form-group">
                            <h5> Slider Image<span class="text-danger"></span></h5>
                            <div class="controls">
                                <input type="file" name="slider_img"  class="form-control">
                             @error('slider_img')
                                   <span class="text-danger">{{ $message}}</span>
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
