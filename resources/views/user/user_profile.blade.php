@include('user.header')



		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>About</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-about">
					{{-- user profile code start --}}
                    <div class="container-xl px-4 mt-4">
                        <!-- Account page navigation-->
                        <nav class="nav nav-borders">
                            <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
                            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
                            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
                            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
                        </nav>
                        <hr class="mt-0 mb-4">
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body text-center">
                                        <img class="img-account-profile rounded-circle mb-2" src="{{url('storage/app/uploads' . Auth::user()->profile)}}" alt="">
                                        <button class="btn btn-outline-success" type="button">Upload new image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form>

                                            @php
                                                $fullName = explode(" " , $user_data->name);
                                                $f_name = $fullName[0];
                                                $l_name = $fullName[1];
                                                // print_r($f_name, $l_name);
                                            @endphp
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{isset($f_name) && $f_name ? $f_name : '' }}">
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="{{isset($l_name) && $l_name ? $l_name : '' }}">
                                                </div>
                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Address</label>
                                                    <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="{{isset($user_data->address) && !empty($user_data->address) ? $user_data->address : ''}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{isset($user_data->email) && !empty($user_data->email) ? $user_data->email : ''}}">
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (phone number)-->
                                                
                                               
                                            </div>
                                            <!-- Save changes button-->
                                            <button class="btn btn-primary" type="button">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- orders --}}
                            <div class="col-xl-10">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-center">Your Orders</div>
                                    <div class="card-body">
                                       <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $item)
                                            <tr>
                                                <td>{{isset($item->name) && !empty($item->name) ? $item->name : ''}}</td>
                                                <td>{{isset($item->email) && !empty($item->email) ? $item->email : ''}}</td>
                                                <td>{{isset($item->address) && !empty($item->address) ? $item->address : ''}}</td>
                                                <td>{{isset($item->phone) && !empty($item->phone) ? $item->phone : ''}}</td>
                                                <td>${{isset($item->price) && !empty($item->price) ? $item->price : ''}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                       </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
            

					{{-- user profile code end --}}

				
		</div>

@include('user.footer')
