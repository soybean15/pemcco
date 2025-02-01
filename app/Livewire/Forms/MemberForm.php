<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MemberForm extends Form
{
    #[Validate('required')]
    public $first_name;
    #[Validate('nullable')]
    public $middle_name;
    #[Validate('required')]
    public $last_name;
    #[Validate('nullable', 'email')]
    public $email;
    #[Validate('nullable')]
    public $phone_number;
    #[Validate('nullable')]
    public $telephone_number;
    #[Validate('nullable')]
    public $address;
    #[Validate('nullable', 'date')]
    public $birth_date;
    #[Validate('nullable')]
    public $religion;
    #[Validate('nullable')]
    public $civil_status;
    #[Validate('required')]
    public $occupation;
    #[Validate('nullable')]
    public $social_affiliation;
    #[Validate('nullable', 'numeric')]
    public $monthly_income;
    #[Validate('nullable', 'numeric')]
    public $annual_income;
    #[Validate('nullable')]
    public $tin;
    #[Validate('nullable')]
    public $sss;
    #[Validate('nullable')]
    public $phil_health;
    #[Validate('nullable')]
    public $pag_ibig;
    #[Validate('required')]
    public $membership_id;
    #[Validate('required', 'date')]
    public $membership_date;
    #[Validate('nullable')]
    public $membership_type;
    #[Validate('nullable')]
    public $status;

    public $user;

    public function setMember(User $member)
    {
        $this->user = $member;
        $profile = $member->profile;
        $government = $member->government;
        $membership = $member->membership;

        $this->first_name = $profile->first_name ?? null;
        $this->middle_name = $profile->middle_name ?? null;
        $this->last_name = $profile->last_name ?? null;
        $this->email = $member->email ?? null;
        $this->phone_number = $profile->phone_number ?? null;
        $this->telephone_number = $profile->telephone_number ?? null;
        $this->address = $profile->address ?? null;
        $this->birth_date = $profile->birth_date ?? null;
        $this->religion = $profile->religion ?? null;
        $this->civil_status = $profile->civil_status ?? null;
        $this->occupation = $profile->occupation_id ?? null;
        $this->social_affiliation = $profile->social_affiliation ?? null;
        $this->monthly_income = $profile->monthly_income ?? null;
        $this->annual_income = $profile->annual_income ?? null;

        $this->tin = $government->tin ?? null;
        $this->sss = $government->sss ?? null;
        $this->phil_health = $government->philhealth ?? null;
        $this->pag_ibig = $government->pagibig ?? null;

        $this->membership_id = $membership->membership_id ?? null;
        $this->membership_date = $membership->membership_date ?? null;
        $this->membership_type = $membership->membership_type ?? null;
        $this->status = $membership->status ?? null;
    }

    public function storeOrUpdateProfile($user)
    {
        $user->profile()->updateOrCreate([], [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'telephone_number' => $this->telephone_number,
            'address' => $this->address,
            'birth_date' => $this->birth_date,
            'religion' => $this->religion,
            'civil_status' => $this->civil_status,
            'occupation_id' => $this->occupation,
            'social_affiliation' => $this->social_affiliation,
            'monthly_income' => $this->monthly_income,
            'annual_income' => $this->annual_income,
        ]);
    }

    public function storeOrUpdateGovernment($user)
    {
        $user->government()->updateOrCreate([], [
            'tin' => $this->tin,
            'sss' => $this->sss,
            'philhealth' => $this->phil_health,
            'pagibig' => $this->pag_ibig,
        ]);
    }

    public function storeOrUpdateMembership($user)
    {
        $user->membership()->updateOrCreate([], [
            'membership_id' => $this->membership_id,
            'membership_date' => $this->membership_date,
            'membership_type' => $this->membership_type,
            'status' => $this->status,
        ]);
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            $user = User::create([
                'name' => trim("{$this->first_name} {$this->last_name}"),
                'email' => $this->email ?: fake()->unique()->safeEmail(),
                'password' => bcrypt('password'),
            ]);

            $this->storeOrUpdateProfile($user);
            $this->storeOrUpdateGovernment($user);
            $this->storeOrUpdateMembership($user);
        });
    }

    public function update()
    {
        $this->validate();

        DB::transaction(function () {
            $this->storeOrUpdateProfile($this->user);
            $this->storeOrUpdateGovernment($this->user);
            $this->storeOrUpdateMembership($this->user);
        });
    }
}
