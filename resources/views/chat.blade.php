<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <chat-component :user="{{ $user }}" :current-user="{{ Auth::id() }}"></chat-component>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>