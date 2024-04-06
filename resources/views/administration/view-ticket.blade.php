<x-layouts.admin>
    @section('content')
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-6 mx-4">
            <div class="max-w-lg mx-auto">
                <h2 class="text-2xl font-bold mb-4 text-white" disabled>Muokkaa avunpyyntöä</h2>
                <form action="{{ route('admin.ticket.update', $ticket->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-white-700">Nimi</label>
                        <input type="text" name="name" id="name" value="{{ $ticket->name }}" class="mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md text-white" disabled>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-white-700">Sähköposti</label>
                        <input type="email" name="email" id="email" value="{{ $ticket->email }}" class="mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md text-white" disabled>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-white-700">Aihe</label>
                        <input type="email" name="email" id="email" value="{{ $ticket->subject }}" class="mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md text-white" disabled>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-white-700">Viesti</label>
                        <textarea rows="6" type="email" name="email" id="email" value="" class="mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md text-white" disabled>{{ $ticket->message }}</textarea>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-white-700">Tilanne</label>
                        <select id="status" name="status" class="mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md text-black">
                            <option value="open"@if($ticket->status === "open") selected @endif >Vastaamaton</option>
                            <option value="closed" @if($ticket->status === "closed") selected @endif>Vastattu</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Tallenna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-layouts.admin>
