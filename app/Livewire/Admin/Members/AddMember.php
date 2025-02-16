<?php

namespace App\Livewire\Admin\Members;

use App\Livewire\Forms\MemberForm;
use App\Models\Occupation;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AddMember extends Component
{

    public MemberForm $form;

    public function render()
    {
        return view('livewire.admin.add-member');
    }



    public function save(){
        // dd($this->form);

        $this->form->store();
    }
}
