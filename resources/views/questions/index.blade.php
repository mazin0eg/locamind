<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">Questions</h3>

                @foreach ($questions as $question)
                    <div class="mt-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $question->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300">{{ $question->body }}</p>
                        <p class="text-sm text-gray-500">Asked by: {{ $question->user->name }}</p>
                    </div>
                @endforeach

                {{ $questions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
