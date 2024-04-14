<x-layouts.app>
@section('title')Luo oma käyttäjä @endsection
@section('content')
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl">Tervetuloa kotisivuillemme,</h3>
            <p class="text-gray-600 pt-2">tästä voit luoda oman käyttäjäsi!</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('register')}}">
            @csrf
            <div class="flex">
                <div class="mb-6 pt-3 rounded bg-gray-200 flex-1 mr-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Etunimi</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200 flex-1 ml-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="last_name">Sukunimi</label>
                    <input type="text" name="last_name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                </div>
            </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Sähköposti</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Salasana</label>
                    <input type="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Vahvista Salasana</label>
                    <input type="password" name="password_confirmation" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Rekisteröidy</button>
            </form>
            <div class="max-w-lg mx-auto text-center mt-12 mb-6">
                <p class="text-black">Omistatko jo käyttäjän? <a href="{{ route('login') }}" class="font-bold hover:underline">Kirjaudu sisään</a>!</p>
            </div>
        </section>
    </main>
@endsection
</x-layouts.app>