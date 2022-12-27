<x-layout>
<div class="mx-auto items-center">
    Bu alanı görmek için yeterli yetkiniz yoktur.
    @auth
        <div class="text-center mt-4">
            <x-button :color="'pink'" :value="'Anasayfa'" :link="'anasayfa'" />
        </div>
    <div class="text-center mt-4">
        <x-button :color="'red'" :value="'Çıkış'" :link="'logout'" />
    </div>
    @else
    <div class="text-center mt-4">
        <x-button :color="'blue'" :value="'Giriş Yap'" :link="''" />
    </div>
    @endauth
</div>
</x-layout>
