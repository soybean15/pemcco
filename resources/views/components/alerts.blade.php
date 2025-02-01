<div class="my-2">
    @if(session()->has('success'))
        <x-alert title="Success!" positive padding="none">
            <x-slot name="slot">
                {{ session('success') }}
            </x-slot>
        </x-alert>
    @endif

    @if(session()->has('negative'))
        <x-alert title="Error!" negative padding="small">
            <x-slot name="slot">
                {{ session('negative') }}
            </x-slot>
        </x-alert>
    @endif

    @if(session()->has('warning'))
        <x-alert title="Warning!" warning padding="medium">
            <x-slot name="slot">
                {{ session('warning') }}
            </x-slot>
        </x-alert>
    @endif

    @if(session()->has('info'))
        <x-alert title="Information!" info padding="large">
            <x-slot name="slot">
                {{ session('info') }}
            </x-slot>
        </x-alert>
    @endif

    @if(
        session()->has('secondary')

    )
        <x-alert title="Custom!" secondary padding="px-8 py-2">
            <x-slot name="slot">
                This is a default alert — <b>check it out!</b>
            </x-slot>
        </x-alert>
    @endif
</div>
