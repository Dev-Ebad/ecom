<!-- Button trigger modal -->


<!-- Add User Modal start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">User Registration Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.create_user') }}" method="POST" id="addUserForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="email2"> Name </label>
                                                <input type="name" name="name" class="form-control" id="name"
                                                    placeholder="Enter Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="email"> Email </label>
                                                <input type="email" class="form-control" id="useremail" name="email"
                                                    placeholder="Enter Email" />
                                                    <span class="emailerror text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="address"> Address </label>
                                                <input type="address" name="address" class="form-control" id="address"
                                                    placeholder="Enter address" />
                                            </div>
                                            <div class="form-group">
                                                <label for="address"> Role </label>
                                                <select class="form-control" name="role" id="role">
                                                    <option value="user">User</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label><br />
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            name="flexRadioDefault" id="gender" value="male" />
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            name="flexRadioDefault" id="gender" value="female" />
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="profile">Profile</label>
                                                <input type="file" name="profile" class="form-control-file"
                                                    id="profile" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="Check_Email()" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Add User Modal End --}}


<!-- Add product Modal start -->
<div class="modal fade w-100 modal-lg" id="addproduct"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Product </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body w-100">
                <form action="{{ route('admin.create_product') }}" id="product_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="email2"> Name </label>
                                                <input type="name" name="name" class="form-control"
                                                    id="name" placeholder="Enter Name" value="{{old('name')}}" />
                                            </div>
                                            <span id="name_error" class="text-danger d-none"> This field is required </span>
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                           @enderror
                                            <div class="form-group">
                                                <label for="email"> Description </label>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="description" value="{{old('description')}}" id="description" placeholder="Leave a comment here"
                                                        id="floatingTextarea"></textarea>
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
                                                        <option disabled selected>Select Category</option>
                                                        @foreach ($category as $item)
                                                            <option
                                                                value="{{ isset($item->id) && !empty($item->id) ? $item->id : '' }}">
                                                                {{ isset($item->cat_name) && !empty($item->cat_name) ? $item->cat_name : '' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="address"> Price </label>
                                                <input type="number" name="price" class="form-control"
                                                    id="price" placeholder="Enter price" />
                                            </div>
                                            <span id="price" class="text-danger d-none"> This field is required </span>

                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="address"> Discount Price </label>
                                                <input type="number" name="discount_price" class="form-control"
                                                    id="discount_price" placeholder="Enter price" />
                                            </div>
                                            <span id="discount_price" class="text-danger d-none"> This field is required </span>                                            

    
                                            <div class="form-group">
                                                <label for="address"> SKU </label>
                                                <input type="text" name="SKU" class="form-control"
                                                    id="SKU" placeholder="Enter SKU" />
                                            </div>
                                            <span id="SKU_error" class="text-danger d-none"> This field is required </span>

                                        </div>

                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="address"> Stock Quantity </label>
                                                <input type="text" name="stock_quantity" class="form-control"
                                                    id="stock_quantity" placeholder="Enter stock_quantity" />
                                            </div>
                                            <span id="stock_quantity_error" class="text-danger d-none"> This field is required </span>


                                            <div class="form-group">
                                                <label for="address"> Weight </label>
                                                <input type="text" name="weight" class="form-control"
                                                    id="weight" placeholder="Enter weight" />
                                            </div>
                                            <span id="weight_error" class="text-danger d-none"> This field is required </span>                                            

                                        </div>
                                           <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="address"> Dimensions </label>
                                                <input type="text" name="dimensions" class="form-control"
                                                    id="dimensions" placeholder="Enter dimensions" />
                                            </div>
                                            <span id="dimension_error" class="text-danger d-none"> This field is required </span>

                                            <div class="form-group">
                                                <label for="profile">Images</label>
                                                <input type="file" name="images[]" multiple
                                                    class="form-control-file" id="profile" />
                                            </div>

                                           </div>

                                           <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="address"> Attributes </label>
                                                <input type="text" name="attributes" class="form-control"
                                                    id="attributes" placeholder="Enter dimensions" />
                                            </div>
                                            <span id="attributes_error" class="text-danger d-none"> This field is required </span>


                                            <div class="form-group">
                                                <label for="address"> Status </label>
                                                <input type="text" name="status" class="form-control"
                                                    id="status" placeholder="Enter dimensions" />
                                            </div>
                                            <span id="error" class="d-none"> This field is required </span>

                                           </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"> Featured </label>
                                                    <input type="text" name="featured" class="form-control"
                                                        id="featured" placeholder="Enter dimensions" />
                                                </div>
                                                <span id="error" class="d-none"> This field is required </span>

                                                <div class="form-group">
                                                    <label for="address"> Ratings </label>
                                                    <input type="number" name="rating" class="form-control"
                                                        id="rating" placeholder="Enter dimensions" />
                                                </div>
                                                <span id="error" class="d-none"> This field is required </span>

                                            </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"> Reviews </label>
                                                    <input type="text" name="reviews" class="form-control"
                                                        id="reviews" placeholder="Enter reviews" />
                                                </div>
                                                <span id="error" class="d-none"> This field is required </span>

    
                                                <div class="form-group">
                                                    <label for="address"> Tags </label>
                                                    <input type="text" name="tags" class="form-control"
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
                <button type="submit" class="btn btn-primary" >Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Add product Modal End --}}


{{-- Edit product start --}}

<div class="modal fade w-100 modal-lg" id="edit_product"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Product </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body w-100" id="edit_product_appnd">
              
            </div>
        </div>
    </div>
</div>

{{-- Edit product End --}}

<!-- Add category Modal start -->
<div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.create_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="email2"> Name </label>
                                                <input type="text" name="cat_name" class="form-control"
                                                    id="name" placeholder="Enter Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="email"> Description </label>
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="cat_description" id="description" placeholder="Enter Description"
                                                        id="floatingTextarea"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Add category Modal End --}}

{{-- Edit user modal start --}}

<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.update_user') }}" method="POST" enctype="multipart/form-data" id="appnd_edit_user">
                    @csrf
                    
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Edit user modal end --}}


{{-- User Delete Modal Start --}}

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.delete_user') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="user_id">
                    Are you sure you want to Delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
</div>

{{-- User Delete Modal End --}}

{{-- Delete Product Modal start --}}


<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.delete_product') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="prod_id" name="product_id">
                    Are you sure you want to Delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
</div>
{{-- Delete Product Modal end --}}
