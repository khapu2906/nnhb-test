@foreach($category_product_list as $category)
    @if($category['amount_childs']==0)
        <li style='text-decoration: none;'><a href="{!!url('/danh-sach-san-pham')!!}/{{$category['slug']}}">{{$category['name']}}</a></li>
    @else
        <li style='text-decoration: none;'><a href="{!!url('/danh-sach-san-pham')!!}/{{$category['slug']}}">{{$category['name']}}</a>
            <i class='fas fa-minus' style='float: right;'></i>
            <ul class='nested'>
                @include('client.product.catalog',['category_product_list' => $category['child']])
            </ul>
        </li>       
    @endif
@endforeach
