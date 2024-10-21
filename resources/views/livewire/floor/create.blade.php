<form wire:submit.prevent="save" class="form-sample">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Floor Name</label>
                <div class="col-sm-9">
                    <input type="text" wire.model="floor.name" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Number Of Flats/Units</label>
                <div class="col-sm-9">
                    <input type="number" wire.model="floor.number_of_flats" class="form-control"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Floor Type</label>
                <div class="col-sm-9">
                    @php($items = [null=>'Select', 'Hospital'=>'Hospital', 'Educational'=>'Educational', 'Office'=>'Commercial(Office)', 'Retail'=>'Commercial(Reatail)', 'Residential'=>'Residential'])
                    <select wire:model="floor.type" class="form-control">
                        @foreach ($items as $value => $label)
                            <option value="{{$value}}" {{($floor->type == $value) ? 'selected' : ''}}>
                                {{$label}}
                            </option>
                        @endforeach
                    </select>
                    @error('floor.type')
                    <span class="error">{{ $errors->first('floor.type') }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <div class="col-sm-9">
                        @php($items = [null=>'Select', 'Active'=>'Active', 'Inactive'=>'Inactive', 'UnderConstruction'=>'Under Construction'])
                        <select wire:model="floor.status" class="form-control">
                            @foreach ($items as $value => $label)
                                <option value="{{$value}}" {{($floor->status == $value) ? 'selected' : ''}}>
                                    {{$label}}
                                </option>
                            @endforeach
                        </select>
                        @error('floor.status')
                        <span class="error">{{ $errors->first('floor.status') }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
</form>
