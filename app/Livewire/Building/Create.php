<?php

namespace App\Livewire\Building;

use App\Models\Building;
use Livewire\Component;

class Create extends Component
{
    public  Building $building;

    protected function rules(): array
    {
        return [
            'building.name' => ['required', 'string', 'max:255'],
            'building.number_of_floor' => ['required', 'numeric'],
            'building.road' => ['nullable', 'string', 'max:255'],
            'building.area' => ['nullable',  'string', 'max:255'],
            'building.address' => ['nullable',  'string', 'max:255'],
            'building.holding' => ['nullable',  'string', 'max:255'],
            'building.type' => ['required',  'string', 'max:255'],
            'building.gs_authority_id' => ['required',  'numeric'],
            'building.manager_id' => ['required',  'numeric'],
            'building.special_rate_radio' => ['nullable',  'string', 'max:255'],
            'building.special_rate' => ['nullable',  'numeric'],
        ];
    }

    public function render()
    {
        return view('livewire.building.create');
    }

    public function mount(Building $building)
    {
        $this->building = $building;
    }

    public function createBuilding(){
        $this->validate();
        $this->building->save();
        session()->flash('message', 'Building successfully updated.');

    }





}
