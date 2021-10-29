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
                 <h3 class="box-title">Catagory Update</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <form method="post" action="{{ route('catagory.update', $catagory->id) }}" enctype="multipart/form-data">
                         @csrf
                           <input type="hidden" name="id" value="{{ $catagory->id}}">
                    <div class="form-group">
                    <h5>Catagory Name English <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="catagory_name_eng"  class="form-control" value="{{ $catagory->catagory_name_eng }}" >
                        @error('catagory_name_eng')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      </div>catagory_name_urd
                      <div class="form-group">
                        <h5>Catagory Name Urdu <span class="text-danger"></span></h5>
                        <div class="controls">
                            <input type="text" name="catagory_name_urdu"  class="form-control" value="{{ $catagory->catagory_name_urdu }}">
                            @error('catagory_name_urdu')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                          </div>
                          <div class="form-group">
                            <h5> Catagory Icon<span class="text-danger"></span></h5>
                            <div class="controls">
                                <input type="text" name="catagory_icon"  class="form-control" value="{{ $catagory->catagory_icon }}">
                                @error('catagory_icon')
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
