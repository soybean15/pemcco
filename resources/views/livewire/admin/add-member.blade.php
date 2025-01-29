<div class="space-y-6">
    <x-header title="Add Member" subtitle="Fill in the required information to register a new member" />

    <x-card title="Member Information" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Personal Information -->
            <div class="space-y-4">
                <x-input label="First Name *" wire:model="form.first_name" />
                <x-input label="Middle Name" wire:model="form.middle_name" />
                <x-input label="Last Name *" wire:model="form.last_name" />
                <x-datetime-picker label="Birthdate" wire:model="form.birth_date" without-time />
            </div>

            <!-- Contact Information -->
            <div class="space-y-4">
                <x-input label="Email" wire:model="form.email"  />
                <x-input label="Mobile Number" wire:model="form.phone_number" />
                <x-input label="Telephone Number" wire:model="form.telephone_number" />
                <x-textarea label="Address" wire:model="form.address" rows="1" />
            </div>
        </div>
    </x-card>

    <x-card title="Employment & Income" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-4">
                <x-input label="Occupation *" wire:model="form.occupation" />
                <x-input label="Social Affiliation" wire:model="form.social_affiliation" />
            </div>
            <div class="space-y-4">
                <x-input label="Monthly Income" wire:model="form.monthly_income" type="number" icon="currency-dollar" />
                <x-input label="Annual Income" wire:model="form.annual_income" type="number" icon="currency-dollar" />
            </div>
        </div>
    </x-card>

    <x-card title="Government IDs" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-input label="TIN Number" wire:model="form.tin_number" />
            <x-input label="SSS Number" wire:model="form.sss_number" />
            <x-input label="PhilHealth Number" wire:model="form.phil_health_number" />
            <x-input label="Pag-IBIG Number" wire:model="form.pag_ibig_number" />
        </div>
    </x-card>

    <x-card title="Membership Details" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-4">
                <x-input label="Membership ID" wire:model="form.membership_id" />
                <x-datetime-picker label="Membership Date" wire:model="form.membership_date" without-time />
            </div>
            <div class="space-y-4">
                <x-native-select label="Membership Type" wire:model="form.membership_type" :options="[
                    ['name' => 'Regular',  'value' => 'regular'],
                    ['name' => 'Associate', 'value' => 'associate'],
                    ['name' => 'VIP', 'value' => 'vip'],
                ]" option-label="name" option-value="value" />
                <x-native-select label="Status" wire:model="form.status" :options="[
                    ['name' => 'Active', 'value' => 'active'],
                    ['name' => 'Inactive', 'value' => 'inactive'],
                    ['name' => 'Suspended', 'value' => 'suspended'],
                ]"  option-label="name" option-value="value" />
            </div>
        </div>
    </x-card>

    <div class="flex justify-end gap-2">
        <x-button secondary label="Cancel" />
        <x-button primary label="Save Member" wire:click="save" spinner="save" />
    </div>
</div>
