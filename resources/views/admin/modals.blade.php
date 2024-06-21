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
            <form action="{{route('admin.create_user')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email2"> Name </label>
                                <input
                                type="name"
                                name="name"
                                class="form-control"
                                id="name"
                                placeholder="Enter Name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="email"> Email </label>
                                <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter Email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="address"> Address </label>
                                <input
                                type="address"
                                name="address"
                                class="form-control"
                                id="address"
                                placeholder="Enter address"
                                />
                            </div>
                            <div class="form-group">
                                <label>Gender</label><br />
                                <div class="d-flex">
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    name="flexRadioDefault"
                                    id="gender"
                                    value="male"
                                    />
                                    <label
                                    class="form-check-label"
                                    for="flexRadioDefault1"
                                    >
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    name="flexRadioDefault"
                                    id="gender"
                                    value="female"
                                    />
                                    <label
                                    class="form-check-label"
                                    for="female"
                                    >
                                    Female
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile"
                                >Profile</label
                                >
                                <input
                                type="file"
                                name="profile"
                                class="form-control-file"
                                id="profile"
                                />
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

  {{-- Add User Modal End --}}


  <!-- Add User Modal start -->
  <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">User Registration Form</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.create_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email2"> Name </label>
                                <input
                                type="name"
                                name="name"
                                class="form-control"
                                id="name"
                                placeholder="Enter Name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="email"> Description </label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" id="description" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="address"> Address </label>
                                <input
                                type="address"
                                name="address"
                                class="form-control"
                                id="address"
                                placeholder="Enter address"
                                />
                            </div>
                            <div class="form-group">
                                <label>Gender</label><br />
                                <div class="d-flex">
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    name="flexRadioDefault"
                                    id="gender"
                                    value="male"
                                    />
                                    <label
                                    class="form-check-label"
                                    for="flexRadioDefault1"
                                    >
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    name="flexRadioDefault"
                                    id="gender"
                                    value="female"
                                    />
                                    <label
                                    class="form-check-label"
                                    for="female"
                                    >
                                    Female
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile"
                                >Profile</label
                                >
                                <input
                                type="file"
                                name="profile"
                                class="form-control-file"
                                id="profile"
                                />
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

  {{-- Add User Modal End --}}

  {{-- Edit user modal start --}}

  <div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.update_user')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email2"> Name </label>
                                <input
                                type="name"
                                name="name"
                                class="form-control"
                                id="edit_name"
                                placeholder="Enter Name"
                                />
                                <input type="hidden" name="user_id" id="user_id">
                            </div>
                            <div class="form-group">
                                <label for="email"> Email </label>
                                <input
                                type="email"
                                class="form-control"
                                id="edit_email"
                                name="email"
                                placeholder="Enter Email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="address"> Address </label>
                                <input
                                type="address"
                                name="address"
                                class="form-control"
                                id="edit_address"
                                placeholder="Enter address"
                                />
                            </div>
                            <div class="form-group">
                                <label>Gender</label><br />
                                <div class="d-flex">
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="edit_gender"
                                    name="flexRadioDefault"
                                    id="edit_male"
                                    value="male"
                                    />
                                    <label
                                    class="form-check-label"
                                    for="flexRadioDefault1"
                                    >
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="edit_gender"
                                    name="flexRadioDefault"
                                    id="edit_female"
                                    value="female"
                                    />
                                    <label
                                    class="form-check-label"
                                    for="female"
                                    >
                                    Female
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile"
                                >Profile</label
                                >
                                <input
                                type="file"
                                name="edit_profile"
                                class="form-control-file"
                                id="profile"
                                />
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
        <button type="submit" class="btn btn-primary">update</button>
    </form> 
    </div>
      </div>
    </div>
  </div>
  {{-- Edit user modal end --}}


  {{-- User Delete Modal Start --}}
  
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.delete_user')}}" method="POST">
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