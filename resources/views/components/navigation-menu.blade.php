    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center" @click="open = !open">
                Sivut <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="{{ route('welcome') }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Etusivu</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Galleria</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Ota yhteyttä</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Verkkokauppa</a>
				@auth <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2"><font color="red">Hallinta</font></a> @endauth
                <a href="{{ route('register') }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2"><font color="green">Register</font></a>
                <a href="{{ route('login') }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2"><font color="green">Login</font></a>
            </div>
        </div>
    </nav>