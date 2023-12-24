<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="block h-12 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Welcome to Your Blog!
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Explore and share your thoughts through your blog. Whether you're a seasoned writer or just getting started, our
        blog app provides a user-friendly platform to express your ideas.
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="w-6 h-6 stroke-gray-400">
                <path d="m12 19 7-7 3 3-7 7-3-3z"/>
                <path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/>
                <path d="m2 2 7.586 7.586"/>
                <circle cx="11" cy="11" r="2"/>
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="#">Create a New Post</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Share your latest experiences, thoughts, or discoveries by creating a new blog post. It's easy and
            intuitive!
        </p>

        <p class="mt-4 text-sm">
            <a href="{{route('manage-posts')}}"
               class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Get started with your first post
            </a>
        </p>
    </div>
</div>
