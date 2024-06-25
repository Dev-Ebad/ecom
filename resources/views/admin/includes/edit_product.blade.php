<form action="{{ route('admin.update_product' , ['id' => $product_data->id]) }}" id="product_update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="email2"> Name </label>
                                <input type="name" name="name" class="form-control"
                                    id="name" placeholder="Enter Name" value="{{isset($product_data->name) && !empty($product_data->name) ? $product_data->name : ''}}" />
                            </div>
                            <span id="name_error" class="text-danger d-none"> This field is required </span>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                           @enderror
                            <div class="form-group">
                                <label for="email"> Description </label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="description"  id="description" placeholder="Leave a comment here"
                                        id="floatingTextarea">{{isset($product_data->description) && !empty($product_data->description) ? $product_data->description : ''}}</textarea>
                                </div>
                            </div>
                            <span id="description_error" class="text-danger d-none"> This field is required </span>

                           @error('description')
                            <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="email"> Category </label>
                                <div class="form-floating">
                                    <select name="category_id" class="form-select"
                                        aria-label="Default select example">
                                        @foreach ($category as $item)
                                            <option selected
                                                value="{{ isset($item->id) && !empty($item->id) ? $item->id : '' }}">
                                                {{ isset($item->cat_name) && !empty($item->cat_name) ? $item->cat_name : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address"> Price </label>
                                <input type="number" name="price" value="{{isset($product_data->price) && !empty($product_data->price) ? $product_data->price : ''}}" class="form-control"
                                    id="price" placeholder="Enter price" />
                            </div>
                            <span id="price" class="text-danger d-none"> This field is required </span>

                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="address"> Discount Price </label>
                                <input type="number" name="discount_price" class="form-control"
                                    id="discount_price" placeholder="Enter price" value="{{isset($product_data->discount_price) && !empty($product_data->discount_price) ? $product_data->discount_price : ''}}" />
                            </div>
                            <span id="discount_price" class="text-danger d-none"> This field is required </span>                                            


                            <div class="form-group">
                                <label for="address"> SKU </label>
                                <input type="text" name="SKU"value="{{isset($product_data->SKU) && !empty($product_data->SKU) ? $product_data->SKU : ''}}" class="form-control"
                                    id="SKU" placeholder="Enter SKU" />
                            </div>
                            <span id="SKU_error" class="text-danger d-none"> This field is required </span>

                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="address"> Stock Quantity </label>
                                <input type="text" name="stock_quantity" class="form-control" value="{{isset($product_data->stock_quantity) && !empty($product_data->stock_quantity) ? $product_data->stock_quantity : ''}}"
                                    id="stock_quantity" placeholder="Enter stock_quantity" />
                            </div>
                            <span id="stock_quantity_error" class="text-danger d-none"> This field is required </span>


                            <div class="form-group">
                                <label for="address"> Weight </label>
                                <input type="text" name="weight" value="{{isset($product_data->weight) && !empty($product_data->weight) ? $product_data->weight : ''}}" class="form-control"
                                    id="weight" placeholder="Enter weight" />
                            </div>
                            <span id="weight_error" class="text-danger d-none"> This field is required </span>                                            

                        </div>
                           <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="address"> Dimensions </label>
                                <input type="text" name="dimensions" class="form-control" value="{{isset($product_data->dimensions) && !empty($product_data->dimensions) ? $product_data->dimensions : ''}}"
                                    id="dimensions" placeholder="Enter dimensions" />
                            </div>
                            <span id="dimension_error" class="text-danger d-none"> This field is required </span>
                          

                            <div class="form-group">
                                <label for="profile">Images</label>
                                <input type="file" id="upload-photo" name="images[]" multiple
                                    class="form-control-file" id="profile" />
                            </div>
                           </div>

                           <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="address"> Attributes </label>
                                <input type="text" name="attributes" class="form-control" value="{{isset($product_data->attributes) && !empty($product_data->attributes) ? $product_data->attributes : ''}}"
                                    id="attributes" placeholder="Enter dimensions" />
                            </div>
                            <span id="attributes_error" class="text-danger d-none"> This field is required </span>


                            <div class="form-group">
                                <label for="address"> Status </label>
                                <input type="text" name="status" class="form-control" value="{{isset($product_data->status) && !empty($product_data->status) ? $product_data->status : ''}}"
                                    id="status" placeholder="Enter dimensions" />
                            </div>
                            <span id="error" class="d-none"> This field is required </span>

                           </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="address"> Featured </label>
                                    <input type="text" name="featured" class="form-control" value="{{isset($product_data->featured) && !empty($product_data->featured) ? $product_data->featured : ''}}"
                                        id="featured" placeholder="Enter dimensions" />
                                </div>
                                <span id="error" class="d-none"> This field is required </span>

                                <div class="form-group">
                                    <label for="address"> Ratings </label>
                                    <input type="number" name="rating" class="form-control" value="{{isset($product_data->ratings) && !empty($product_data->ratings) ? $product_data->ratings : ''}}"
                                        id="rating" placeholder="Enter dimensions" />
                                </div>
                                <span id="error" class="d-none"> This field is required </span>

                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="address"> Reviews </label>
                                    <input type="text" name="reviews" class="form-control" value="{{isset($product_data->reviews) && !empty($product_data->reviews) ? $product_data->reviews : ''}}"
                                        id="reviews" placeholder="Enter reviews" />
                                </div>
                                <span id="error" class="d-none"> This field is required </span>


                                <div class="form-group">
                                    <label for="address"> Tags </label>
                                    <input type="text" name="tags" value="{{isset($product_data->tags) && !empty($product_data->tags) ? $product_data->tags : ''}}" class="form-control"
                                        id="tags" placeholder="Enter tags" />
                                </div>
                                <span id="error" class="d-none"> This field is required </span>
                            </div>
                    </div>
        </div>
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" >Update</button>
</form>