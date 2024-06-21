@include('admin.header')
  @include('admin.sidebar')

  @include('admin.navbar')

        <div class="container">
          <div class="page-inner">
            
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
                        @if(!empty($users))
                        @foreach ($users as $item)
                        <tr>
                          <td>{{isset($item->name) && !empty($item->name) ? $item->name : ''}}</td>
                          <td>{{isset($item->email) && !empty($item->email) ? $item->email : ''}}</td>
                          <td>{{isset($item->address) && !empty($item->address) ? $item->address : ''}}</td>
                          <td>{{isset($item->gender) && !empty($item->gender) ? $item->gender : ''}}</td>
                          <td><img src="{{url('storage/app/uploads' . $item->profile)}}" alt=""></td>
                          <td>
                            <a href="" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@include('admin.footer')