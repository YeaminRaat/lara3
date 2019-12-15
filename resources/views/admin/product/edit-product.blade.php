<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
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
            <form id="updateProductForm" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_status">Category</label>
                        <select class="form-control" name="cat_id" id="e_product_cat">
                            <option>Select Category</option>
                            @foreach($category as $categories)
                                <option value="{{$categories->id}}">{{$categories->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_status">Brand</label>
                        <select class="form-control" name="brand_id" id="e_product_brand">
                            <option>Select Brand</option>
                            @foreach($brand as $brands)
                                <option value="{{$brands->id}}">{{$brands->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="e_product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="e_product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="e_short_desc">Short Description</label>
                        <textarea class="form-control" name="short_desc" id="e_short_desc" placeholder="Enter Product Short Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="e_long_desc">Long Description</label>
                        <textarea class="form-control" name="long_desc" id="e_long_desc" placeholder="Enter Product Long Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="e_discount_price">Discount Price</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">৳</div>
                            </div>
                            <input type="text" class="form-control" name="discount_price" id="e_discount_price" placeholder="Discount price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="e_product_price">Product Price</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">৳</div>
                            </div>
                            <input type="text" class="form-control" name="product_price" id="e_product_price" placeholder="Product price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="e_quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="e_quantity" placeholder="Enter Total quantity">
                    </div>
                    <div class="form-group">
                        <label for="product_size">Size</label>
                        <select class="form-control" name="size" id="e_product_size">
                            <option>Select size</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                            <option value="xxl">XXL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filePhoto1">Product Image</label>
                        <input type="file" name="product_image" class="form-control-file" id="filePhoto1" onchange="preview_image(event)">
                        <img src="" id="previewHolder" width="150px">
                    </div>
                    <div class="form-group">
                        <label for="filePhoto5">Product Image</label>
                        <input type="file" name="gallery_image" class="form-control-file" id="filePhoto5" onchange="preview_image(event)" multiple>
                    </div>
                    <div class="form-group">
                        <label for="product_status">Publication Status</label>
                        <select class="form-control" name="status" id="e_product_status">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>