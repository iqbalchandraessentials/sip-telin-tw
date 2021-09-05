<div class="card card-custom card-border mb-8">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-plus-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                Form Activation
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="pic">P.I.C:</label>
                    <select class="form-control selectpicker" id="picActivation" name="picActivation"
                        disabled="disabled">
                        <option value="{{ $customerIdentity['create_by'] }}">
                            {{ $customerIdentity['create_by'] }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>MSISDN(TW)
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-phone"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Input MSISDN(TW)" name="msisdn_tw"
                            id="msisdn_tw" />
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>MSISDN(ID)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-phone"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Autofilled MSISDN(ID)" name="msisdn_id"
                            id="msisdn_id" disabled />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>ID:</label>
                    <div class="input-group">
                        <select class="form-control selectpicker" name="id_type" id="id_type">
                            @foreach ($types as $type)
                                <option value="{{ $type }}"
                                    {{ $type == $customerIdentity['id_type'] ? 'selected' : '' }}>
                                    {{ strtoupper($type) }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" placeholder="Input ID Number" name="id_number"
                            id="id_number" />
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Expired Date (YYYY-MM-DD)" name="expdate"
                            id="expdate" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group">
                        <select class="form-control selectpicker" name="id_type" id="id_type">
                            @foreach ($types as $type)
                                <option value="{{ $type }}" {{ $type == 'arc' ? 'selected' : '' }}>
                                    {{ strtoupper($type) }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" placeholder="Input ID Number" name="id_number"
                            id="id_number" />
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Expired Date (YYYY-MM-DD)" name="expdate"
                            id="expdate" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group">
                        <select class="form-control selectpicker" name="id_type" id="id_type">
                            @foreach ($types as $type)
                                <option value="{{ $type }}" {{ $type == 'taiwan id' ? 'selected' : '' }}>
                                    {{ strtoupper($type) }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" placeholder="Input ID Number" name="id_number"
                            id="id_number" />
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Expired Date (YYYY-MM-DD)" name="expdate"
                            id="expdate" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Address:</label>
                    <div class="input-group">
                        <select class="form-control select2" data-live-search="true" name="city" id="city">
                            {{--  --}}
                        </select>
                        <select class="form-control select2" data-live-search="true" name="district" id="district">
                            <option value=""> Select City </option>
                        </select>
                        <input type="text" class="form-control" placeholder="Input Address" name="address"
                            id="address" />
                        <div class="input-group-prepend">
                            <button class="btn btn-secondary" type="button" disabled="disabled">POST CO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Other Phone</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-phone"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Input Other Phone" name="other_phone"
                            id="other_phone" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Activation Date:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="activationDate"
                            id="activationDate" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender
                        <span class="text-danger">*</span>
                    </label>
                    <div class="radio-list">
                        <label class="radio">
                            <input type="radio" name="gender" value="P" />
                            <span></span>Male</label>
                        <label class="radio">
                            <input type="radio" name="gender" value="L" />
                            <span></span>Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>APForm Location</label>
                    <div class="radio-list">
                        <label class="radio">
                            <input type="radio" value="Store / ASPro" name="apFormLocation" checked />
                            <span></span>Store / ASPro
                        </label>
                        <label class="radio">
                            <input type="radio" value="Telkom Taiwan" name="apFormLocation" />
                            <span></span>Telkom Taiwan
                        </label>
                        <label class="radio">
                            <input type="radio" value="T-Star" name="apFormLocation" />
                            <span></span>T-Star
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        jQuery(document).ready(function() {
            let selectCity = $('#city');
            let selectDistrict = $('#district');
            selectCity.select2({
                placeholder: "Select City",
            });

            selectDistrict.select2({
                placeholder: "Select City First",
            });

            $.ajax({
                type: "POST",
                url: "{{ config('app.api.url') }}list_city",
                headers: {
                    "Authorization": authorization,
                },
                success: function(result) {
                    let cities = result.data;
                    for (let i = 0; i < cities.length; i++) {
                        let option = new Option(cities[i].city, cities[i].id);
                        selectCity.append(option);
                    }
                }
            });

            selectCity.on('change', () => {
                let cityValue = selectCity.val();
                selectDistrict.val(null);
                return getDistrict(cityValue);
            })

            function getDistrict(value) {
                $.ajax({
                    type: "POST",
                    url: "{{ config('app.api.url') }}list_disrict",
                    headers: {
                        "Authorization": authorization,
                    },
                    data: {
                        'id_city': value,
                    },
                    success: function(result) {
                        let districts = result.data;
                        selectDistrict.empty();
                        for (let i = 0; i < districts.length; i++) {
                            let option = new Option(districts[i].district, districts[i].id);
                            selectDistrict.append(option);
                        }
                    }
                });
            }
        });

    </script>
@endpush
