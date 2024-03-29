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
              <h3 class="box-title">Catagory List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Catagory Icon</th>
                            <th>Catagory Eng</th>
                            <th>Catagory Urdu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catagorys as $catagory)

                        <tr>
                            <td><span> <i class="{{ $catagory->catagory_icon }}"></i></span></td>
                            <td>{{ $catagory->catagory_name_eng }}</td>
                            <td>{{ $catagory->catagory_name_urdu}}</td>
                  
                           <td>
                               <a href="{{ route('catagory.edit',$catagory->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                               <a href="{{ route('catagory.delete',$catagory->id)}}" class="btn btn-danger " id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
               <h3 class="box-title">Catagory  Add</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <form method="post" action="{{ route('catagory.store') }}">
                       @csrf
                  <div class="form-group">
                  <h5>Catagory Name English <span class="text-danger"></span></h5>
                  <div class="controls">
                      <input type="text" name="catagory_name_eng"  class="form-control" >
                      @error('catagory_name_eng')
                       <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                    </div>
                    <div class="form-group">
                      <h5>Catagory Name Urdu <span class="text-danger"></span></h5>
                      <div class="controls">
                          <input type="text" name="catagory_name_urdu"  class="form-control" >
                          @error('catagory_name_urdu')
                          <span class="text-danger">{{ $message }}</span>
                         @enderror
                      </div>
                        </div>
                        <div class="form-group">
                          <h5> Catagory Icon<span class="text-danger"></span></h5>
                          <div class="controls">
                              <input type="text" name="catagory_icon"  class="form-control">
                              @error('catagory_icon')
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