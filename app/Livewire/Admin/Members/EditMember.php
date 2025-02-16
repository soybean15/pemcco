<?php
namespace App\Livewire\Admin\Members;



use App\Livewire\Forms\MemberForm;
use App\Models\Occupation;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class   EditMember extends AddMember
{



    public function render()
    {
        return view('livewire.admin.add-member');
    }

    public function mount(User $member){

        $this->form->setMember($member);
}

    public function save(){
        // dd($this->form);

        $this->form->update();

        session()->flash('success', 'Member details have been updated.');

    }
}
