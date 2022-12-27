<x-layout>
    <section class="py-8 max-w-4xl m-auto">
        @if(auth()->user()?->role >=1)
        <x-header />
        <div class="flex mt-7">
            <x-category :categories="$categories" :currentCategory="$currentCategory" />
            <main class="flex-1">
                <div class="container ml-8">
                    <table>
                        <thead class="border-b">
                        <tr>
                            <th>MKN</th>
                            <th>KALIP TANIMI</th>
                            <th>DURUM</th>
                            <th>RAF NO</th>
                            <th>GÜNCELLENME TARİHİ</th>
                        </tr>
                        </thead>
                        @foreach($kalips as $kalip)
                            <tbody class="border-b">
                            <tr>
                                <td>
                                    <a class="hover:text-blue-700" href="/anasayfa?category={{ $kalip->category_id }}&{{ http_build_query(request()->except( 'category' ,'page')) }}"
                                    >{{$kalip->category->name}}</a>
                                    </td>
                                <td class="hover:text-blue-700">
                                    @if(auth()->user()?->role >=2)
                                        <a href="/kalips/{{$kalip->id}}">{{$kalip->ad}}</a>
                                    @else
                                        {{$kalip->ad}}
                                    @endif</td>
                                <td>{{$kalip->durum}}</td>
                                <td>{{$kalip->rafno}}</td>
                                <td>{{$kalip->updated_at}}</td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{ $kalips->links() }}
                </div>
                <style>
                    table {
                        width: 900px;
                        border-collapse: collapse;
                        overflow: hidden;
                        box-shadow: 0 0 20px rgba(0,0,0,0.1);
                    }

                    th,
                    td {
                        padding: 15px;
                        background-color: rgba(255,255,255,0.2);
                        color: #1a202c;
                    }

                    th {
                        text-align: left;
                    }

                    thead {
                    th {
                        background-color: #55608f;
                    }
                    }

                    tbody {
                    tr {
                    &:hover {
                         background-color: rgba(255,255,255,0.3);
                     }
                    }
                    td {
                        position: relative;
                    &:hover {
                    &:before {
                         content: "";
                         position: absolute;
                         left: 0;
                         right: 0;
                         top: -9999px;
                         bottom: -9999px;
                         background-color: rgba(255,255,255,0.2);
                         z-index: -1;
                     }
                    }
                    }
                    }
                </style>
            </main>
        </div>
        @else
            <div class="items-center">
                Bu alanı görmek için yeterli yetkiniz yoktur.
                @auth
                <div class="text-center mt-4">
                    <a class="bg-red-400 border border-red-600 rounded text-white p-1 hover:bg-red-500" href="/logout">Çıkış</a>
                </div>
                @endauth
                @guest
                    <div class="text-center mt-4">
                        <a class="bg-blue-400 border border-blue-600 rounded text-white p-1 hover:bg-blue-500" href="/">Giriş</a>
                    </div>
                @endguest
            </div>
        @endif
    </section>
</x-layout>
