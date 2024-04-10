<footer class="w-full border-t bg-white pb-12">
    <div class="relative w-full flex items-center invisible md:visible md:pb-12" x-data="getCarouselData()">
        <button
            class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
            x-on:click="decrement()">
            &#8592;
        </button>
        <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
            <img class="hover:opacity-75" :src="image" style="width: 300px; height: 300px; object-fit: cover;">
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
            <a href="{{ route('contact.index') }}" class="uppercase px-3">Ota yhteyttä</a>
        </div>
        <div class="uppercase pb-6">&copy; 2024 - {{ ENV('APP_URL') }}</div>
    </div>
</footer>

    <script>
    function getCarouselData() {
        return {
            currentIndex: 0,
            images: [
                @foreach(karuselli() as $photo)
                    '{{ $photo['src'] }}',
                @endforeach
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