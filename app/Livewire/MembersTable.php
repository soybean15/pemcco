<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;

use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class MembersTable extends PowerGridComponent
{
    public string $tableName = 'members-table-d3sanw-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [


            PowerGrid::header()
            ->showToggleColumns()
                ->showSearchInput()

                ->withoutLoading(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query()
            ->with(['membership', 'profile', 'profile.occupation'])
            ->whereHas('membership')
            ->whereHas('profile');
          
    }
    
    

    public function relationSearch(): array
    {
        return [
            'profile.occupation'=>['name'], // Correct relation path
            'membership'=>['membership_id'] // Correct relation path
        ];


    }




    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('membership_id', fn (User $user) => $user->membership->membership_id)
            ->add('name')
            ->add('email')
            ->add('occupation')

            ->add('occupation',fn (User $user) => $user->profile->occupation->name)
            // ->add('status', fn (User $user) => $user->membership->status)
            ->add('name')
            ->add('status', function ($row) {
                // Determine badge class and label based on status
                // Determine badge class and label based on status
            switch (strtolower($row->membership->status)) {
                case 'active':
                    $badge_class = 'bg-green-100 border border-green-500 text-green-700 px-3 py-1 rounded-full font-semibold text-sm';
                    $status_label = 'Active';
                    break;
                case 'inactive':
                    $badge_class = 'bg-red-100 border border-red-500 text-red-700 px-3 py-1 rounded-full font-semibold text-sm';
                    $status_label = 'Inactive';
                    break;
                case 'suspended':
                    $badge_class = 'bg-yellow-100 border border-yellow-500 text-yellow-700 px-3 py-1 rounded-full font-semibold text-sm';
                    $status_label = 'Suspended';
                    break;
                case 'terminated':
                    $badge_class = 'bg-gray-100 border border-gray-500 text-gray-700 px-3 py-1 rounded-full font-semibold text-sm';
                    $status_label = 'Terminated';
                    break;
                default:
                    $badge_class = 'bg-gray-100 border border-gray-500 text-gray-700 px-3 py-1 rounded-full font-semibold text-sm';
                    $status_label = 'Unknown';
                    break;
            }


                // Return data for the row template
                return [
                    'status_badge'=>[
                        'badge_class' => $badge_class,
                        'status_label' => $status_label,
                    ]

                ];
            })
            ->add('membership_date', fn (User $user) => Carbon::parse($user->membership->membership_date)->format('M d, Y'));

            ;

    }

    public function rowTemplates(): array
    {
        return [
            'status_badge' => '<span class="badge  {{ badge_class }}">{{ status_label }}</span>',
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'membership_id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Occupation', 'occupation',  ) // Reference the relationship column


                ->searchable() // Enable searching

              ,

              Column::make('Member since', field: 'membership_date'),


            Column::make('Status', 'status')->template() ,



            Column::action('Action')
        ];
    }



    public function filters(): array
    {
        return [

        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('bg-info-100 hover:bg-info-300 text-info-400 font-bold py-1 px-3 rounded dark:bg-blue-600 dark:hover:bg-blue-800')
                ->route('admin.edit-member', ['member' => $row->id], '_blank'),

            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->dispatch('delete-member',['member'=>$row->id])
                ->class('bg-negative-100 hover:bg-negative-400 hover:text-white text-negative-400 font-bold py-1 px-3 rounded dark:bg-red-600 dark:hover:bg-red-800'),
        ];
    }

    #[On('delete-member')]
    public function deleteMember(User $member): void
    {
        $this->js("
            if (confirm('Are you sure?')) {
                // Dispatch a browser event
                window.dispatchEvent(new CustomEvent('delete-member-confirmed', {
                    detail: { userId: {$member->id} }
                }));
            }
        ");
    }

    // Listen for the browser event
    #[On('delete-member-confirmed')]
    public function deleteMemberConfirmed($userId): void
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            $this->dispatch('member-deleted');
        }
    }


    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
