@include('admin.header')
  @include('admin.sidebar')

  @include('admin.navbar')

        <div class="container">
          <div class="page-inner">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add User
            </button>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Registered Users</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped mt-3">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Gender</th>
                          <th>Picture</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @if(!empty($registered_users))
                          @foreach ($registered_users as $item)
                          <td>{{isset($item->name) ? $item->name : ''}}</td> 
                          <td>{{isset($item->email) ? $item->email : ''}}</td> 
                          <td>{{isset($item->address) ? $item->address : ''}}</td> 
                          <td>{{isset($item->gender) ? $item->gender : ''}}</td> 
                          <td><img src="{{url('storage/app/uploads' . $item->image)}}" alt=""></td> 
                          <td>
                            <a href="javascript:void(0)" onclick="Edit_user('{{isset($item->id) ? $item->id : ''}}')" class="btn btn-success">Edit</a>
                            <a href="javascript:void(0)" onclick="Delete_user('{{isset($item->id) ? $item->id : ''}}')" class="btn btn-danger">Delete</a>
                          </td> 
                          @endforeach
                          @endif
                        </tr>
                      </tbody>
                   
                  </div>
                </div>
              </div>
            </div>
            
           @include('admin.modals')
          </div>
        </div>


@include('admin.footer')