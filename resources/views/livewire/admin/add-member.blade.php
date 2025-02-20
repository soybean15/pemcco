<div class="space-y-6">
    <x-alerts/>
    <x-header title="Member Profile" subtitle="Fill in the required information to register a new member" info>
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
                <x-native-select label="Membership Type *" wire:model="form.membership_type" placeholder="Select Type" :options="[
                    ['name' => 'Regular',  'value' => 'regular'],
                    ['name' => 'Associate', 'value' => 'associate'],
                ]" option-label="name" option-value="value" required />
                <x-native-select placeholder="Select Status"  label="Status" wire:model="form.status" :options="[
                    ['name' => 'Active', 'value' => 'active'],
                    ['name' => 'Inactive', 'value' => 'inactive'],
                    ['name' => 'Terminated', 'value' => 'terminated'],
                ]" option-label="name" option-value="value" />
                <x-datetime-picker label="Termination Date" wire:model="form.termination_date" without-time />
            </div>
        </div>
    </x-card>

    <x-card title="Financial Information" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <x-input label="Initial Capital Subscription" wire:model="form.initial_capital_subscription" type="number" prefix="₱" step="0.01" />
            <x-input label="Initial Paid Up Capital" wire:model="form.initial_paid_up_capital" type="number" prefix="₱" step="0.01" />
            <x-input label="Subscribed Share Capital" wire:model="form.subscribed_share_capital" type="number" prefix="₱" step="0.01" />
        </div>
    </x-card>

    <x-card title="Member Information" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-4">
                <x-input label="First Name *" wire:model="form.first_name" required />
                <x-input label="Middle Name" wire:model="form.middle_name" />
                <x-input label="Last Name *" wire:model="form.last_name" required />
                <x-datetime-picker label="Birthdate" wire:model="form.birth_date" without-time />
                <x-input label="Birth Place" wire:model="form.birth_place" />
                <x-input label="Citizenship" wire:model="form.citizenship" />
                <x-native-select label="Civil Status" wire:model="form.civil_status" :options="['Single', 'Married', 'Separated']" />
            </div>
            <div class="space-y-4">
                <x-native-select label="Gender" wire:model="form.gender" :options="['Male', 'Female', 'Other']" />
                <x-input label="Email" wire:model="form.email" />
                <x-input label="Mobile Number" wire:model="form.phone_number" />
                <x-input label="Telephone Number" wire:model="form.telephone_number" />
            
                <x-input label="Religion" wire:model="form.religion" />
                <x-textarea label="Address" wire:model="form.address" rows="1" />
            </div>
        </div>
    </x-card>

    <x-card title="Family Members" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-4">
                <x-input label="Spouse Name" wire:model="form.spouse_name" />
                <x-input label="Spouse Contact" wire:model="form.spouse_contact" />
                <x-input label="Spouse Occupation" wire:model="form.social_affiliation" />
            </div>
            <div class="space-y-4">
                <x-input label="Father's Name" wire:model="form.father_name" />
                <x-input label="Father's Occupation" wire:model="form.father_occupation" />
                <x-input label="Father's Contact" wire:model="form.father_contact" />
            </div>
            <div class="space-y-4">
                <x-input label="Mother's Name" wire:model="form.mother_name" />
                <x-input label="Mother's Occupation" wire:model="form.mother_occupation" />
                <x-input label="Mother's Contact" wire:model="form.mother_contact" />
            </div>
        </div>
    </x-card>

    <x-card title="Employment & Income" class="mb-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

            <div class="space-y-4" x-data="{ edit: @entangle('form.occupation') == null || @entangle('form.occupation') == '' }">

                <div class="flex items-end gap-2">
                    <!-- Display label with Pencil icon -->
                    <template x-if="!edit">
                        <div class="flex items-center gap-2 w-full transition-all duration-300">
                            <x-input class="w-full"
                                label="Occupation"
                                wire:model='form.occupation_name'
                                readonly
                                {{-- right-icon="pencil" --}}
                                x-on:click="edit = true"
                                placeholder="Your Occupation" />
                        </div>
                    </template>
            
                    <!-- Display select dropdown -->
                    <template x-if="edit">
                        <div class="w-full transition-all duration-300">
                            <x-select wire:model="form.occupation"
                                label="Search Occupation"
                                placeholder="Select an occupation"
                                :async-data="route('api.occupations', ['keyword' => $form->occupation])"
                                option-label="name"
                                option-value="id"
                                required
                                :selected="$form->occupation" />
                        </div>
                    </template>
            
                    <!-- Toggle Edit Button (Pencil <-> X) -->
                    <template x-if="!edit">
                        <x-mini-button x-on:click="edit = true" icon="pencil" primary rounded />
                    </template>
                    
                    <template x-if="edit">
                        <x-mini-button x-on:click="edit = false" icon="x-mark" primary rounded />
                    </template>
            
                    <x-button label="Add" x-on:click="$openModal('add-occupation')" success />
                </div>
            
                <x-input label="Monthly Income" wire:model="form.monthly_income" type="number"  prefix="₱" step="0.01" />
              
            </div>
            
            
            <div class="space-y-4">
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


    <livewire:admin.members.add-occupation-modal/>
</div>
