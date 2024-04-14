<x-layouts.admin>
    @section('content')
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-6 mx-4">
            <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Verkkosivun Asetukset</h2>
                <form action="{{ route('admin.settings.save') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @if (session()->has('success'))
                        <span class="text-sm text-green-600">Kiitos! {{ session()->get('success') }}</span>
                    @endif
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Logon alla oleva kuvaus</label>
                        <input type="text" id="motto" name="motto" value="{{ setting('motto') }}" class="@error('motto') bg-red-50 border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    @error('motto')
                        <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Sivuston nimi</label>
                        <input type="text" id="motto" name="name" value="{{ setting('name') }}" class="@error('name') bg-red-50 border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    @error('name')
                        <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Twitter</label>
                        <input type="text" id="twitter" name="twitter" value="{{ setting('twitter') }}" class="@error('twitter') bg-red-50 border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    @error('twitter')
                        <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                    @enderror             
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Instagram</label>
                        <input type="text" id="instagram" name="instagram" value="{{ setting('instagram') }}" class="@error('instagram') bg-red-50 border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    @error('instagram')
                        <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Facebook</label>
                        <input type="text" id="facebook" name="facebook" value="{{ setting('facebook') }}" class="@error('facebook') bg-red-50 border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    @error('facebook')
                        <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Verkkokaupan URL</label>
                        <input type="text" id="verkkokauppa" name="verkkokauppa" value="{{ setting('verkkokauppa') }}" class="@error('verkkokauppa') bg-red-50 border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    @error('verkkokauppa')
                        <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Yhteydenotto sähköposti</label>
                        <input type="text" id="email" name="email" value="{{ setting('email') }}" class="@error('email') bg-red-50 border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    @error('email')
                        <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Tallenna muutokset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-layouts.admin>
