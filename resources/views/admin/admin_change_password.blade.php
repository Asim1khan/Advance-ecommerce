@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content">
    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Admin Profile Edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form novalidate="" action="{{ route('admin.update.password') }}" method="post" >
                  @csrf
                <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <h5>Current Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="oldpassword" id="current_password" class="form-control" required="">
                                    <div class="help-block"></div>
                                  </div>
                            </div>

                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" id="password" class="form-control" required="">
                                    <div class="help-block"></div>
                                  </div>
                            </div>

                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="">
                                    <div class="help-block"></div>
                                  </div>
                            </div>

                         </div>



                   </div>

                   <div class="text-xs-right">
                      <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value="Update">
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

@endsection
