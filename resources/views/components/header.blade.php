<div class="p-4 bg-gray-100 rounded-lg dark:bg-gray-800">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
        {{ $title ?? 'Default Title' }}
    </h1>
    @if($subtitle)
        <p class="text-gray-600 dark:text-gray-400">{{ $subtitle }}</p>
    @endif
</div>
