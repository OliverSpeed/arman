<x-layouts.app>
@push('title', 'Meistä')
@section('content')
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
		@foreach($blog as $post)
            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ $post->image }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                    <p href="#" class="text-sm pb-3">
                        Julkaissut <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, {{ $post->created_at->locale('fi')->diffForHumans() }}
                    </p>
                    <a href="#" class="pb-6">{{ $post->story }}</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Jatka lukemista <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
		@endforeach
			
        <!-- Täbit -->
		<div class="flex items-center py-8">
			@if ($blog->previousPageUrl())
				<a href="{{ $blog->previousPageUrl() }}" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3"><i class="fas fa-arrow-left"></i></a>
			@endif
			
			@foreach ($blog->getUrlRange(1, $blog->lastPage()) as $page => $url)
				<a href="{{ $url }}" class="h-10 w-10 {{ $page == $blog->currentPage() ? 'bg-blue-800 text-white' : 'text-gray-800 hover:bg-blue-600 hover:text-white' }} font-semibold text-sm flex items-center justify-center">{{ $page }}</a>
			@endforeach
			
			@if ($blog->nextPageUrl())
				<a href="{{ $blog->nextPageUrl() }}" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3"><i class="fas fa-arrow-right"></i></a>
			@endif
		</div>


        </section>

        <!-- Sivu-osio -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
				
                    <a href="->permalink }}"><img class="hover:opacity-75" src="->url }}"></a>
				
                </div>
                <a href="https://instagram.com/{{ setting('instagram') }}" target="_blank" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> {{ setting('instagram') }}
                </a>
            </div>
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Tietoja meistä</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Ota yhteyttä
                </a>
            </div>
        </aside>
    </div>

    <x-footer :karuselli="karuselli()" />
@endsection
</x-layouts.app>