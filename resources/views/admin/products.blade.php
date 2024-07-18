@php
    $activebar = 'products';
@endphp

@include('admin.header')
  @include('admin.sidebar')

  @include('admin.navbar')

        <div class="container">
          <div class="page-inner">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct">
              Add Product
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category">
              Add category
            </button>

            <div class="row">
              <div class="col-md-12">
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Discount Price</th>
                      <th>SKU</th>
                      <th>Stock Quantity</th>
                      <th>Weight</th>
                      <th>Dimension</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Featured</th>
                      <th>Ratings</th>
                      <th>Reviews</th>
                      <th>Tags</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($products))
                    @foreach ($products as $item)
                    <tr>
                      <td>{{isset($item->id) && !empty($item->id) ? $item->id : ''}}</td> 
                      <td>{{isset($item->name) && !empty($item->name) ? $item->name : ''}}</td> 
                      <td>{{isset($item->description) && !empty($item->description) ? $item->description : ''}}</td> 
                      <td>{{isset($item->category->cat_name) && !empty($item->category->cat_name) ? $item->category->cat_name : ''}}</td> 
                      <td>{{isset($item->price) && !empty($item->price) ? $item->price : ''}}</td> 
                      <td>{{isset($item->discount_price) && !empty($item->discount_price) ? $item->discount_price : ''}}</td> 
                      <td>{{isset($item->SKU) && !empty($item->SKU) ? $item->SKU : ''}}</td> 
                      <td>{{isset($item->stock_quantity) && !empty($item->stock_quantity) ? $item->stock_quantity : ''}}</td> 
                      <td>{{isset($item->weight) && !empty($item->weight) ? $item->weight : ''}}</td> 
                      <td>{{isset($item->dimension) && !empty($item->dimension) ? $item->dimension : ''}}</td> 
                      <td><img src="{{url('storage/app/uploads' . $item->images)}}" alt=""></td> 
                      <td>{{isset($item->status) && !empty($item->status) ? $item->status : ''}}</td> 
                      <td>{{isset($item->featured) && !empty($item->featured) ? $item->featured : ''}}</td> 
                      <td>{{isset($item->ratings) && !empty($item->ratings) ? $item->ratings : ''}}</td> 
                      <td>{{isset($item->reviews) && !empty($item->reviews) ? $item->reviews : ''}}</td> 
                      <td>{{isset($item->tags) && !empty($item->tags) ? $item->tags : ''}}</td> 
                      <td>
                        <a href="javascript:void(0)" onclick="Edit_product('{{isset($item->id) ? $item->id : ''}}')" class="btn btn-success">Edit</a>
                        <a href="javascript:void(0)" onclick="Delete_product('{{isset($item->id) ? $item->id : ''}}')" class="btn btn-danger">Delete</a>
                      </td> 
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            
            {{-- {!! $products->links() !!} --}}
            
           @include('admin.modals')
          </div>
        </div>


@include('admin.footer')