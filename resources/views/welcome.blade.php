<x-layouts.app>
@section('title')Etusivu @endsection
    @section('content')
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Julkaisut -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @foreach($blog as $post)
            <article class="flex flex-col shadow my-4">
                <a href="{{ route('blog.view', $post->slug) }}" class="hover:opacity-75">
                    <img src="/uploads/blog/{{ $post->image }}" style="object-fit: fill; width: 100%; height: 500px;"
                        alt="{{ $post->title }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="{{ route('blog.view', $post->slug) }}"
                        class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                    <p href="{{ route('blog.view', $post->slug) }}" class="text-sm pb-3">
                        Julkaissut <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>,
                        {{ $post->created_at->locale('fi')->diffForHumans() }}
                    </p>
                    <a href="{{ route('blog.view', $post->slug) }}" class="pb-6">{!! strLimit($post->story, 200) !!}</a>
                    <a href="{{ route('blog.view', $post->slug) }}"
                        class="uppercase text-gray-800 hover:text-black">Jatka lukemista <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            @endforeach

            <!-- Täbit -->
            <div class="flex items-center py-8">
                @if ($blog->previousPageUrl())
                <a href="{{ $blog->previousPageUrl() }}"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3"><i
                        class="fas fa-arrow-left"></i></a>
                @endif

                @foreach ($blog->getUrlRange(1, $blog->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="h-10 w-10 {{ $page == $blog->currentPage() ? 'bg-blue-800 text-white' : 'text-gray-800 hover:bg-blue-600 hover:text-white' }} font-semibold text-sm flex items-center justify-center">{{ $page }}</a>
                @endforeach

                @if ($blog->nextPageUrl())
                <a href="{{ $blog->nextPageUrl() }}"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3"><i
                        class="fas fa-arrow-right"></i></a>
                @endif
            </div>


        </section>

        <!-- Sivu-osio -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-1">Sosiaaliset mediamme</p>
                @if(setting('facebook') !== '')
                <a href="https://facebook.com/{{ setting('facebook') }}" target="_blank"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-facebook mr-2"></i> {{ setting('facebook') }}
                </a>
                @endif
                @if(setting('facebook') !== '')
                <a href="https://instagram.com/{{ setting('instagram') }}" target="_blank"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> {{ setting('instagram') }}
                </a>
                @endif
                @if(setting('twitter') !== '')
                <a href="https://twitter.com/{{ setting('twitter') }}" target="_blank"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-twitter mr-2"></i> {{ setting('twitter') }}
                </a>
                @endif
            </div>
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Tietoja meistä</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio
                    sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Ota yhteyttä
                </a>
            </div>
        </aside>
    </div>

    <x-footer :karuselli="karuselli()" />
    @endsection
</x-layouts.app>