@extends('admin.master')

@section('body')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h4">Category List</span>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"><b> Add New</b></i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="category" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($sl = 1)
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $category->cat_name }}</td>
                                <td>{{ $category->cat_desc }}</td>
                                <td><img src="{{ asset($category->cat_image) }}" height="50px" alt="category image"></td>
                                <td>{{ $category->cat_status == 1? 'Published': 'Unpublished' }}</td>
                                <td>Edit | Delete</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sl No.</th>
                                <th>Category Name</th>
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
        $(document).ready( function () {
            $('#category').DataTable();
        } );

        /*$('#addform').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                method: "post",
                url: "{{ route('admin.category') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response){
                    console.log(response)
                    $('#exampleModal').modal('hide')
                    alert(response.message)
                    /*window.location.reload();*/
                },
            });
        });*/
    </script>
@endpush

{{--Add category modal here--}}
@include('admin.category.add-category')

@endsection
