<div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit brand</h5>
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
            <form id="editform" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name2">Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" id="brand_name2" required>
                    </div>
                    <div class="form-group">
                        <label for="brand_desc">Brand Description</label>
                        <textarea class="form-control" name="brand_desc" id="brand_desc2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="filePhoto">Brand Image</label>
                        <input type="file" name="brand_image" class="form-control-file" id="filePhoto2">
                        <span id="photo2"></span>
                        <!-- <img src="" id="previewHolder" width="150px"> -->
                    </div>
                    <div class="form-group">
                        <label for="brand_status">Publication Status</label>
                        <select class="form-control" name="brand_status" id="brand_status2">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>

