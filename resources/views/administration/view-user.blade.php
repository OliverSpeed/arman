<x-layouts.admin>
    @section('content')
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-4 mx-4">
            <div class="max-w-lg mx-auto">
                <h2 class="text-2xl font-bold mb-4 text-black">Muokkaa käyttäjää</h2>
                <form action=" route('admin.user.update', ['user' => $user->id]) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-white-700">Nimi</label>
                        <input type="text" name="name" id="name" value=" $user->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-black">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-white-700">Sähköposti</label>
                        <input type="email" name="email" id="email" value=" $user->email }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-black">
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-white-700">Rooli</label>
                        <select id="role" name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md text-black">
                            <option value="admin" selected>Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-[#007bff] hover:bg-blue-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full">Tallenna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-layouts.admin>
