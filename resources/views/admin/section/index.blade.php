<x-layout>
    <section class="py-8 max-w-4xl m-auto">
        <x-admin-header :form="'administiration'" />
            <div class="flex mt-7">
                <x-admin-menu />
                <main class="flex-1">
                    <div class="container ml-8">
                        <table>
                            <thead class="border-b">
                            <tr>
                                <th>İSİM</th>
                                <th>SOYİSİM</th>
                                <th>E-MAİL</th>
                                <th>TELEFON</th>
                                <th>ROL</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                            <tbody class="border-b">
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <form method="post" action="/userUpdate/{{$user->id}}">
                                    @csrf
                                <th>
                                    <select name="role" id="role">
                                        @if($user->role == 3)
                                            <option>Mutlak Admin</option>
                                        @else
                                        <option value="0"
                                        {{$user->role==0 ? 'selected': ''}}>Basit</option>
                                        <option value="1"
                                            {{$user->role==1 ? 'selected': ''}}>Kullanıcı</option>
                                        <option value="2"
                                            {{$user->role==2 ? 'selected': ''}}>Admin</option>
                                        @endif
                                    </select>
                                </th>
                                    <th>
                                        <x-button-submit :color="'yellow'" :value="'Güncelle'" />
                                    </th>
                                </form>
                                <th>
                                    <form action="/userDelete/{{$user->id}}" method="post">
                                        @csrf
                                    <x-button-submit :color="'red'" :value="'Sil'" width="50" />
                                    </form>
                                </th>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="mt-3">
                        {{ $users->links() }}
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
