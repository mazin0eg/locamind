<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-6 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="currentDateTime">2025-02-24 09:31:36</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>mazin0eg</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Ask Question Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center mb-6">
                    <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">Ask a Question</h3>
                </div>
                
                <!-- Question Form -->
                <form action="{{ route('questions.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Title</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200" 
                            placeholder="What would you like to ask?"
                            required
                        >
                    </div>

                    <div>
                        <label for="body" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Details</label>
                        <textarea 
                            name="body" 
                            id="body" 
                            rows="3" 
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200" 
                            placeholder="Provide more details about your question..."
                            required
                        ></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button 
                            type="submit" 
                            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 text-white rounded-md transition-colors duration-200 flex items-center"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Post Question
                        </button>
                    </div>
                </form>
            </div>

            <!-- Questions List -->
            <div class="mt-8">
                <div class="flex items-center mb-6">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200">Recent Questions</h3>
                </div>

                @foreach ($questions as $question)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4 border border-gray-200 dark:border-gray-700">
                        <!-- Question Header -->
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $question->title }}</h4>
                                <div class="flex items-center mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{ $question->user->name }}
                                    <span class="mx-2">•</span>
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $question->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="ml-4 flex flex-col items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <span class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                                    {{ $question->comments->count() }}
                                </span>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Comments</span>
                            </div>
                        </div>

                        <!-- Question Content -->
                        <div class="mt-4 text-gray-700 dark:text-gray-300">
                            {{ $question->body }}
                        </div>

                        <!-- Comments Section -->
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <!-- Comment Form -->
                            <div class="mb-6">
                                <h5 class="text-md font-semibold text-gray-900 dark:text-gray-200 mb-3">Add a Comment</h5>
                                <form action="{{ route('comments.store') }}" method="POST" class="space-y-3">
                                    @csrf
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    <textarea 
                                        name="body" 
                                        rows="2" 
                                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200" 
                                        placeholder="Write your comment..."
                                        required
                                    ></textarea>
                                    <button 
                                        type="submit" 
                                        class="px-4 py-2 bg-gray-600 hover:bg-gray-700 focus:bg-gray-700 text-white rounded-md transition-colors duration-200 flex items-center text-sm"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                        Add Comment
                                    </button>
                                </form>
                            </div>

                            <!-- Comments List -->
                            @if($question->comments->count() > 0)
                                <div class="space-y-4">
                                    <h5 class="text-md font-semibold text-gray-900 dark:text-gray-200 mb-3">Comments</h5>
                                    @foreach ($question->comments as $comment)
                                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-100 dark:border-gray-600">
                                            <p class="text-gray-800 dark:text-gray-300">{{ $comment->body }}</p>
                                            <div class="mt-2 flex items-center text-sm text-gray-600 dark:text-gray-400">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $comment->user->name }}
                                                <span class="mx-2">•</span>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-400 text-sm italic">No comments yet.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- JavaScript for updating date/time -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const formatted = now.getUTCFullYear() + '-' + 
                            String(now.getUTCMonth() + 1).padStart(2, '0') + '-' + 
                            String(now.getUTCDate()).padStart(2, '0') + ' ' + 
                            String(now.getUTCHours()).padStart(2, '0') + ':' + 
                            String(now.getUTCMinutes()).padStart(2, '0') + ':' + 
                            String(now.getUTCSeconds()).padStart(2, '0');
            document.getElementById('currentDateTime').textContent = formatted;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</x-app-layout>