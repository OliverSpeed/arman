    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Verkkokauppa</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href=" route('contact.us') }}">Ota
                            yhteyttä</a></li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                @if(setting('facebook') !== '')
                <a class="pl-6" href="https://facebook.com/{{ setting('facebook') }}" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                @endif
                @if(setting('instagram') !== '')
                <a class="pl-6" href="https://instagram.com/{{ setting('instagram') }}" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                @endif
                @if(setting('twitter') !== '')
                <a class="pl-6" href="https://twitter.com/{{ setting('twitter') }}" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                @endif
                @auth
                <a class="pl-6" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                @endauth
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Logo
            </a>
            <p class="text-lg text-gray-600">
                {{ setting('motto') }}
            </p>
        </div>
    </header>