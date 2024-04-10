<x-layouts.app>
    @push('title', 'Ota yhteyttä')
    @section('content')

    <!---
    @foreach($gallery as $photo)
    <img src="/uploads/gallery/{{ $photo->name }}">
    @endforeach
    --->

    <body class="h-screen overflow-hidden flex items-center justify-center">
    <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Tervetuloa Galleriaamme!</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Täältä löydät kaikki keräämämme kuvat juuri sinua varten! Pysyt paremmin ajantasalla seuraamalla somejamme!</p>
                </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      @foreach($gallery as $photo)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img alt="gallery" class="w-full h-48 object-cover object-center" src="/uploads/gallery/{{ $photo->name }}" onclick="openFullSizeImage(this)">
          <div class="px-6 py-4">
            <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">{{ strtoupper($photo->category) }}</h2>
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $photo->title }}</h1>
            <p class="leading-relaxed text-base">{{ $photo->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

    <script>
    function openFullSizeImage(image) {
    const fullImageSrc = image.getAttribute('src');
    
    const modal = document.createElement('div');
    modal.classList.add('fixed', 'inset-0', 'z-50', 'bg-black', 'bg-opacity-75', 'flex', 'items-center', 'justify-center', 'overflow-auto');
    
    const modalContent = document.createElement('div');
    modalContent.classList.add('relative', 'mx-auto', 'bg-white', 'rounded-lg', 'text-center', 'shadow-xl');
    modalContent.style.border = '10px solid white';
    
    const closeButton = document.createElement('button');
    closeButton.classList.add('absolute', 'top-0', 'right-0', 'mt-4', 'mr-4', 'p-2', 'text-2xl', 'bg-transparent', 'border-0', 'text-white');
    closeButton.innerHTML = '&times;';
    closeButton.addEventListener('click', () => {
        modal.remove();
    });
    
    const fullImage = document.createElement('img');
    fullImage.src = fullImageSrc;
    fullImage.alt = 'Full size image';
    fullImage.style.maxHeight = '80vh';
    
    modalContent.appendChild(fullImage);
    modalContent.appendChild(closeButton);
    modal.appendChild(modalContent);
    document.body.appendChild(modal);
    
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
        modal.remove();
        }
    });
    }
    </script>

    <x-footer :karuselli="karuselli()" />
    </body>

    </html>
    @endsection
</x-layouts.app>