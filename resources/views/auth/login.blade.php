@extends('auth.wrapper')

@section('auth-section')
    <form method="POST" action="{{route('auth.login.action')}}" class="flex flex-col gap-4">
        @csrf
        @error('auth')
        <div class="px-4 py-2 bg-red-400 rounded-sm w-full">
            <span class="text-white font-bold text-base">{{$message}}</span>
        </div>
        @enderror
        <div class="flex flex-col items-start gap-2 w-full">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" id="username" class="w-full border border-purple-100 rounded-sm p-2">
            @error('username')
            <div class="px-4 py-2 bg-red-400 rounded-sm w-full">
                <span class="text-white font-bold text-base">{{$message}}</span>
            </div>
            @enderror
        </div>
        <div class="flex flex-col items-start gap-2 w-full">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password" class="w-full border border-purple-100 rounded-sm p-2">
            @error('password')
            <div class="px-4 py-2 bg-red-400 rounded-sm w-full">
                <span class="text-white font-bold text-base">{{$message}}</span>
            </div>
            @enderror
        </div>
        <button type="submit" class="w-full py-2 font-bold bg-purple-400 text-white rounded-md hover:bg-purple-300 cursor-pointer">Login</button>
    </form>
@endsection
