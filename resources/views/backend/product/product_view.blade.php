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
              <h3 class="box-title">Catagory List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name Eng</th>
                            <th>Product name Urdu</th>
                            <th>Prodtuct Price</th>
                            <th>Quantity</th>
                            <th>Discount Price</th>
                            <th> Product Stauus</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)

                        <tr>
                            <td><img src="{{(asset($product->product_thambnail)) }}" style="width: 60px; height:40px;"></td>
                            <td>{{ $product->product_name_eng }}</td>
                            <td>{{ $product->product_name_urdu}}</td>
                            <td>{{ $product->selling_price }} $</td>
                            <td>{{ $product->product_qty}} pic</td>
                            <td> 
                                @if  ($product->discount_price==Null)
                                <span class="badge badge-pill danger">No Discount</span>
                                    @else
                                    @php
                                        $amount=$product->selling_price-$product->discount_price;
                                         $discount=($amount/$product->selling_price)*100;
                                    @endphp
                                       <span class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                                @endif
                            </td>
                          <td>
                              @if ($product->status==1)
                                <span class="badge badge-pill badge-success">Active</span>
                              @else
                              <span class="badge badge-pill badge-danger">In Active</span>

                              @endif
                          </td>
                  
                           <td width="30%">
                               <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                               <a href="{{ route('product.delete',$product->id)}}" class="btn btn-danger btn-sm" id="delete" title="delete"><i class="fa fa-trash"></i></a>
                               @if ($product->status==1)
                               <a href="{{ route('product.inactive',$product->id) }}" class="btn btn-success btn-sm" title="In Active Now"><i class="fa fa-arrow-down"></i></a>
                             @else
                             <a href="{{ route('product.active',$product->id) }}" class="btn btn-danger btn-sm"  title="Active Now"><i class="fa fa-arrow-up"></i></a>

                             @endif
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
     
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>

@endsection