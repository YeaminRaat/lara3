<!-- @push('style')
<style>
    .hideMyid{
display:none;
}

</style>
@endpush -->
@extends('admin.master')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Brand Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Brand</li>
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
                            <span class="h4">Brand List</span>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addBrandModal">
                                <i class="fa fa-plus"><b> Add New</b></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="brandDatatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sl No.</th>
                                    <th>Brand Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl = 1)
                                @foreach($brands as $brand)
                                    <tr>
                                        <td class="">{{ $brand->id }}</td>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->brand_desc }}</td>
                                        <td>
                                            @if($brand->brand_image == '')
                                                No Image
                                            @else
                                                <img src="{{ asset($brand->brand_image) }}" height="50px" alt="brand image">
                                            @endif
                                        </td>
                                        <td>
                                            @if($brand->brand_status == 1)
                                                <a href="{{route('brand.unpublish',$brand->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Published">
                                                    <i class="fa fa-arrow-up"></i>
                                                </a>
                                            @else
                                                <a href="{{route('brand.publish',$brand->id)}}" class="btn btn-warning" data-toggle="tooltip" title="Unpublished">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <a href="#editBrandModal" class="edit btn btn-success" data-toggle="modal" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <a href="{{route('admin.brand.delete', $brand->id)}}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Sl No.</th>
                                    <th>Brand Name</th>
                                    <th>Description</th>
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
    @push('script')
        <script>
            //for datatable
            $(document).ready( function () {
                var table = $('#brandDatatable').DataTable();
                table.column(0).visible(false);

                //start edit record
                table.on('click', '.edit', function(){
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }
                    var data = table.row($tr).data();
                    console.log(data);
                    $('#brand_name2').val(data[2]);
                    $('#brand_desc2').val(data[3]);
                    $('#photo2').append(data[4]);

                    $('#editform').attr('action', 'brand/update/'+data[0])
                });
                
            } );
            //show modal after error occured
            @if (count($errors) > 0)
            $('#addBrandModal').modal('show');
            @endif
            //uploaded image preview
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewHolder').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#filePhoto").change(function() {
                readURL(this);
            });
            //popover
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
            //tooltip
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    @endpush
    {{--Add brand modal here--}}
    @include('admin.brand.add-brand')
    {{--Edit brand modal here--}}
    @include('admin.brand.edit-brand')

@endsection