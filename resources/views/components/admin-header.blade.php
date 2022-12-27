@props(['form'])
<div style="width: 100px; margin: auto; margin-bottom: 25px" class="text-center">
    <x-button :color="'pink'" :value="'Anasayfa'" :link="'anasayfa'" />
</div>
<div style="height: 50px; width: 900px;" class="flex text-center border-b">
    <h1 class="text-lg font-bold mb-8 ml-3 pb-2">
        <x-button :color="'blue'" :value="'Kalıp Ekle'" :link="'kalipekle'" />
    </h1>
    <h1 class="text-lg font-bold mb-8 pb-2 ml-2">
        <x-button :color="'blue'" :value="'Kategori Ekle'" :link="'kategoriekle'" />
    </h1>
    <h1 class="text-lg font-bold mb-8 pb-2 ml-8">
        <form method="GET" action="/{{$form}}">
            <input type="text"
                   name="search"
                   placeholder="Ara"
                   value="{{ request('search') }}"
                   style="height: 32px" class="border ml-2 border-blue-600">
            <button type="submit" style="width: 40px" class="bg-green-500 rounded ml-2 text-white
                hover:bg-green-600 border border-green-700">Ara</button>
        </form>
    </h1>
    <h1 class="text-lg font-bold mb-8 pb-2">
        <a href="/{{$form}}" class="bg-green-700 rounded ml-2 text-white
                hover:bg-green-800 border border-green-900 p-1">Aramayı sıfırla</a>
    </h1>
    @auth
    <h1 class="text-lg font-bold mb-8 pb-2 ml-5">{{auth()->user()->name}} {{auth()->user()->surname}}
        <x-button :color="'red'" :value="'Çıkış'" :link="'logout'" />
    </h1>
    @endauth
</div>
