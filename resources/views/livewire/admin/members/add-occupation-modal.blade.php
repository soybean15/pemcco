<div>
    <x-modal name="add-occupation" x-data x-on:close-modal.window=" $closeModal('add-occupation') ">
        <x-card title="Add Occupation" class="p-4 " class="w-full">
            <div class="space-y-4">
                <x-input label="Occupation Name" wire:model="name" required />

             
                <x-native-select label="Industry" wire:model="industry" required>
                    <option value="">Select Industry</option>
                    @foreach($this->industries as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </x-native-select>

                <x-button label="Save" wire:click="save" success />
            </div>
        </x-card>
    </x-modal>
</div>
