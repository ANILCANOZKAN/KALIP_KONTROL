<x-layout>
    @guest
    <main class="max-w-lg mx-auto mt-10 border border-gray-100 items-center rounded-xl bg-gray-200 p-6">
        <h1 style="width: 462px" class="font-bold text-xl max-w-lg text-center">GİRİŞ</h1>
        <form method="POST" class="mt-5" action="/login">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="email">
                    E-mail
                </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required>
                @error('email')
                <p class="text-red-500 text-xs mt-1"> Hatalı e-mail girişi yaptınız. </p>
                @enderror
            </div><div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="password">
                    Parola
                </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="password"
                       name="password"
                       id="password"
                       required>
                @error('password')
                <p class="text-red-500 text-xs mt-1"> Parola Yanlış </p>
                @enderror
            </div>
            <div class="mb-6 text-center">
                <x-button-submit :color="'blue'" :value="'Giriş'" :width="100"/>
            </div>
            <div class="mb-6 text-center">
                <x-button :color="'gray'" :value="'Kayıt Ol'" :link="'register'" />
            </div>
        </form>
    </main>
    @else
        <div class="mx-auto">
            <x-button :color="'pink'" :value="'Anasayfa'" :link="'anasayfa'" />
        </div>
        <div class="mx-auto">
            <x-button :color="'red'" :value="'Çıkış'" :link="'logout'" />
        </div>
        @endguest
</x-layout>
