<?php

namespace App\Livewire\Admin;

use App\Models\UserMembership;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard');
    }

        #[Computed()]
        public function activeCount(){
         return UserMembership::active()->count();
        }

        #[Computed()]
        public function inactiveCount(){
         return UserMembership::inactive()->count();
        }

        #[Computed()]
        public function terminatedCount(){
         return UserMembership::terminated()->count();
        }
}
