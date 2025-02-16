<div class="flex justify-between p-4 rounded-lg bg-info-100 dark:bg-gray-800">

    <div class="flex flex-col ">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            {{ $title ?? 'Default Title' }}
        </h1>

        @if($subtitle)
            <p class="text-gray-600 dark:text-gray-400">{{ $subtitle }}</p>
        @endif

    </div>

    <!-- Middle Slot -->
    <div class="flex-grow mt-4">
        {{ $middle ?? '' }}
    </div>

    <!-- End Slot -->
    <div class="mt-4">
        {{ $end ?? '' }}
    </div>
</div>
