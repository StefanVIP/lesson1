<section class="space-y-8">
    <p class="text-3xl font-bold">Авторизация</p>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Логин
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="Ваш логин...">
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Пароль
            </label>
            <input class="shadow appearance-none border border-red-600 rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************">
            <p class="text-red-600 text-xs italic">Пожалуйста, введите пароль</p>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" type="button">
                Авторизоваться
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-300 hover:text-blue-600" href="#">
                Забыли пароль?
            </a>
        </div>
    </div>
</section>
