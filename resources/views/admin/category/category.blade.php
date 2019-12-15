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
                                <span class="h4">Category List</span>
                                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addCatModal">
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
                                    <tbody id="tableData">
                                        @php($sl = 1)
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $sl++ }}</td>
                                            <td id="t_cat_name" >{{ $category->cat_name }}</td>
                                            <td>{{ $category->cat_desc }}</td>
                                            <td>
                                                @if($category->cat_image == '')
                                                No Image
                                                @else
                                                <img src="{{ asset($category->cat_image) }}" height="50px" alt="category image">
                                                @endif
                                            </td>
                                            <td>
                                                @if($category->cat_status == 1)
                                                <a id="{{$category->id}}" href="" class="btn btn-primary unpublish" data-toggle="tooltip" title="Published">
                                                    <i class="fa fa-arrow-up"></i>
                                                </a>
                                                @else
                                                <a id="{{$category->id}}" href="" class="btn btn-warning publish" data-toggle="tooltip" title="Unpublished">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a id="{{$category->id}}" href="#editCatModal" class="btn btn-success edit" data-toggle="modal">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a id="{{$category->id}}" href="" class="btn btn-danger delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
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
        //for datatable
        $('#category').DataTable();

        //load table via ajax
        function loadDataTable(){
            $.ajax({
                url: "{{ route('admin.category.getTableData') }}",
                success: function(data){
                    $('#tableData').html(data);
                }
            })
        };
        loadDataTable();
        //add new category data
        $('#addCategoryForm').on('submit', function(e){
            //var table = $('#category').DataTable();
            e.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "POST",
                url: "{{ route('admin.category') }}",
                data: new FormData(this),
                /*data: $('addCategoryForm').serialize(),*/
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    /*$('#addCatModal').modal('hide');
                    console.log(data);*/
                    /*table.row.add( [
                        '1',
                        data.cat_name,
                        data.cat_desc,
                        '<img src=" '+data.cat_image+' " height="50px" alt="category image">',
                        '.5',
                        'new'
                    ] ).draw(false);*/
                    /*loadDataTable();*/
                    /*$('#tableData2').append(
                        '<tr role="row"><td>'+data.cat_name+'</td><td>'+data.cat_name+'</td></tr>'
                        );*/
                    if (data == "done") {
                        $('#addCatModal').modal('hide');
                        $('#addCategoryForm')[0].reset();
                        loadDataTable();
                        Swal.fire({
                              title: 'New Category Added',
                              icon: 'success',
                              timer: 2000
                            })
                    }
                },
            });
        });
    //category publish
    $(document).on('click', '.publish', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: "{{url('admin/category/publish')}}/"+id,
            method: "GET",
            beforeSend: function(){
                $('.loader').show();
            },
            complete: function(){
                $('.loader').hide();
            },
            success: function(data){
                    if (data == "done") {
                        loadDataTable();
                    };
            }
        })
    });
    //category unpublish
    $(document).on('click', '.unpublish', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: "{{url('admin/category/unpublish')}}/"+id,
            method: "GET",
            beforeSend: function(){
                $('.loader').show();
                
            },
            complete: function(){
                $('.loader').hide();
            },
            success: function(data){
                    if (data == "done") {
                        loadDataTable();
                    };
            }
        })
    });
    //show data for edit modal
    $(document).on('click', '.edit', function(e){
        $('#editCatModal').modal('show');
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: "{{url('admin/category/edit')}}/"+id,
            method: "GET",
            success: function(data){
                    $('#edit_id').val(data.id);
                    $('#edit_cat_name').val(data.cat_name);
                    $('#edit_cat_desc').val(data.cat_desc);
                    $('#previewHolder2').attr('src', "{{asset('')}}"+data.cat_image);
            }
        })
    });
    //update category
    $('#editCategoryForm').on('submit', function(e){
            //var table = $('#category').DataTable();
            e.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "POST",
                url: "{{ route('admin.category.update') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    if (data == "done") {
                        $('#editCatModal').modal('hide');
                        loadDataTable();
                        Swal.fire({
                              title: 'Category Updated',
                              icon: 'success',
                              timer: 2000
                            })
                    }
                },
            });
        });
    //delete category
    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.value) {
                    $.ajax({
                        url: "{{url('admin/category/delete')}}/"+id,
                        method: "GET",
                        success: function(data){
                            if (data == "done") {
                                loadDataTable();
                            }
                        }
                    })
                    Swal.fire(
                      'Deleted!',
                      'Category has been deleted.',
                      'success'
                    )
                  }
                })
        
    });
    //inline edit category name
    $(document).on('blur', '#t_cat_name', function(){
        var id = $(this).data("id1");
        var text = $(this).text();
        inlineEdit(id, text, "cat_name");
    });
    //inline edit category description
    $(document).on('blur', '#t_cat_desc', function(){
        var id = $(this).data("id2");
        var text = $(this).text();
        inlineEdit(id, text, "cat_desc");
    });
    //inline edit ajax request
    function inlineEdit(id, text, column_name){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: "POST",
            url: "{{ route('admin.category.inlineEdit') }}",
            data:{
                id: id,
                text: text,
                column_name: column_name
            },
            success: function(data){
                if (data == "done") {
                    alert("Updated");
                }
            }
        });
    };

    //show modal after error occured
    @if (count($errors) > 0)
        $('#addCatModal').modal('show');
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
    } );
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
    {{--Add category modal here--}}
    @include('admin.category.add-category')

    {{--Edit category modal here--}}
    @include('admin.category.edit-category')
        
@endsection