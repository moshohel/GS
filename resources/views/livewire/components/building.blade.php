<form wire:submit.prevent="createBuilding" class="form-sample">
    {{csrf_field()}}
    <p class="card-description">
        Building Information
    </p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Building Name <span class="error">*</span></label>
                <div class="col-sm-9">
                    <input wire:model="building.name"
                           @error('building.name') class="form-control form-error"
                           @enderror class="form-control">
                    @error('building.name')
                    <span class="error">{{ $errors->first('building.name') }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Number of Floor <span class="error">*</span></label>
                <div class="col-sm-9">
                    <input wire:model="building.number_of_floor"
                           @error('building.number_of_floor') class="form-control form-error"
                           @enderror class="form-control">
                    @error('building.number_of_floor')
                    <span class="error">{{ $errors->first('building.number_of_floor') }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Road Name</label>
                <div class="col-sm-9">
                    <input wire:model="building.road"
                           @error('building.road') class="form-control form-error"
                           @enderror class="form-control">
                    @error('building.road')
                    <span class="error">{{ $errors->first('building.road') }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Area</label>
                <div class="col-sm-9">
                    <input wire:model="building.area"
                           @error('building.area') class="form-control form-error"
                           @enderror class="form-control">
                    @error('building.area')
                    <span class="error">{{ $errors->first('building.area') }}</span>
                    @enderror
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Address </label>
                <div class="col-sm-9">
                    <input wire:model="building.address"
                           @error('building.address') class="form-control form-error"
                           @enderror class="form-control">
                    @error('building.address')
                    <span class="error">{{ $errors->first('building.address') }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Holding Number</label>
                <div class="col-sm-9">
                    <input wire:model="building.holding"
                           @error('building.holding') class="form-control form-error"
                           @enderror class="form-control">
                    @error('building.holding')
                    <span class="error">{{ $errors->first('building.holding') }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Type <span class="error">*</span></label>
                <div class="col-sm-9">
                    @php($items = [null=>'Select', 'Individual'=>'Individual','Hospital'=>'Hospital', 'Educational'=>'Educational', 'Commercial'=>'Commercial', 'Residential'=>'Residential', 'Mix'=>'Mix'])
                    <select wire:model="building.type" class="form-control">
                        @foreach ($items as $value => $label)
                            <option value="{{$value}}" {{($building->type == $value) ? 'selected' : ''}}>
                                {{$label}}
                            </option>
                        @endforeach
                    </select>
                    @error('building.type')
                    <span class="error">{{ $errors->first('building.type') }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">GS Authority <span class="error">*</span></label>
                <div class="col-sm-9">
                    @php($items = array_merge( [null=>'select'] , App\Models\User::all()->pluck('name','id')->toArray()) )
                    <select wire:model="building.gs_authority_id"
                            @error('building.gs_authority_id') class="form-control form-error"
                            @enderror  class="form-control">
                        @foreach ($items as $value => $label)
                            <option value="{{$value}}" {{($building->type == $value) ? 'selected' : ''}}>
                                {{$label}}
                            </option>
                        @endforeach
                    </select>
                    @error('building.gs_authority_id')
                    {{ $errors->first('building.gs_authority_id') }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Manager <span class="error">*</span></label>
                <div class="col-sm-9">
                    @php($items = array_merge( [null=>'select'] , App\Models\User::all()->pluck('name','id')->toArray()) )
                    <select wire:model="building.manager_id" class="form-control">
                        @foreach ($items as $value => $label)
                            <option value="{{$value}}" {{($building->type == $value) ? 'selected' : ''}}>
                                {{$label}}
                            </option>
                        @endforeach
                    </select>
                    @error('building.manager_id')
                    {{ $errors->first('building.manager_id') }}
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Apply Special Rate </label>
                <div class="col-sm-4">
                    <div class="form-check">
                            <input wire:model.live="building.special_rate_radio" type="radio"
                                   name="special_rate_radio" class="form-check-input" value="no">
                            NO

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-check">

                            <input wire:model.live="building.special_rate_radio" type="radio"
                                   name="special_rate_radio" class="form-check-input" value="yes">
                            YES
                    </div>
                </div>
            </div>
        </div>
        @if($building->special_rate_radio == 'yes')
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Special Rate </label>
                    <div class="col-sm-9">
                        <input wire:model="building.special_rate" placeholder="Special Rate"
                               @error('building.special_rate') class="form-control form-error"
                               @enderror class="form-control">
                        @error('building.special_rate')
                        <span class="error">{{ $errors->first('building.special_rate') }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="form-group text-center">
        <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
</form>
