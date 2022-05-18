<ul class="list-group">
    @foreach($categories as $category)
    <a href="{{route('category.items',$category->restaurant_food_category_name_slug)}}">
        <li class="list-group-item">{{$category->restaurant_food_category_name}}</li>
    </a>
    @endforeach

</ul>
