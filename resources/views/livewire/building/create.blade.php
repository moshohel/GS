<div class="main-panel">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Building</h4>
                        @include('livewire.components.building')
                    </div>
                </div>
                <br>
                @for($i=0; $i< $building->number_of_floor; $i++)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Floor {{$i+1}}</h5>
                            <livewire:floor.create :floor_number=$i :wire:key=$i></livewire:floor.create>
                        </div>
                    </div>
                    <br>
                @endfor
                <br>
            </div>
        </div>
    </div>
</div>
