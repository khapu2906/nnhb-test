@foreach($category_new_list as $category)
    @if($category['amount_childs']==0)
        <li style='text-decoration: none;'><a href="{!!url('/danh-sach-bai-viet')!!}/{{$category['slug']}}">{{$category['name']}}</a></li>
    @else
        <li style='text-decoration: none;'><a href="{!!url('/danh-sach-bai-viet')!!}/{{$category['slug']}}">{{$category['name']}}</a>
            <i class='fas fa-minus' style='float: right;'></i>
            <ul class='nested'>
                @include('client.blog.catalog',['category_new_list' => $category['child']])
            </ul>
        </li>       
    @endif
@endforeach
