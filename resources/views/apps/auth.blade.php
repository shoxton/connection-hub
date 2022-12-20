<x-layout>
    <form method="POST" action="{{ route("app.auth", [$appId]) }}" class="shadow-md bg-white rounded-lg p-5 w-96">
        <img class="w-24" src="{{ asset("img/rgb-logo.svg") }}" alt="Logo Tray">
        <p class="text-2xl mb-5">Conectar Tray</p>
        <div class="flex my-6 flex-col gap-y-3">
            @csrf
            <input
                placeholder="URL da loja"
                name="url"
                type="text"
                value="{{ request()->query('url') }}"
                class="block p-3 text-zinc-500 bg-zinc-100 rounded"
            >
            <input
                placeholder="Código da loja"
                name="store"
                type="text"
                value="{{ request()->query('store') }}"
                class="block p-3 text-zinc-500 bg-zinc-100 rounded"
            >
        </div>
        <button
            type="submit"
            class="flex items-center justify-between px-6 py-3 font-bold rounded-md"
        >
            Conectar agora
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </button>
    </form>
</x-layout>
