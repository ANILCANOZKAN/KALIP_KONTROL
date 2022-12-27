<x-layout>
    <main class="mx-auto items-center">
        <div style="width: fit-content" class="mx-auto">
            <x-button :color="'pink'" :value="'Anasayfa'" :link="'anasayfa'" />
        </div>
        <div class="max-w-lg mx-auto mt-7 border border-gray-100 items-center rounded-xl bg-gray-200 p-6">
        <h1 style="width: 462px" class="mt-4 font-bold text-xl max-w-lg text-center">KALIP EKLE</h1>
        <form method="POST" class="mt-5" action="/kalipekle" ENCTYPE="multipart/form-data">
            @csrf
            <x-input :prop="'ad'" :value="'Kalıp Tanımı'" />
            <label class="block mb-2 font-bold text-xs text-gray-700"
                   for="category">
                Kategori
            </label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                @endforeach
            </select>
            <x-input :prop="'durum'" :value="'Durumu'" />
            <x-input :prop="'rafno'" :value="'Raf No'" />
            <div class="mb-6">
                <label class="block mb-2 font-bold text-xs text-gray-700"
                       for="file">
                    Fotoğraflar
                </label>
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
            <x-input :prop="'gozadedi'" :value="'Göz Adedi'" />
            <x-input :prop="'agizcapi'" :value="'Ağız Çapı'" />
            <x-input :prop="'ceneyapisi'" :value="'Çene Yapısı'" />
            <x-input :prop="'agirlik'" :value="'Kalıp ağırlığı'" />
            <x-input :prop="'kalipolculer'" :value="'Kalıp Ölçüleri'" />
            <x-input :prop="'gonderilenyer'" :value="'Gönderilen Yer'" />
            <label class="block mb-2 font-bold text-xs text-gray-700"
                   for="aciklama">
                Yapılan/Yapılacak İşlemler/Açıklamalar
            </label>
            <textarea id="aciklama" name="aciklama" style="width: 462px; height: 150px">{{old('aciklama')}}</textarea>
            <div class="mb-6 text-center mt-4">
                <x-button-submit :color="'blue'" :value="'Ekle'" :width="100" />
            </div>
        </form>
        </div>
    </main>
</x-layout>
