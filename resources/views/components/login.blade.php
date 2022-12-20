<div>
    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
    </svg>
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Autentique-se</h2>
    <p class="mt-2 text-center text-sm text-gray-600">Para continuar, confirme seus dados</p>
</div>
<form class="mt-8 space-y-6" action="#" method="POST">
    <input type="hidden" name="remember" value="true">
    <div class="rounded-md shadow-sm -space-y-px">
    <div>
        <label for="email-address" class="sr-only">Email</label>
        <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Email">
    </div>
    <div>
        <label for="password" class="sr-only">Senha</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Senha">
    </div>
    </div>

    <div>
    <button type="submit" class="group relative w-full flex justify-center py-3 px-6 border border-transparent text-md font-bold rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
        <!-- Heroicon name: solid/lock-closed -->
        <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
        </svg>
        </span>
        Autenticar
    </button>
    </div>
</form>
