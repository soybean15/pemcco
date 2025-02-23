<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\MemberForm;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\dd;

class Members extends Component
{
    public MemberForm $form;
    public function render()
    {
        return view('livewire.admin.members');
    }
    public function mount(){
        // $users = User::doesntHave('membership')->get();

       
        // $users->each(function($user){
        //     $this->form->setMember($user);

        //     dd($user);
        //     $this->form->update();
        // });

     
    }
}
