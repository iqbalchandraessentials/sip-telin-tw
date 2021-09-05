<div class="card card-custom card-border mb-8">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-plus-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                Form Lead
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="col-8">
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Name :
                </label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ $customerNumber['customer_nama'] }}" placeholder="Input Name Here" />
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Birthdate :
                </label>
                <div class="col-sm-9">
                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="flaticon-calendar"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="birthdate" id="birthdate" value="{{ $customerNumber['customer_tgl_lahir'] }}" />
                    </div>
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Passport :
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="passport" name="passport"
                        placeholder="Input Passport Here"
                        value="{{ $customerNumber['customer_nomor_identity_passpor'] }}" />
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Nationality :
                </label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker" id="nationality" name="nationality">
                        @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality }}"
                                {{ $nationality == $customerNumber['customer_nationality'] ? 'selected' : '' }}>
                                {{ ucfirst($nationality) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Activation Store:
                </label>
                <div class="col-sm-7">
                    <select class="form-control selectpicker col-sm-9" id="activationStore" name="activationStore"
                        data-live-search="true">
                        @foreach ($activationStores as $store)
                            <option value="{{ $store['id'] }}"
                                {{ $store['id'] == $customerNumber['id_activation_store'] ? 'selected' : '' }}>
                                {{ ucfirst($store['nama']) }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-success btn-sm ml-5" type="button" data-toggle="modal" data-target="#add-activation">
                    <i class="flaticon2-plus"></i>
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    PIC :
                </label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker" id="picLead" name="picLead" disabled="disabled">
                        <option value="{{ $customerNumber['create_by'] }}">
                            {{ ucfirst($customerNumber['create_by']) }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Availability :
                </label>
                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="radio-list">
                            @foreach ($availabilities as $availability)
                                <label class="radio">
                                    <input type="radio" name="availability"
                                        {{ $availability == $customerNumber['availibility'] ? 'checked' : '' }}
                                        value="{{ $availability }}" />
                                    <span></span>
                                    @include('includes.form.availabilities')
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3 form-group">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Information :
                </label>
                <div class="col-sm-9">
                    <textarea class="form-control" placeholder="Input Other Information" id="information"
                        name="information" rows="4">{{ $customer['information'] }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
