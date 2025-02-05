<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MemberForm extends Form
{

    public $first_name;

    public $middle_name;

    public $last_name;

    public $email;

    public $phone_number;

    public $telephone_number;

    public $address;

    public $birth_date;

    public $religion;

    public $civil_status;

    public $occupation;

    public $social_affiliation;

    public $monthly_income;

    public $annual_income;

    public $tin;

    public $sss;

    public $phil_health;

    public $pag_ibig;

    public $membership_id;

    public $membership_date;

    public $membership_type;

    public $status;

    protected function rules()
    {
        $emailRules = ['required', 'email'];

        if ($this->user) {
            // If the email has changed, apply the unique rule (ignoring the current user's record)
            if ($this->user->email !== $this->email) {
                $emailRules[] = Rule::unique('users')->ignore($this->user->id);
               
            }
            // If the email is unchanged, no need to validate uniqueness
        } else {
            // In case $this->user is not set (likely a new record), always validate uniqueness
            $emailRules[] = 'unique:users,email';
            // dd('not skip',$this->user->email,$this->email);

        }

        return [
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'email' => $emailRules,
            'phone_number' => ['nullable'],
            'telephone_number' => ['nullable'],
            'address' => ['nullable'],
            'birth_date' => ['nullable', 'date'],
            'religion' => ['nullable'],
            'civil_status' => ['nullable'],
            'occupation' => ['required'],
            'social_affiliation' => ['nullable'],
            'monthly_income' => ['nullable', 'numeric'],
            'annual_income' => ['nullable', 'numeric'],
            'tin' => ['nullable'],
            'sss' => ['nullable'],
            'phil_health' => ['nullable'],
            'pag_ibig' => ['nullable'],
            'membership_id' => ['required'],
            'membership_date' => ['required', 'date'],
            'membership_type' => ['nullable'],
            'status' => ['nullable'],
        ];
    }


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


    public function delete(User $user){
        $user->delete();
    }
}
