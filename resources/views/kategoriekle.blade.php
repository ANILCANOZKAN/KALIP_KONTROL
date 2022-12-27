<x-layout>
    <main class="mx-auto items-center">
        <div STYLE="max-width: 100px" class="mx-auto">
        <x-button :color="'pink'" :value="'Anasayfa'" :link="'anasayfa'" />
        </div>
        <form action="/kategoriekle" method="post">
            @csrf
        <div class="max-w-lg mx-auto mt-7 border border-gray-100 items-center rounded-xl bg-gray-200 p-6">
            <x-input :prop="'name'" :value="'Kategori Adı'" />
            <div class="mt-6 text-center">
                <x-button-submit :color="'blue'" :value="'Ekle'" :width="100" />
            </div>
        </div>
        </form>
        <div class="container mt-7 ml-8">
            <table>
                <thead class="border-b">
                <tr>
                    <th>ADI</th>
                </tr>
                </thead>
                @foreach($categories as $category)
                <tbody class="border-b">
                <tr>
                    <td><a href="/KALIP">{{$category->name}}</a></td>
                    <th style="float: right">
                        <form action="/deleteKategori/{{$category->id}}" method="post">
                            @csrf
                            <x-button-submit :color="'red'" :value="'Sil'" width="50" />
                        </form>
                    </th>
                </tr>
                </tbody>
                @endforeach
            </table>
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
</x-layout>
