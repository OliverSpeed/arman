<div class="flex items-center py-8">
    @if ($blog->previousPageUrl())
        <a href="{{ $blog->previousPageUrl() }}" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Previous <i class="fas fa-arrow-left ml-2"></i></a>
    @endif
    
    @foreach ($blog->getUrlRange(1, $blog->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="h-10 w-10 {{ $page == $blog->currentPage() ? 'bg-blue-800 text-white' : 'text-gray-800 hover:bg-blue-600 hover:text-white' }} font-semibold text-sm flex items-center justify-center">{{ $page }}</a>
    @endforeach
    
    @if ($blog->nextPageUrl())
        <a href="{{ $blog->nextPageUrl() }}" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
    @endif
</div>
