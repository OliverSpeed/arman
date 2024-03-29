<x-layouts.app>
@section('content')
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl">Tervetuloa,</h3>
            <p class="text-gray-600 pt-2">rekisteröidy blaablaa</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('login')}}">
            @csrf
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
                <!---
                <div class="flex justify-end">
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 hover:underline mb-6">Unohditko salasanasi?</a>
                </div>
                --->
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Kirjaudu sisään</button>
            </form>
            <div class="max-w-lg mx-auto text-center mt-12 mb-6">
                <p class="text-black">Etkö ole vielä käyttäjä? <a href="{{ route('register') }}" class="font-bold hover:underline">Liity tästä</a>!</p>
            </div>
        </section>
    </main>
@endsection
</x-layouts.app>