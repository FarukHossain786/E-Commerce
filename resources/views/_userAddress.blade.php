<div class="row">
    @csrf
    <div class="col-lg-9">
        <div class="form-group row">
            <div class="col-sm-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-sm-12">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
            </div>
            <div class="col-sm-12 col-md-6">
                <label class="form-control-label">Name: </label>
                <input type="text" id="txturl" name="name" class="form-control " value="{{old('name')}}" />
            </p>
        </div>
        <div class="col-sm-12 col-md-6">
            <label class="form-control-label">Email: </label>
            <input type="text" id="email" name="email" class="form-control " value="{{old('email')}}" />

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 col-md-6">
            <label class="form-control-label">Password: </label>
            <input type="password" id="password" name="password" class="form-control " value="" />

        </div>
        <div class="col-sm-12 col-md-6">
            <label class="form-control-label">Re-Type Password: </label>
            <input type="password" id="password_confirm" name="password_confirm" class="form-control " value="" />

        </div>
    </div>
    <div class="row">
        <h4 class="title">Address</h4>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <label class="form-control-label">Land Mark: </label>
            <input type="text" id="address" name="address" class="form-control " value="{{old('address')}}" />

        </div>
        <div class="col-sm-12 col-md-6">
            <label class="form-control-label">PIN </label>
            <input type="text" id="pin" name="pin" class="form-control " value="{{old('pin')}}" />

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 col-md-3">
            <label class="form-control-label">Country: </label>
            <div class="input-group mb-3">
                <select name="country_id" class="form-control" value="" id="country_id" onchange="getState(this.value)">
                    <option value="0">Select a Country</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <label class="form-control-label">State: </label>
            <div class="input-group mb-3">
                <select name="state_id" class="form-control" id="states" onchange="getCity(this.value)">
                    <option value="0">Select a State</option>
                </select>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <label class="form-control-label">City: </label>
            <div class="input-group mb-3">
                <select name="city_id" class="form-control" id="cities">
                    <option value="0">Select City</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <label class="form-control-label">Phone: </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{old('phone')}}" />
            </div>
        </div>
    </div>
</div>