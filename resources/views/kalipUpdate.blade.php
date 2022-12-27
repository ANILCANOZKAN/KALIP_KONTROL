<x-layout>
    <main class="max-w-lg mx-auto mt-10 border border-gray-100 items-center rounded-xl bg-gray-200 p-6">
        <div style="width: fit-content" class="mx-auto bg-blue-400 hover:bg-blue-500 p-1 rounded text-white">
            <a href="/anasayfa">Anasayfa</a>
        </div>
        <h1 style="width: 462px" class="mt-4 font-bold text-xl max-w-lg text-center">KALIP DÜZENLE</h1>
        <form method="POST" class="mt-5" action="/updateKalips/{{$kalip->id}}" ENCTYPE="multipart/form-data">
            @csrf
            <x-input :prop="'ad'" :value="'Kalıp Tanımı'" :input="$kalip" />
            <label class="block mb-2 font-bold text-xs text-gray-700"
                   for="category">
                Kategori
            </label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$kalip->category_id == $category->id ? "selected": ""}}>{{ucwords($category->name)}}</option>
                @endforeach
            </select>
            <x-input :prop="'durum'" :value="'Durumu'" :input="$kalip" />
            <x-input :prop="'rafno'" :value="'Raf No'" :input="$kalip" />
            <div class="mb-6">
                <label class="block mb-2 font-bold text-xs text-gray-700"
                       for="file">
                    Fotoğraflar
                    <br />
                    @php(
    $files = \App\Models\File::where('kalip_id', $kalip->id)->get()
)
                    @foreach($files as $file)
                        <br />
                        <img style="width: 280px; height: 280px"
                             src="{{asset('storage/'.$file->file)}}"
                             alt="">
                    @endforeach
                </label>
                <br/>
                <p class="text-xs font-bold">
                Güncelleme yapılırken eski fotoğraflar silinmez.
                </p>
                <div class="flex mb-2">
                <p class="text-xs text-red-800">
                Eski fotoğrafların silinmesini istiyorsanız kutucuğu işaretleyiniz.
                </p>
                <input class="items-center ml-7" id="checkbox" value="1" name="checkbox" type="checkbox" >
                </div>
                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="file[]"
                       id="file"
                       accept="image/*"
                       multiple=""
                >
                @error('file')
                <p class="text-red-500 text-xs mt-1">Bu fotoğraflar kullanılamaz</p>
                @enderror
            </div>
            <x-input :prop="'gozadedi'" :value="'Göz Adedi'" :input="$kalip" />
            <x-input :prop="'agizcapi'" :value="'Ağız Çapı'" :input="$kalip" />
            <x-input :prop="'ceneyapisi'" :value="'Çene Yapısı'" :input="$kalip" />
            <x-input :prop="'agirlik'" :value="'Kalıp ağırlığı'" :input="$kalip" />
            Kalıp ölçüleri
            <x-input :prop="'gonderilenyer'" :value="'Gönderilen Yer'" :input="$kalip" />
            <label class="block mb-2 font-bold text-xs text-gray-700"
                   for="aciklama">
                Yapılan/Yapılacak İşlemler/Açıklamalar
            </label>
            <textarea id="aciklama" name="aciklama" style="width: 462px; height: 150px" required>{{$kalip->aciklama}}</textarea>
            <div class="mb-6 text-center">
                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                    Güncelle
                </button>
            </div>
        </form>
    </main>
</x-layout>
