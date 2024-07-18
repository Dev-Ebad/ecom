
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="email2"> Name </label>
                                        <input type="name" name="name" class="form-control"
                                            id="edit_name" placeholder="Enter Name" value="{{isset($user_data->name) && !empty($user_data->name) ? $user_data->name : '' }}" />
                                            <input type="hidden" name="user_id" value="{{isset($user_data->id) && !empty($user_data->id) ? $user_data->id : ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"> Email </label>
                                        <input type="email" class="form-control" id="edit_email"
                                            name="email" placeholder="Enter Email" value="{{isset($user_data->email) && !empty($user_data->email) ? $user_data->email : '' }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="address"> Address </label>
                                        <input type="address" name="address" class="form-control"
                                            id="edit_address" placeholder="Enter address" value="{{isset($user_data->address) && !empty($user_data->address) ? $user_data->address : '' }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label><br />
                                        <div class="d-flex">
                                            @if(isset($user_data->gender) && !empty($user_data->gender) && $user_data->gender == 'male')
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" checked
                                                    name="gender" name="flexRadioDefault" id="edit_male"
                                                    value="male" />
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="gender" name="flexRadioDefault"
                                                    id="edit_female" value="female"  />
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>
                                            @else
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" 
                                                    name="gender" name="flexRadioDefault" id="edit_male"
                                                    value="male" />
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="gender" name="flexRadioDefault"
                                                    id="edit_female" value="female" checked />
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile">Profile</label>
                                        <input type="file" name="edit_profile" class="form-control-file"
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
        <button type="submit" class="btn btn-primary">update</button>
      