@foreach ($orders as $item)
<tr>
    <td>{{isset($item->name) && !empty($item->name) ? $item->name : ''}}</td>
    <td>{{isset($item->address) && !empty($item->address) ? $item->address : ''}}</td>
    <td>{{isset($item->phone) && !empty($item->phone) ? $item->phone : ''}}</td>
    <td>{{isset($item->price) && !empty($item->price) ? $item->price : ''}}</td>
    <td>
        
    </td>

</tr>
@endforeach