<x-layout>
    <body style="font-family: Open Sans, sans-serif">
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    @foreach($files as $file)
                        <img style="width: 280px; height: 280px"
                             src="{{asset('storage/'.$file->file)}}"
                             alt="">
                        <br />
                    @endforeach
                <p class="mt-4 block text-gray-400 text-xs">
                    <time>Oluşturulma tarihi: {{$kalip->created_at}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <a class="hover:text-blue-400" href="/anasayfa?category={{ $kalip->category_id }}&{{ http_build_query(request()->except('category', 'page')) }}"
                    >Kategori adı: {{$kalip->category->name}}</a>
                </div>
            </div>

            <div class="col-span-8">
                <a href= "/kalips/{{$kalip->id}}">
                    <h1 class="flex-inline text-3xl font-bold">
                    Kalıp tanımı: {{$kalip->ad}}
                    </h1></a>
                <div style="float: right" class="flex flex-shrink-0">
                    <form action="/updateKalips/{{$kalip->id}}" method="get">
                        @csrf
                    <x-button-submit :color="'yellow'" :value="'Düzenle'" />
                    </form>
                    <form method="post" action="/deleteKalips/{{$kalip->id}}">
                        <div class="ml-2">
                        <x-button-submit :color="'red'" :value="'Sil'" :width="40" />
                        </div>
                    </form>

                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Durum: {{$kalip->durum != null? $kalip->durum : "--"}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Güncellenme Tarihi: {{$kalip->updated_at}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Raf No: {{$kalip->rafno != null ? $kalip->rafno : "--"}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Göz Adedi: {{$kalip->gozadedi != null ? $kalip->gozadedi : "--"}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Ağız Çapı: {{$kalip->agizcapi != null ? $kalip->agizcapi : "--"}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Çene Yapısı: {{$kalip->ceneyapisi != null ? $kalip->ceneyapisi : "--"}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Ağırlık: {{$kalip->agirlik != null ? $kalip->agirlik : "--"}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Gönderilen Yer: {{$kalip->gonderilenyer != null ? $kalip->gonderilenyer : "--"}}
                </div>
                <div class="space-y-4 mt-4 lg:text-lg leading-loose space-y-4">
                    Açıklama: {{$kalip->aciklama != null ? $kalip->aciklama : "--"}}
                </div>
                <div class="mt-3">
                    <x-button :color="'blue'" :value="'Geri Dön'" link="anasayfa" />
            </div>
            </div>
        </article>
        </div>
    </main>
    </body>
</x-layout>
