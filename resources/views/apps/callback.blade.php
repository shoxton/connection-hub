<x-layout>
    <div class="shadow-md bg-white rounded-lg p-5 w-96">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="w-24 text-center mx-auto" src="{{ asset("img/rgb-logo.svg") }}" alt="Logo Tray">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Autorizar Tray</h2>
                <p class="mt-2 text-center text-sm text-gray-600">Autorize a integração para finalizar</p>
                @if($errors->any())
                    <div class="text-red-500 flex flex-col text-center bg-red-50 rounded p-3 mt-6">
                        @foreach($errors->all() as $error)
                            <span class="block">{{ $error }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            <form class="mt-8 space-y-6" action="/integrations" method="POST">
                @csrf
                <div class="flex flex-col border border-zinc-200 rounded overflow-hidden divide-y divide-zinc-200">
                    <input placeholder="code" name="data[][code]" class="block text-center p-3 text-zinc-500" type="text" value="{{ request()->query('code') }}">
                    <input placeholder="api_address" name="data[][api_address]" class="block text-center p-3 text-zinc-500" type="text" value="{{ request()->query('api_address') }}">
                </div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-6 border border-transparent text-md font-bold rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <!-- Heroicon name: solid/lock-closed -->
                    <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    </span>
                    Autorizar aplicativo
                </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
