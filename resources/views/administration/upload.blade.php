<x-layouts.admin>
    @section('content')
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-6 mx-4">
            <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Julkaise uusi kuva</h2>
                <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <span class="text-sm text-red-600">Kiitos! {{ session()->get('success') }}</span>
                    @endforeach
                    @endif
                    @if (session()->has('success'))
                    <span class="text-sm text-green-600">Kiitos! {{ session()->get('success') }}</span>
                    @endif
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Valitse kuva</label>
                        <input type="file" id="photo" name="photo"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    </div>
                    <input type="hidden" name="uploader" value="{{ Auth::user()->id }}">
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Rooli</label>
                        <select id="category" name="category"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                            <option value="instagram" selected>Instagram</option>
                            <option value="facebook">Facebook</option>
                            <option value="verkkokauppa">Verkkokauppa</option>
                            <option value="muu">Muu</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Otsikko</label>
                        <input type="text" id="title" name="title"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Kuvaus</label>
                        <textarea type="text" rows="3" id="description" name="description"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Lataa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-layouts.admin>