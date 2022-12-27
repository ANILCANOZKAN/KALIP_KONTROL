<x-layout>
    <main class="max-w-lg mx-auto mt-10 border border-gray-100 items-center rounded-xl bg-gray-200 p-6">
        <h1 style="width: 462px" class="font-bold text-xl max-w-lg text-center">Kayıt Ol</h1>
        <form method="POST" class="mt-5" action="/register">
            @csrf
            <x-input :prop="'name'" :value="'Ad'" />
            <x-input :prop="'surname'" :value="'Soyad'" />
            <x-input :prop="'email'" :value="'E-Mail'" />
            <x-input :prop="'password'" :value="'Parola'" />
            <x-input :prop="'phone'" :value="'Telefon Numarası (Başında 0 olmadan)'" />
            <div class="mb-6 text-center">
                <x-button-submit :color="'gray'" :value="'Kayıt Ol'" :width="100" />
            </div>
        </form>
        <div class="text-center">
            <x-button :color="'blue'" :value="'Geri Dön'" :link="''" />
        </div>
    </main>
</x-layout>
