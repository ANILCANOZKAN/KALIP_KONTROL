<x-layout>
    <section class="py-8 max-w-4xl m-auto">
        <x-admin-header :form="'kalips'" />
            <div class="flex mt-7">
                <x-admin-menu />
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
                                    <td><a class="hover:text-blue-700" href="/kalips?category={{ $kalip->category_id }}&{{ http_build_query(request()->except('category', 'page')) }}"
                                        >{{$kalip->category->name}}</a></td>
                                    <td><a href="/kalips/{{$kalip->id}}" class="hover:text-blue-700">{{$kalip->ad}}</a></td>
                                    <td>{{$kalip->durum}}</td>
                                    <td>{{$kalip->rafno}}</td>
                                    <td>{{$kalip->updated_at}}</td>
                                    <form action="/deleteKalips/{{$kalip->id}}" method="post">
                                        @csrf
                                        <td><x-button-submit :color="'red'" :value="'Sil'" width="50" /></td>
                                    </form>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="mt-3">
                            {{ $kalips->links() }}
                        </div>
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
    </section>
</x-layout>
