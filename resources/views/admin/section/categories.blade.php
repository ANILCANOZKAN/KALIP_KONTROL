<x-layout>
    <section class="py-8 max-w-4xl m-auto">
        <x-admin-header :form="'categories'" />
            <div class="flex mt-7">
                <x-admin-menu />
                <main class="flex-1">
                    <div class="container ml-8">
                        <table>
                            <thead class="border-b">
                            <tr>
                                <th>KATEGORİ ADI</th>
                            </tr>
                            </thead>
                            @foreach($categories as $category)
                            <tbody class="border-b">
                            <tr>
                                <td>{{$category->name}}</td>
                                <form action="/deleteKategori/{{$category->id}}" method="post">
                                    @csrf
                                    <td><x-button-submit :color="'red'" :value="'Sil'" width="50" /></td>
                                </form>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="mt-3">
                            {{ $categories->links() }}
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
