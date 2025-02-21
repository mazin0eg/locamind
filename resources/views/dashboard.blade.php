<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">Ask a Question</h3>
                
                <!-- Add Question Form -->
                <form action="{{ route('questions.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" id="title" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="body" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Details</label>
                        <textarea name="body" id="body" rows="3" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required></textarea>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Submit</button>
                </form>
            </div>

            <!-- Display Questions -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">Questions</h3>
                @foreach ($questions as $question)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $question->title }}</h4>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $question->body }}</p>
                        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Asked by: {{ $question->user->name }}</p>

                        <!-- Add Comment Form -->
                        <div class="mt-4">
                            <h5 class="text-md font-semibold text-gray-900 dark:text-gray-200">Add a Comment</h5>
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <textarea name="body" rows="2" class="w-full mt-2 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required></textarea>
                                <button type="submit" class="mt-2 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Comment</button>
                            </form>
                        </div>

                        <!-- Display Comments -->
                        <div class="mt-4">
                            <h5 class="text-md font-semibold text-gray-900 dark:text-gray-200">Comments</h5>
                            @foreach ($question->comments as $comment)
                                <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-md mt-2">
                                    <p class="text-gray-800 dark:text-gray-300">{{ $comment->body }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">By {{ $comment->user->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
