<div class="space-y-6">
    <x-alerts/>
    <x-header title="Add Member" subtitle="Fill in the required information to register a new member" info>

        <x-slot name="end">
            <div class="flex justify-end gap-2">
                <x-button secondary label="Back to List" href="{{ route('admin.members') }}"/>
                <x-button primary label="Save" wire:click="save" spinner="save" />
            </div>
        </x-slot>
    </x-header>

    <x-card title="Membership Details" class="mb-6">


        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-4">
                <x-input label="Membership ID *" wire:model="form.membership_id" required />
                <x-datetime-picker label="Membership Date *" wire:model="form.membership_date" without-time required />
            </div>
            <div class="space-y-4">
                <x-native-select label="Membership Type *" wire:model="form.membership_type" :options="[
                    ['name' => 'Regular',  'value' => 'regular'],
                    ['name' => 'Associate', 'value' => 'associate'],

                ]" option-label="name" option-value="value" required />
                <x-native-select label="Status" wire:model="form.status" :options="[
                    ['name' => 'Active', 'value' => 'active'],
                    ['name' => 'Inactive', 'value' => 'inactive'],
                    ['name' => 'Terminated', 'value' => 'terminated'],
                ]"  option-label="name" option-value="value" />
            </div>
        </div>
    </x-card>
    <x-card title="Member Information" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Personal Information -->
            <div class="space-y-4">
                <x-input label="First Name *" wire:model="form.first_name" required />
                <x-input label="Middle Name" wire:model="form.middle_name" />
                <x-input label="Last Name *" wire:model="form.last_name" required />
                <x-datetime-picker label="Birthdate" wire:model="form.birth_date" without-time />
            </div>

            <!-- Contact Information -->
            <div class="space-y-4">
                <x-input label="Email" wire:model="form.email"  />
                <x-input label="Mobile Number" wire:model="form.phone_number" />
                <x-input label="Telephone Number" wire:model="form.telephone_number" />
                <x-textarea label="Address" wire:model="form.address" rows="2" />
            </div>
        </div>
    </x-card>

    <x-card title="Employment & Income" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-4">

                <x-select
                wire:model="form.occupation"  label="Occupation *"
                label="Search Occupation"
                placeholder="Select some user"
                :async-data="route('api.occupations', ['keyword' =>$form->occupation])"
                option-label="name"
                option-value="id"
                required
            />

                <x-input label="Social Affiliation" wire:model="form.social_affiliation" />
            </div>
            <div class="space-y-4">
                <x-input label="Monthly Income" wire:model="form.monthly_income" type="number"  prefix="₱" step="0.01" />
                <x-input label="Annual Income" wire:model="form.annual_income" type="number" prefix="₱" step="0.01" />
            </div>

        </div>
    </x-card>

    <x-card title="Government IDs" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-input label="TIN Number" wire:model="form.tin" />
            <x-input label="SSS Number" wire:model="form.sss" />
            <x-input label="PhilHealth Number" wire:model="form.phil_health" />
            <x-input label="Pag-IBIG Number" wire:model="form.pag_ibig" />
        </div>
    </x-card>

</div>
