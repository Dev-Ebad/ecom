


<div class="row row-pb-md">
    @if(!empty($products))
    @foreach ($products as $item)
    @php
    $image = isset($item->images) && !empty($item->images) ? json_decode($item->images) : '';
    @endphp
    <div class="col-md-3 col-lg-3 mb-4 text-center">
        <div class="product-entry border">
            <a href="{{route('user.single_product',['id' => $item->id])}}" class="prod-img">
                @if($image)
                    <img src="{{url('storage/app/uploads/' . $image[0])}}" class="img-fluid" alt="{{$image[0]}}">
                @else
                    <img src="{{url('storage/app/uploads/no image icon.png')}}" class="img-fluid" alt="no Image">
                @endif
            </a>
            <div class="desc">
                <h2><a href="{{route('user.single_product',['id' => $item->id])}}">{{isset($item->description) && !empty($item->description) ? $item->description : ''}}</a></h2>
                <span class="price">${{isset($item->price) && !empty($item->price) ? $item->price : ''}}</span>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>


