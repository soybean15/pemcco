<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Models\UserProfile;
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


    public function storeProfile($user )
    {
        $user->profile()->create([
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

    public function storeGovernment($user)
    {
        $user->government()->create([
            'tin' => $this->tin,
            'sss' => $this->sss,
            'philhealth' => $this->phil_health,
            'pagibig' => $this->pag_ibig,
        ]);
    }

    public function storeMembership($user)
    {
        $user->membership()->create([
            'membership_id' => $this->membership_id,
            'membership_date' => $this->membership_date,
            'membership_type' => $this->membership_type,
            'status' => $this->status,
        ]);
    }

    public function store()
    {
        // dd($this);
        $this->validate();


        $user = User::create([
            'name' => fake()->userName,
            'email' => !empty(trim($this->email)) ? $this->email : fake()->safeEmail(),

            'password' => bcrypt('password'),
        ]);
        $this->storeProfile($user);
        $this->storeGovernment($user);
        $this->storeMembership($user);

        // session()->flash('message', 'Member information saved successfully.');
    }
}
