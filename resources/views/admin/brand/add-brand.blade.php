<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add brand</h5>
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
            <form id="addBrandForm" method="post" action="{{ route('admin.brand') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" id="brand_name" placeholder="Enter brand Name" required>
                    </div>
                    <div class="form-group">
                        <label for="brand_desc">Brand Description</label>
                        <textarea class="form-control" name="brand_desc" id="brand_desc" placeholder="Enter brand Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="filePhoto">Brand Image</label>
                        <input type="file" name="brand_image" class="form-control-file" id="filePhoto" onchange="preview_image(event)">
                        <img src="" id="previewHolder" width="150px">
                    </div>
                    <div class="form-group">
                        <label for="brand_status">Publibrandion Status</label>
                        <select class="form-control" name="brand_status" id="brand_status">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>
