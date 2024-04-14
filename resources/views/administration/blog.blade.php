<x-layouts.admin>
    @section('content')
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-6 mx-4">
            <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Julkaise uusi blogi-viesti</h2>
                <form action="{{ route('admin.blog.save') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @if (session()->has('success'))
                        <span class="text-sm text-green-600">Kiitos! {{ session()->get('success') }}</span>
                    @endif
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Valitse taustakuva</label>
                        <input type="file" id="photo" name="photo" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Otsikko</label>
                        <input type="text" id="title" name="title" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-black">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Tarina</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Lataa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('description', {
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
            { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        removeButtons: 'Source,Save,NewPage,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,Scayt,SelectAll,SpellChecker,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CreateDiv,BidiLtr,BidiRtl,Language,Flash,Iframe,PageBreak,About'
    });
</script>
    @endsection
</x-layouts.admin>
