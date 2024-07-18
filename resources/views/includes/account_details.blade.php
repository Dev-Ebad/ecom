<div class="card mb-4">
    <div class="card-header">Account Details</div>
    <div class="card-body">
        <form action="{{route('user.edit_user' , ['id' => $user_data->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @php
                $fullName = explode(" " , $user_data->name);
                // print_r($fullName); 
                $f_name = $fullName[0];
                $l_name = $fullName[1];
            @endphp
            <!-- Form Row-->
            <div class="row gx-3 mb-3">
                <!-- Form Group (first name)-->
                <div class="col-md-6">
                    <label class="small mb-1" for="inputFirstName">First name</label>
                    <input class="form-control" name="f_name" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{isset($f_name) && $f_name ? $f_name : '' }}">
                </div>
                <!-- Form Group (last name)-->
                <div class="col-md-6">
                    <label class="small mb-1" for="inputLastName">Last name</label>
                    <input class="form-control" name="l_name" id="inputLastName" type="text" placeholder="Enter your last name" value="{{isset($l_name) && $l_name ? $l_name : '' }}">
                </div>
            </div>
            <!-- Form Row -->
            <div class="row gx-3 mb-3">
                <!-- Form Group (location)-->
                <div class="col-md-6">
                    <label class="small mb-1" for="inputLocation">Address</label>
                    <input class="form-control" name="address" id="inputLocation" type="text" placeholder="Enter your location" value="{{isset($user_data->address) && !empty($user_data->address) ? $user_data->address : ''}}">
                </div>
                <div class="col-md-6">
                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                    <input class="form-control" name="email" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{isset($user_data->email) && !empty($user_data->email) ? $user_data->email : ''}}">
                </div>
            </div>
            <!-- Form Group (email address)-->
            <!-- Form Row-->
            <div class="row gx-3 mb-3">
                <!-- Form Group (phone number)-->
            <input type="file" name="profile" class="form-control">
                
            
            </div>
            <!-- Save changes button-->
            <button class="btn btn-primary" type="submit">Save changes</button>
        </form>
    </div>
</div>