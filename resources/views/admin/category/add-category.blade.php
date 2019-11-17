<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category Description</label>
                        <textarea class="form-control" id="exampleInputPassword1" placeholder="Enter Category Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Image</label>
                        <input type="file" class="form-control-file" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Publication Status</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Published</option>
                            <option>Unpublished</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>