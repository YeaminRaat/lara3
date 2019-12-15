@php($sl = 1)
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $sl++ }}</td>
                                            <td id="t_cat_name" data-id1="{{ $category->id }}" ondblclick="this.contentEditable=true" onblur="this.contentEditable=false">{{ $category->cat_name }}</td>
                                            <td id="t_cat_desc" data-id2="{{ $category->id }}" contenteditable>{{ $category->cat_desc }}</td>
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
                                        {{--Edit category modal here--}}
        @include('admin.category.edit-category')
                                        @endforeach