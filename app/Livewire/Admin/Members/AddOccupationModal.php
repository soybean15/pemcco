<?php

namespace App\Livewire\Admin\Members;

use App\Enums\OccupationIndustryEnum;
use App\Models\Occupation;
use Livewire\Attributes\Computed;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class AddOccupationModal extends Component
{

    use WireUiActions;
    public $name;
    public $industry;
    public function render()
    {
        return view('livewire.admin.members.add-occupation-modal');
    }

    #[Computed]
    public function industries(){
       return OccupationIndustryEnum::labels();
    }

    public function save(){
      
        $this->validate([
            'name' => 'required',
            'industry' => 'required'
        ]);

        try{
            Occupation::create([
                'name' => $this->name,
                'industry' => $this->industry
            ]);

            $this->dispatch('close-modal');
            $this->dialog()->show([
                'icon' => 'success',
                'title' => 'Success',
                'description' => 'Occupation Saved!',
            ]);
        }catch(\Exception $e){

            $this->dialog()->show([
                'icon' => 'error',
                'title' => 'Success',
                'description' => $e->getMessage(),
            ]);
        }
       
    }
}
