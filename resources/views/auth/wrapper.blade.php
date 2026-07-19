<x-layout>
    <div class="shadow-md rounded-m
     shadow-purple-200 flex flex-col divide-y divide-purple-100 [&>*]:p-4">
        <header>
            <hroup class="flex flex-col gap-2 items-center">
                <h1>Welcome to Todo</h1>
                <p>
                    <a class="text-blue-500 hover:underline cursor-pointer" href="{{route('auth.login')}}">Login</a>
                    or
                    <a class="text-blue-500 hover:underline cursor-pointer" href="{{route('auth.register')}}">Register</a>
                </p>
            </hroup>
        </header>
        <main>
            @yield('auth-section')
        </main>
        <footer class="flex justify-center items-center p-6 divide-x divide-purple-300">
            <span class="text-gray-600 text-xs pr-2 block">{{config('app.name')}}</span>
            <span class="text-gray-600 text-xs px-2 block">{{config('app.version')}}</span>
            <span class="text-gray-600 text-xs pl-2 block">{{now()->year}}</span>
        </footer>
    </div>
</x-layout>
