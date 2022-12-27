<aside class="w-48">
    <h4 class="font-semibold mb-4 border-b">
        MENÜ
    </h4>
    <ul>
        <li>
            <a href="/administiration" class="{{ request()->is('administiration') ? 'text-blue-700' : ''  }}">KULLANICILAR </a>
        </li>
        <li>
            <a href="/kalips" class="{{ request()->is('kalips') ? 'text-blue-700' : ''  }}">KALIPLAR</a>
        </li>
        <li>
            <a href="/categories" class="{{ request()->is('categories') ? 'text-blue-700' : ''  }}">KATEGORİLER</a>
        </li>
        <li>
            <a href="/updates" class="{{ request()->is('updates') ? 'text-blue-700' : ''  }}">GÜNCELLENME GEÇMİŞİ</a>
        </li>
    </ul>
</aside>
