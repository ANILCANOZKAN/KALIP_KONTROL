@if(auth()->user()?->role == 3)
    <div class="text-center mb-4 p-1">
        <x-button :color="'purple'" :value="'Admin Menüsü'" :link="'administiration'" />
    </div>
@endif
    <div style="height: 50px; width: 900px;" class="flex text-center border-b">
        @if(auth()->user()?->role >= 2)
        <h1 class="text-lg font-bold mb-8 ml-2 pb-2">
            <x-button :color="'blue'" :value="'Kalıp Ekle'" :link="'kalipekle'" />
        </h1>
        <h1 class="text-lg font-bold mb-8 pb-2 ml-2">
            <x-button :color="'blue'" :value="'Kategori Ekle'" :link="'kategoriekle'" />
        </h1>
        @endif
        <h1 class="text-lg font-bold mb-8 pb-2 ml-8">
            <form method="GET" action="/anasayfa{{ http_build_query(request()->except('page', 'category', 'search')) }}">
                <input type="text"
                       name="search"
                       placeholder="Ara"
                       value="{{ request('search') }}"
                       style="height: 32px" class="border ml-2 border-blue-600">
                <button type="submit" style="width: 40px" class="bg-green-500 rounded ml-2 text-white
                hover:bg-green-600 border border-green-700">Ara</button>
            </form>
        </h1>
        <h1 class="text-lg font-bold mb-8 ml-2 pb-2">
            <x-button :color="'green'" :value="'Aramayı Sıfırla'" :link="'anasayfa'" />
        </h1>
        @auth
            <h1 class="text-lg font-bold mb-8 pb-2 ml-5">{{auth()->user()->name}} {{auth()->user()->surname}}
                <x-button :color="'red'" :value="'Çıkış'" :link="'logout'" />
            </h1>
        @endauth
    </div>
