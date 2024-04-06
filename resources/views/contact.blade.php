<x-layouts.app>
    @push('title', 'Ota yhteyttä')
    @section('content')
    <div class="my-6">
        <div
            class="grid sm:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">
            <div>
                <h1 class="text-3xl font-extrabold">Ota yhteyttä</h1>
                <p class="text-sm text-gray-400 mt-3">Onko sinulla joku kiva idea verkkosivustojemme kehittämiseksi tai
                    tarve ottaa ottaa yhteyttä meihin? Täältä se onnistuu helpoiten!</p>
                <div class="mt-12">
                    <h2 class="text-lg font-extrabold">Sähköpostiosoitteemme</h2>
                    <ul class="mt-3">
                        <li class="flex items-center">
                            <div
                                class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff'
                                    viewBox="0 0 479.058 479.058">
                                    <path
                                        d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                                        data-original="#000000" />
                                </svg>
                            </div>
                            <a href="mailto:{{ setting('email') }}" class="text-[#007bff] text-sm ml-3">
                                <small class="block">Sähköposti</small>
                                <strong>{{ setting('email') }}</strong>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-12">
                    @if(setting('facebook') !== '')
                    <a class="pl-6" href="https://facebook.com/{{ setting('facebook') }}" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    @endif

                    @if(setting('twitter') !== '')
                    <a class="pl-6" href="https://twitter.com/{{ setting('twitter') }}" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    @endif
                    <h2 class="text-lg font-extrabold">Sosiaaliset mediat</h2>
                    <ul class="flex mt-3 space-x-4">
                        @if(setting('facebook') !== '')
                        <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center">
                            <a href="https://facebook.com/{{ setting('facebook') }}" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        @endif
                        @if(setting('instagram') !== '')
                        <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center">
                            <a href="https://instagram.com/{{ setting('instagram') }}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        @endif
                        @if(setting('twitter') !== '')
                        <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center">
                            <a href="https://twitter.com/{{ setting('twitter') }}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <form action="{{ route('contact.create.ticket') }}" method="post" class="ml-auto space-y-4">
                @csrf
                @if (session()->has('success'))
                <span class="text-sm text-green-600">Kiitos! {{ session()->get('success') }}</span>
                @endif

                <input type='text' name="name" placeholder='Nimi'
                    class="w-full rounded-md py-2.5 px-4 border @error('name') bg-red-50 border-red-500 @enderror text-sm outline-[#007bff]" />
                @error('name')
                <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                @enderror
                <input type='email' name='email' placeholder='Sähköposti'
                    class="w-full rounded-md py-2.5 px-4 border @error('email') bg-red-50 border-red-500 @enderror text-sm outline-[#007bff]" />
                @error('email')
                <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                @enderror

                <input type='text' placeholder='Aihe' name='subject'
                    class="w-full rounded-md py-2.5 px-4 border @error('subject') bg-red-50 border-red-500 @enderror text-sm outline-[#007bff]" />
                @error('subject')
                <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                @enderror

                <textarea placeholder='Viesti' rows="6" name='message'
                    class="w-full rounded-md px-4 border @error('message') bg-red-50 border-red-500 @enderror text-sm pt-2.5 outline-[#007bff]"></textarea>
                @error('message')
                <span class="text-sm text-red-600">Hups! {{ $message }}</span>
                @enderror

                <button type="submit" class="text-white bg-[#007bff] hover:bg-blue-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full">Lähetä</button>
            </form>

        </div>
    </div>
    <footer class="w-full border-t bg-white pb-12">
        <div class="relative w-full flex items-center invisible md:visible md:pb-12" x-data="getCarouselData()">
            <button
                class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
                x-on:click="decrement()">
                &#8592;
            </button>
            <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
                <img class="w-1/6 hover:opacity-75" :src="image">
            </template>
            <button
                class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
                x-on:click="increment()">
                &#8594;
            </button>
        </div>
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="{{ route('about.index') }}" class="uppercase px-3">Meistä</a>
                <a href="{{ route('about.index') }}" class="uppercase px-3">Ota yhteyttä</a>
            </div>
            <div class="uppercase pb-6">&copy; 2024 - {{ ENV('APP_URL') }}</div>
        </div>
    </footer>
    <script>
    function getCarouselData() {
        return {
            currentIndex: 0,
            images: [
                'https://source.unsplash.com/collection/1346951/800x800?sig=1',
            ],
            increment() {
                this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
            },
            decrement() {
                this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
            },
        }
    }
    </script>
    </body>

    </html>
    @endsection
</x-layouts.app>