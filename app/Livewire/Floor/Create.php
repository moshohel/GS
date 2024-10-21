<?php

namespace App\Livewire\Floor;

use App\Models\Building;
use App\Models\Floor;
use Cassandra\Function_;
use Livewire\Component;

class Create extends Component
{
    public  Building $building;
    public  Floor $floor;

    protected function rules(): array
    {
        return [
            'floor.number' => ['required', 'numeric'],
            'floor.name' => ['required', 'string', 'max:255'],
            'floor.number_of_flats' => ['required', 'numeric'],
            'floor.type' => ['required',  'string', 'max:255'],
            'floor.status' => ['nullable',  'string', 'max:255'],
        ];
    }


    public function render()
    {
        return view('livewire.floor.create');
    }

    public function mount(Building $building, $floor_number)
    {
        $this->building = $building;
        $this->floor = new Floor();
        $this->floor->floor_number = $floor_number;
    }


    public function save()
    {
        $this->validate();
        $this->building->floors()->save($this->floor);
        session()->flash('message', 'Building successfully updated.');

    }
}
