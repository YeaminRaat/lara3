@extends('admin.master')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            @if(session('message'))
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            @endif
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="h4">Product List</span>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addProductModal">
                                <i class="fa fa-plus"><b> Add New</b></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="productDatatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php($sl = 1)
                                    @foreach($product as $products)
                                    <tr>
                                        <td>{{$sl++}}</td>
                                        <td>{{$products->cat_name}}</td>
                                        <td>{{$products->brand_name}}</td>
                                        <td>{{$products->product_name}}</td>
                                        <td>৳ {{$products->product_price}}</td>
                                        <td>
                                            <img src="{{asset($products->image)}}" height="100px" alt="image">
                                        </td>
                                        <td>{{$products->status}}</td>
                                        <td>
                                            <a href="#viewProductModal" class="btn btn-info" data-toggle="modal">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#editProductModal" id="{{$products->id}}" class="edit btn btn-success" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form action="{{route('product.destroy',$products->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    {{--Add Product modal here--}}
    @include('admin.product.add-product')
    {{--Edit Product modal here--}}
    @include('admin.product.edit-product')
    {{--View Product modal here--}}
    @include('admin.product.view-product')

@endsection
@push('script')

    <script>
        $(document).ready( function () {
            //for datatable
            $('#productDatatable').DataTable();

            //show data for edit modal
            $(document).on('click', '.edit', function(e){
                $('#editProductModal').modal('show');
                e.preventDefault();
                var id = $(this).attr('id');
                $.ajax({
                    url: "{{url('admin/product')}}/"+id,
                    method: "GET",
                    success: function(data){
                        console.log(data);
                            
                            $('#e_product_cat').val(data.cat_id);
                            $('#e_product_brand').val(data.brand_id);
                            $('#e_product_name').val(data.product_name);
                            $('#e_short_desc').val(data.short_desc);
                            $('#e_long_desc').val(data.long_desc);
                            $('#e_discount_price').val(data.discount_price);
                            $('#e_product_price').val(data.product_price);
                            $('#e_quantity').val(data.quantity);
                            $('#e_product_size').val(data.size);
                            $('#e_product_status').val(data.status);
                    }
                })
            });
        });
    </script>

@endpush