<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MemberForm extends Form
{
    // Personal Information
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $telephone_number;
    public $address;
    public $birth_date;
    public $birth_place;
    public $religion;
    public $civil_status;
    public $citizenship;
    public $gender;
    
    // Spouse Information
    public $spouse_name;
    public $spouse_contact;
    
    // Parental Information
    public $father_name;
    public $father_occupation;
    public $father_contact;
    public $mother_name;
    public $mother_occupation;
    public $mother_contact;
    
    // Occupation & Income
    public $occupation;
    public $occupation_name;
    public $social_affiliation;
    public $monthly_income;
    public $annual_income;
    
    // Government IDs
    public $tin;
    public $sss;
    public $phil_health;
    public $pag_ibig;
    
    // Membership Details
    public $membership_id;
    public $membership_date;
    public $membership_type;
    public $status;
    public $termination_date;
    public $initial_capital_subscription;
    public $initial_paid_up_capital;
    public $subscribed_share_capital;

    protected function rules()
    {
        $emailRules = ['nullable', 'email'];

        if ($this->user) {
            if ($this->user->email !== $this->email) {
                $emailRules[] = Rule::unique('users')->ignore($this->user->id);
            }
        } else {
            $emailRules[] = 'unique:users,email';
        }

        return [
            // Personal Info Rules
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'email' => $emailRules,
            'phone_number' => ['nullable'],
            'telephone_number' => ['nullable'],
            'address' => ['nullable'],
            'birth_date' => ['nullable', 'date'],
            'birth_place' => ['nullable'],
            'religion' => ['nullable'],
            'civil_status' => ['nullable'],
            'citizenship' => ['nullable'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            
            // Spouse Info Rules
            'spouse_name' => ['nullable'],
            'spouse_contact' => ['nullable'],
            
            // Parental Info Rules
            'father_name' => ['nullable'],
            'father_occupation' => ['nullable'],
            'father_contact' => ['nullable'],
            'mother_name' => ['nullable'],
            'mother_occupation' => ['nullable'],
            'mother_contact' => ['nullable'],
            
            // Occupation & Income Rules
            'occupation' => ['nullable'],
            'social_affiliation' => ['nullable'],
            'monthly_income' => ['nullable', 'numeric'],
            'annual_income' => ['nullable', 'numeric'],
            
            // Government ID Rules
            'tin' => ['nullable'],
            'sss' => ['nullable'],
            'phil_health' => ['nullable'],
            'pag_ibig' => ['nullable'],
            
            // Membership Rules
            'membership_id' => ['required'],
            'membership_date' => ['required', 'date'],
            'membership_type' => ['required'],
            'status' => ['required'],
            'termination_date' => ['nullable', 'date'],
            'initial_capital_subscription' => ['nullable', 'numeric'],
            'initial_paid_up_capital' => ['nullable', 'numeric'],
            'subscribed_share_capital' => ['nullable', 'numeric'],
        ];
    }

    public $user;

    public function setMember(User $member)
    {
        $this->user = $member;
        $profile = $member->profile;
        $government = $member->government;
        $membership = $member->membership;

        // Personal Info
        $this->first_name = $profile->first_name ?? null;
        $this->middle_name = $profile->middle_name ?? null;
        $this->last_name = $profile->last_name ?? null;
        $this->email = $member->email ?? null;
        $this->phone_number = $profile->phone_number ?? null;
        $this->telephone_number = $profile->telephone_number ?? null;
        $this->address = $profile->address ?? null;
        $this->birth_date = $profile->birth_date ?? null;
        $this->birth_place = $profile->birth_place ?? null;
        $this->religion = $profile->religion ?? null;
        $this->civil_status = $profile->civil_status ?? null;
        $this->citizenship = $profile->citizenship ?? null;
        $this->gender = $profile->gender ?? null;
        
        // Spouse Info
        $this->spouse_name = $profile->spouse_name ?? null;
        $this->spouse_contact = $profile->spouse_contact ?? null;
        
        // Parental Info
        $this->father_name = $profile->father_name ?? null;
        $this->father_occupation = $profile->father_occupation ?? null;
        $this->father_contact = $profile->father_contact ?? null;
        $this->mother_name = $profile->mother_name ?? null;
        $this->mother_occupation = $profile->mother_occupation ?? null;
        $this->mother_contact = $profile->mother_contact ?? null;
        
        // Occupation & Income
        $this->occupation = $profile->occupation_id ?? null;
        $this->social_affiliation = $profile->social_affiliation ?? null;
        $this->monthly_income = $profile->monthly_income ?? null;
        $this->annual_income = $profile->annual_income ?? null;

        // Government IDs
        $this->tin = $government->tin ?? null;
        $this->sss = $government->sss ?? null;
        $this->phil_health = $government->philhealth ?? null;
        $this->pag_ibig = $government->pagibig ?? null;

        // Membership Details
        $this->membership_id = $membership->membership_id ?? null;
        $this->membership_date = $membership->membership_date ?? null;
        $this->membership_type = $membership->membership_type ?? null;
        $this->status = $membership->status ?? null;
        $this->termination_date = $membership->termination_date ?? null;
        $this->initial_capital_subscription = $membership->initial_capital_subscription ?? null;
        $this->initial_paid_up_capital = $membership->initial_paid_up_capital ?? null;
        $this->subscribed_share_capital = $membership->subscribed_share_capital ?? null;

        $this->occupation_name = $profile->occupation->name ?? null;
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
            'birth_place' => $this->birth_place,
            'religion' => $this->religion,
            'civil_status' => $this->civil_status,
            'citizenship' => $this->citizenship,
            'gender' => $this->gender,
            'spouse_name' => $this->spouse_name,
            'spouse_contact' => $this->spouse_contact,
            'father_name' => $this->father_name,
            'father_occupation' => $this->father_occupation,
            'father_contact' => $this->father_contact,
            'mother_name' => $this->mother_name,
            'mother_occupation' => $this->mother_occupation,
            'mother_contact' => $this->mother_contact,
            'occupation_id' => $this->occupation,
            'social_affiliation' => $this->social_affiliation,
            'monthly_income' => $this->monthly_income,
            'annual_income' => $this->annual_income,
        ]);

        $this->occupation_name = $user->profile->occupation->name ?? null;
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
            'termination_date' => $this->termination_date,
            'initial_capital_subscription' => $this->initial_capital_subscription,
            'initial_paid_up_capital' => $this->initial_paid_up_capital,
            'subscribed_share_capital' => $this->subscribed_share_capital,
        ]);
    }

    // Rest of the class remains the same...
    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            try{
$user = User::create([
                'name' => trim("{$this->first_name} {$this->last_name}"),
                'email' => $this->email ?? null,
                'password' => bcrypt('password'),
            ]);

            $this->storeOrUpdateProfile($user);

            // $this->validate(['occupation_name'=>'required']);
            $this->storeOrUpdateGovernment($user);
            $this->storeOrUpdateMembership($user);
            // dd('here');
            }  catch(Exception $e){
                // dd($e);
            }
          
        });
    }

    public function update()
    {
        $this->validate();

        DB::transaction(function () {
            $this->user->update([
                'name' => trim("{$this->first_name} {$this->last_name}"),
                'email' => $this->email ?? null,
            ]);
            $this->storeOrUpdateProfile($this->user);
            $this->storeOrUpdateGovernment($this->user);
            $this->storeOrUpdateMembership($this->user);
        });
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}