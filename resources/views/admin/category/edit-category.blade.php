<div class="modal fade" id="editCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form id="editCategoryForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" name="cat_name" class="form-control" id="edit_cat_name" placeholder="Enter Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="cat_desc">Category Description</label>
                        <textarea class="form-control" name="cat_desc" id="edit_cat_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="filePhoto">Category Image</label>
                        <input type="file" name="cat_image" class="form-control-file" id="filePhoto2">
                        <img src="" id="previewHolder2" width="150px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
