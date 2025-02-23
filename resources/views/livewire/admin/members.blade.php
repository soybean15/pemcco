<div>
    <x-header title="Members">
     
        <x-slot name="end">
            <x-button icon="plus-circle"  light primary label="Add Member" :href="route('admin.add-member')"/>

        </x-slot>
    </x-header>

   <livewire:members-table/>
</div>
