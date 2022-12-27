@props(['categories', 'currentCategory'])
<aside class="w-48">
    <h4 style="width: 80px" class="font-semibold mb-4 border-b">
        KATEGORİ
    </h4>
    <ul>
        <li>
            <a
                class="block text-left px-3
                            leading-6 hover:bg-blue-700 focus:bg-blue-700 hover:text-white focus:text-white
                {{ isset($currentCategory) ? "" : 'bg-green-700 text-white' }}
                            "
            href="/anasayfa" >Hepsi</a>
        </li>
        @foreach($categories as $category)
        <li>
            <a href="/anasayfa?category={{ $category->id }}&{{ http_build_query(request()->except('category', 'page')) }}"
               class = "block text-left px-3
                            leading-6 hover:bg-blue-700 focus:bg-blue-700 hover:text-white focus:text-white
                            {{ isset($currentCategory) && $currentCategory->id == $category->id ? 'bg-green-700 text-white' : "" }}
                                ">{{ ucWords($category->name) }}</a>
        </li>
        @endforeach
    </ul>
</aside>
