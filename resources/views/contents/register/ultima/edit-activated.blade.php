{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class=" rounded p-10">
    <form method="POST" enctype="multipart/form-data" id="updateForm">
        {{-- --}}
        {{-- Form Lead --}}
        <div class="card card-custom card-border mb-8">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Form Lead</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="form col-8">
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Name :
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="name" name="name" value="{{ $customerNumber['customer_nama'] }}" placeholder="Input Name Here" />
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
                            <input type="text" class="form-control" id="passport" name="passport" placeholder="Input Passport Here" value="{{ $customerNumber['customer_nomor_identity_passpor'] }}" />
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Nationality :
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control selectpicker" id="nationality" name="nationality">
                                @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality }}" {{ $nationality == $customerNumber['customer_nationality'] ? 'selected' : '' }}>
                                    {{ ucfirst($nationality) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Activation Store :
                        </label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-10 pr-0">
                                    <select class="form-control selectpicker" id="activationStore" name="activationStore" data-live-search="true" style="width: 100% !important">
                                        @foreach ($activationStores as $store)
                                        <option value="{{ $store['id'] }}" {{ $store['id'] == $customerNumber['id_activation_store'] ? 'selected' : '' }}>
                                            {{ ucfirst($store['nama']) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-success btn-sm btn-block" type="button" data-toggle="modal" data-target="#add-activation">
                                        <span class="flaticon2-plus"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5 form-group">
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
                    <div class="row mt-5 mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Availability:
                        </label>
                        <div class="col-sm-9">
                            <div class="radio-list">
                                @foreach ($availabilities as $availability)
                                <label class="radio">
                                    <input type="radio" class="availability" name="availability" {{ $availability == $customerNumber['availibility'] ? 'checked' : '' }} value="{{ $availability }}" />
                                    <span></span>
                                    @include('includes.form.availabilities')
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Information:
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" placeholder="Input Other Information" id="information" name="information" rows="4">{{ $customer['information'] }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- --}}
        {{-- Form Process --}}
        <div class="card card-custom card-border mb-8">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-plus-1 text-primary"></i>
                    </span>
                    <h3 class="card-label">
                        Form Process
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="col-8">
                    <div class="row mb-10 mt-5 form-group formTerminate {{ ($customerNumber['availibility'] != "terminate") ? 'd-none' : ''}} ">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Termination Form:
                        </label>
                        <div class="col-sm-9">
                            @if ($customerNumber['termination_form'] != null)
                            <div id="termformLink" class="mb-2 row"></div>
                            @endif
                            <input id="termFormUpload" name="termination_form[]" type="file" value="{{ $customerNumber['termination_form'] }}" data-show-upload="false" multiple="multiple">
                            <span class="text-mute">
                                *) if upload new file, the old file will be replaced!
                            </span>
                        </div>
                    </div>
                    <div class="row mb-10 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            AP Form:
                        </label>
                        <div class="col-sm-9">
                            @if ($customerNumber['ap_form'] != null)
                            <div id="apformLink" class="mb-2 row"></div>
                            @endif
                            <input id="apFormUpload" type="file" name="apFormUpload[]" value="{{ $customerNumber['ap_form'] }}" data-show-upload="false" multiple="multiple">
                            <span class="text-mute">
                                *) if upload new file, means you are adding file in DB
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Customer Identity:
                        </label>
                        <div class="col-sm-9">
                            @if (end($identities)['upload_identity'] != null)
                            <div id="uploadIdForm" class="mb-2 row"></div>
                            @endif
                            <input class="upload-identities" type="file" name="uploadIdentities[0][]" data-show-upload="false" data-preview-file-type="any" data-preview-file-icon="" multiple="multiple">
                            <span class="text-mute">
                                *) upload new file(s), means you are adding file in DB
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- --}}

        {{-- Form Activation --}}
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
                <div class="col-8">


                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            PIC :
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control selectpicker" id="picActivation" name="picActivation" disabled="disabled">
                                <option value="{{ $customerNumber['create_by'] }}">
                                    {{ $customerNumber['create_by'] }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            MSISDN(TW) :
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Input MSISDN(TW)" name="msisdn_tw" id="msisdn_tw" value="{{ $customerNumber['msisdn_tw'] }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            MSISDN(ID) :
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Autofilled MSISDN(ID)" name="msisdn_id" id="msisdn_id" value="{{ $customerNumber['msisdn_id'] }}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Gender<span class="text-danger">*</span>:
                        </label>
                        <div class="col-sm-9">
                            <div class="form-group mb-0">
                                <div class="radio-list mt-3">
                                    <label class="radio">
                                        <input type="radio" name="gender" value="L" {{ $customer['gender'] == 'L' ? 'checked' : '' }} />
                                        <span></span>Male</label>
                                    <label class="radio">
                                        <input type="radio" name="gender" value="P" {{ $customer['gender'] == 'P' ? 'checked' : '' }} />
                                        <span></span>Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            Passport :
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control mr-5" id="passportActivated" value="{{ $customerNumber['customer_nomor_identity_passpor'] }}" />
                                <input type="text" class="form-control" placeholder="Expired Date" name="expdate_passport" id="expdate-" value="{{ ($customerNumber['customer_passpor_expired'] == '10084-11-23') ? '' : $customerNumber['customer_passpor_expired'] }}" />
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($identities) > 1)
                    @foreach ($identities as $key => $_identity)
                    @if ($_identity['id_type'] != 'passport')
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-3 col-form-label text-right">
                            ARC / TAIWAN_ID :
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select class="form-control mr-5 selectpicker" name="id_type" id="id_type-0">
                                    <option value="" selected>Not Available</option>
                                    <option value="arc" {{ $_identity['id_type'] == 'arc' ? 'selected' : '' }}>
                                        {{ strtoupper('arc') }}
                                    </option>
                                    <option value="taiwan_id" {{ $_identity['id_type'] == 'taiwan_id' ? 'selected' : '' }}>
                                        {{ strtoupper('taiwan_id') }}
                                    </option>
                                </select>
                                <input type=" text" class="form-control mr-5" placeholder="Input ID Number" name="id_number" value="{{ $_identity['nomor'] }}" id="id_number-0" />
                                <input type="text" class="form-control" placeholder="Expired Date" name="expdate" id="expdate-" value="{{ $_identity['id_expire'] }}" />
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-3 form-group">
                                    <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                                    <div class="col-sm-9">
                                        <div class="form-group mb-0">
                                            @if ($_identity['upload_identity'] != null)
                                                <div id="" class="mb-2 idFormUploadedPic row" data-src="{{ $_identity['upload_identity'] }}">
                </div>
                @endif
                <div name="upload-identities" class="upload-identities" id="upload-identities-1"></div>
                <span class="text-mute">
                    *) upload new file(s), the old file will be replaced!
                </span>
            </div>
        </div>
</div>
@if ($key == 0 && count($identities) < 3) <div class="row mb-3 form-group">
    <label for="nama" class="col-sm-3 col-form-label text-right"></label>
    <div class="col-sm-9">
        <button type="button" id="addIdentities" class="btn btn-primary btn-block col-md-2 float-right">
            More
        </button>
    </div>
    </div>
    @endif --}}
    @endif
    @endforeach
    @else
    <div class="row mb-3 form-group">
        <label for="nama" class="col-sm-3 col-form-label text-right">
            ARC / TAIWAN_ID :
        </label>
        <div class="col-sm-9">
            <div class="input-group">
                <select class="form-control selectpicker mr-5" name="id_type" id="id_type-0">
                    <option value="" selected>Not Available</option>
                    <option value="arc">{{ strtoupper('arc') }}</option>
                    <option value="taiwan_id">{{ strtoupper('taiwan_id') }}</option>
                </select>
                <input type=" text" class="form-control mr-5" placeholder="Input ID Number" name="id_number" id="id_number-0" />
                <input type="text" class="form-control" placeholder="Expired Date" name="expdate" id="expdate-" />
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
                                <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                                <div class="col-sm-9">
                                    <div class="">
                                        <div name="upload-identities" class="upload-identities" id="upload-identities-1"></div>
                                        <span class="text-mute">
                                            *) upload new file(s), the old file will be replaced!
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                                <div class="col-sm-9">
                                    <button type="button" id="addIdentities" class="btn btn-primary btn-block col-md-2 float-right">
                                        More
                                    </button>
                                </div>
                            </div>  -->
    @endif
    <div id="newIdentities"></div>
    </div>
    <div class="col-12">
        <div class="row mb-3" style="">
            <label for="nama" class="col-sm-2 col-form-label text-right">
                Address :
            </label>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="form-row">
                        <!-- <div class="input-group"> -->
                        <div class="col-6 m-0">
                            <select class="form-control select2" data-live-search="true" name="city" id="city" style="width: 100% !important">
                                {{-- --}}
                            </select>
                        </div>
                        <div class="col-4 m-0">
                            <select class="form-control select2" data-live-search="true" name="district" id="district" style="width: 100% !important">
                                <option value=""> Select City </option>
                            </select>
                        </div>
                        <div class="input-group-prepend col-2 m-0">
                            <input type=" text" class="form-control" placeholder="POST CODE" id="inputPostCode" disabled />
                        </div>
                        <!-- </div> -->
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="Input Address" name="address" id="address" value="{{ $customer['address_complete'] }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">

        <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label text-right">
                Other Phone :
            </label>
            <div class="col-sm-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="la la-phone"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Input Other Phone" name="other_phone" id="other_phone" value={{ $customer['other_phone'] }}>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label text-right">
                Activation Date :
            </label>
            <div class="col-sm-9">
                <div class="form-group mb-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="activationDate" value="{{ substr($customerNumber['activation_date'],0,10) }}" id="activationDate" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label text-right">
                APForm Location :
            </label>
            <div class="col-sm-9">
                <div class="form-group">
                    <div class="radio-list mt-3">
                        <label class="radio radio-disabled" style="">
                            <input type="radio" value="Store / ASPro" name="apFormLocation" {{ ($customerNumber['apform_location'] == 'Store / ASPro' || $customerNumber['apform_location'] == '' )  ? 'checked' : '' }} readonly />
                            <span></span>Store / ASPro
                        </label>
                        <label class="radio radio-disabled">
                            <input type="radio" value="Telkom Taiwan" name="apFormLocation" {{ $customerNumber['apform_location'] == 'Telkom Taiwan' ? 'checked' : '' }} readonly />
                            <span></span>Telkom Taiwan
                        </label>
                        <label class="radio radio-disabled">
                            <input type="radio" value="T-Star" name="apFormLocation" {{ $customerNumber['apform_location'] == 'T-Star' ? 'checked' : '' }} readonly />
                            <span></span>T-Star
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label text-right"></label>
            <div class="col-sm-9">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>APFrom</th>
                            <th>Updated By</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apfHistory as $_history)
                        <tr>
                            <td>{{ $_history['ap_form'] }}</td>
                            <td>{{ $_history['create_by'] }}</td>
                            <td>{{ substr($_history['create_date'], 0, 10) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mb-3 form-group">
            <label for="nama" class="col-sm-3 col-form-label text-right">
                Registration Status :
            </label>
            <div class="col-sm-9">
                <input type="checkbox" id="toggle-event" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ ($customerNumber['registration_status'] == 'Y') ? 'checked' : '' }}>
            </div>
        </div>
        <div class="row mb-3 form-group">
            <label for="nama" class="col-sm-3 col-form-label text-right">
                De-activation time :
            </label>
            <div class="col-sm-9">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="deactivation_time" id="deactivation_time" placeholder="Select date & time" data-toggle="datetimepicker" data-target="#deactivation_time" value="{{ substr($customerNumber['deactivation_time'],0,10) }} {{ substr($customerNumber['deactivation_time'],11,8) }}" />
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="flaticon-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="card card-custom card-border mb-8">
        <div class="card-footer">
            <div class="col-8 d-flex justify-content-center">
                @if ($customerNumber['ap_form'] != null && count($identities) > 0)
                <button type="button" id="updateActivated" class="btn btn-primary mr-2">Submit</button>
                @else
                <button type="button" id="updateProcess" class="btn btn-primary mr-2">Submit</button>
                @endif
                <button type="button" class="btn btn-secondary" onclick="Previous();">Cancel</button>
            </div>
        </div>
    </div>
    </form>
    </div>
    @endsection

    @push('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="{{ asset('css/pages/ultima/image-uploader.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pages/ultima/fileinput.css') }}">
    <style>
        .bootstrap-datetimepicker-widget .picker-switch.accordion-toggle table {
            width: 100% !important;
        }

        .bootstrap-datetimepicker-widget .picker-switch.accordion-toggle table td {
            text-align: center !important;
        }

        .bootstrap-datetimepicker-widget .timepicker-picker table {
            width: 100% !important;
        }
    </style>
    @endpush

    @push('scripts')
    {{-- styles section --}}
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    {{-- pages section --}}
    {{-- <script src="{{ asset('js/pages/ultima/image-uploader.js') }}"></script> --}}
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ultima/fileinput.js') }}"></script>
    {{-- pages scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        const available = $('.availability').change(function() {
            // console.log(available[2].checked == true)
            if (available[2].checked == true) {
                $(".formTerminate").removeClass("d-none");
            } else {
                $(".formTerminate").addClass("d-none");
            }
        });


        var uploadProcessApfBloob = []
        var uploadProcessIdBloob = []
        var uploadActivatedIdBloobs = []
        var uploadProcessTermFormBloob = []
        $(function() {
            function getImageFormUrl(url, callback) {
                var img = new Image();
                img.setAttribute('crossOrigin', 'anonymous');
                img.onload = function(a) {
                    var canvas = document.createElement("canvas");
                    canvas.width = this.width;
                    canvas.height = this.height;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(this, 0, 0);

                    var dataURI = canvas.toDataURL("image/jpg");

                    // convert base64/URLEncoded data component to raw binary data held in a string
                    var byteString;
                    if (dataURI.split(',')[0].indexOf('base64') >= 0)
                        byteString = atob(dataURI.split(',')[1]);
                    else
                        byteString = unescape(dataURI.split(',')[1]);

                    // separate out the mime component
                    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

                    // write the bytes of the string to a typed array
                    var ia = new Uint8Array(byteString.length);
                    for (var i = 0; i < byteString.length; i++) {
                        ia[i] = byteString.charCodeAt(i);
                    }

                    return callback(new Blob([ia], {
                        type: mimeString
                    }));
                }

                img.src = url;
            }

            function getPdfFormUrl(url, callback) {
                fetch(url)
                    .then(res => res.blob()) // Gets the response and returns it as a blob
                    .then(blob => {
                        return callback(blob)
                    });
            }

            let arrows;
            if (KTUtil.isRTL()) {
                arrows = {
                    leftArrow: '<i class="la la-angle-right"></i>',
                    rightArrow: '<i class="la la-angle-left"></i>'
                }
            } else {
                arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }

            $(document).on("change", "#id_type", function() {
                if (this.value == 'passport') {
                    $('#id_number').val($('#passport').val())
                } else if (this.value == 'arc') {
                    $('#id_number').val('');
                }
            });

            // Birth Date
            $('#birthdate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows
            });

            $('#activationDate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                todayBtn: "linked",
                templates: arrows
            });

            // Expirated Date
            $("[name='expdate']").datepicker({
                rtl: KTUtil.isRTL(),
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows,
                startDate: '+90d'
            });

            $("[name='expdate_passport']").datepicker({
                rtl: KTUtil.isRTL(),
                format: 'yyyy-mm-dd',
                orientation: "bottom left",
                templates: arrows,
                startDate: '+90d'
            });

            $("#passportActivated").on('keyup', function() {
                $('#passport').val($(this).val())
            })

            $('#deactivation_time').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
            });

            let msisdnTW = $('#msisdn_tw');
            let msisdnID = $('#msisdn_id');
            msisdnTW.on('keyup', () => {
                $.ajax({
                    "url": "{{ config('app.api.url') }}get_pair_number",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Authorization": authorization,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    "data": {
                        "msisdn_tw": msisdnTW.val()
                    },
                    success: (res) => {
                        let status = res.status.code;
                        if (status == '200') {
                            msisdnID.val(res.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        console.error('');
                        msisdnID.val('');
                    }
                })
            });

            $('input[name=availability]').change(function() {
                console.log($(this).val())
                if ($(this).val() == 'terminate') {
                    $(".formTerminate").removeClass("d-none");
                } else {
                    $(".formTerminate").removeClass("d-none");
                    $(".formTerminate").addClass("d-none");
                }
            });

            let term_formData = "{{ $customerNumber['termination_form'] }}";
            let termFromData = term_formData.split(';')

            for(var termFormData in termFromData) {

                let termFormURI = "{{ config('app.api.asset') }}" + termFromData[termFormData]
                let apFormDownload = ''
                if(termFormURI.substr(termFormURI.length - 3) == 'pdf') {
                    getPdfFormUrl(termFormURI, function (blobPdf) {
                        uploadProcessTermFormBloob.push(blobPdf)
                    });
                    termFormDownload =
                    `<div class="col-md-4 div-image-process-termform-id">`+
                        `   <a href=${termFormURI} target="_blank">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="{{ asset('media/svg/files/pdf.svg') }}" style="width: 100%;object-fit: cover;height: 150px;"/>` +
                        `   </a>`+
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-term" data-img-key="${apFormData}">`+
                        `       Delete`+
                        `   </a>`+
                    `</div>`
                }
                else {
                    getImageFormUrl(termFormURI, function (blobImage) {
                        uploadProcessTermFormBloob.push(blobImage)
                    });
                    termFormDownload =
                    `<div class="col-md-4 div-image-process-termform-id">`+
                    `   <a href=${termFormURI} data-fancybox="images" data-caption="Data Upload ID">` +
                    `       <img class="img-responsive img-thumbnail col-md-12" src="${termFormURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                    `   </a>`+
                    `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-term" data-img-key="${apFormData}">`+
                    `       Delete`+
                    `   </a>`+
                    `</div>`
                }

                $('#termformLink').append(termFormDownload);
            }

            $('.btn-del-process-term').each(function(){
                $(this).on('click',function(){
                    uploadProcessTermFormBloob.splice($(this).data('img-key'),1);
                    $(this).parents('.div-image-process-termform-id').remove()
                    console.log(uploadProcessTermFormBloob)
                })
            })

            let ap_formData = "{{ $customerNumber['ap_form'] }}";
            let apFormDatas = ap_formData.split(';')

            for (var apFormData in apFormDatas) {
                console.log(apFormDatas[apFormData])

                if(apFormDatas[apFormData] == 'https://sip.kartuas2in1.tw/data/') {continue};

                let apFormURI=''
                if(apFormDatas[apFormData].includes('https://sip.kartuas2in1.tw/data')) {
                    console.log('he');
                    apFormURI = apFormDatas[apFormData]
                }
                else {
                    apFormURI = "{{ config('app.api.asset') }}" + apFormDatas[apFormData]
                }

                let apFormDownload = ''
                if (apFormURI.substr(apFormURI.length - 3) == 'pdf') {
                    getPdfFormUrl(apFormURI, function(blobPdf) {
                        uploadProcessApfBloob.push(blobPdf)
                    });
                    apFormDownload =
                        `<div class="col-md-4 div-image-process-apform-id">` +
                        `   <a href=${apFormURI} target="_blank">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="{{ asset('media/svg/files/pdf.svg') }}" style="width: 100%;object-fit: cover;height: 150px;"/>` +
                        `   </a>` +
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-apf" data-img-key="${apFormData}">` +
                        `       Delete` +
                        `   </a>` +
                        `</div>`
                } else {
                    getImageFormUrl(apFormURI, function(blobImage) {
                        uploadProcessApfBloob.push(blobImage)
                    });
                    apFormDownload =
                        `<div class="col-md-4 div-image-process-apform-id">` +
                        `   <a href=${apFormURI} data-fancybox="images" data-caption="Data Upload ID">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="${apFormURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                        `   </a>` +
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-apf" data-img-key="${apFormData}">` +
                        `       Delete` +
                        `   </a>` +
                        `</div>`
                }

                $('#apformLink').append(apFormDownload);
            }

            $('.btn-del-process-apf').each(function() {
                $(this).on('click', function() {
                    uploadProcessApfBloob.splice($(this).data('img-key'), 1);
                    $(this).parents('.div-image-process-apform-id').remove()
                    console.log(uploadProcessApfBloob)
                })
            })


            let idCustomer = "{{ $customerNumber['id_customer'] }}";
            let idCustomerNumber = "{{ $customerNumber['id'] }}";


            const upload_identity = "{{ $customerIdentity['upload_identity'] }}"
            // console.log(upload_identity);

            const uploadIdentityHttps = upload_identity.split(':')[0] == "https";
            console.log(uploadIdentityHttps);


            let uploadIdRaw = JSON.parse('{!!json_encode(end($identities))!!}');
            let uploadIdDatas = uploadIdRaw.upload_identity;
            uploadIdDatas = uploadIdDatas.split(';');

            for (var idData in uploadIdDatas) {
                if(uploadIdDatas[idData].includes('https://sip.kartuas2in1.tw/data')) {
                    uploadIdDatas[idData] = uploadIdDatas[idData];
                }
                else {
                    uploadIdDatas[idData] = "{{ config('app.api.asset') }}" + uploadIdDatas[idData];
                }

                let uploadIdURI = uploadIdDatas[idData]

                let uploadFormDownload = ''
                if (uploadIdURI.substr(uploadIdURI.length - 3) == 'pdf') {
                    getPdfFormUrl(uploadIdDatas[idData], function(blobPdf) {
                        console.log(blobPdf)
                        uploadProcessIdBloob.push(blobPdf)
                    });
                    uploadFormDownload =
                        `<div class="col-md-4 div-image-process-cust-id">` +
                        `   <a href=${uploadIdURI} target="_blank">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="{{ asset('media/svg/files/pdf.svg') }}" style="width: 100%;object-fit: cover;height: 150px;"/>` +
                        `   </a>` +
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-cust-id" data-img-key="${idData}">` +
                        `       Delete` +
                        `   </a>` +
                        `</div>`
                } else {
                    getImageFormUrl(uploadIdDatas[idData], function(blobImage) {
                        console.log(blobImage)
                        uploadProcessIdBloob.push(blobImage)
                    });
                    uploadFormDownload =
                        `<div class="col-md-4 div-image-process-cust-id">` +
                        `   <a href=${uploadIdURI} data-fancybox="images" data-caption="Data Upload ID">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="${uploadIdURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                        `   </a>` +
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-process-cust-id" data-img-key="${idData}">` +
                        `       Delete` +
                        `   </a>` +
                        `</div>`
                }

                $('#uploadIdForm').append(uploadFormDownload);
            }


            $('.btn-del-process-cust-id').each(function() {
                $(this).on('click', function() {
                    uploadProcessIdBloob.splice($(this).data('img-key'), 1);
                    $(this).parents('.div-image-process-cust-id').remove()
                    console.log(uploadProcessIdBloob)
                })
            })

            let availabilityStatus = $('input[name="availability"]:checked').val();

            let currentDate = new Date();
            let cDay = currentDate.getDate().toString().padStart(2, '0');
            let cMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');
            let cYear = currentDate.getFullYear().toString().padStart(4, '0');
            let cHour = currentDate.getHours().toString().padStart(2, '0');
            let cMinute = currentDate.getMinutes().toString().padStart(2, '0');
            let cSeconde = currentDate.getSeconds().toString().padStart(2, '0');
            let todayDate = cYear + "-" + cMonth + "-" + cDay;
            let timeStamp = cYear + "-" + cMonth + "-" + cDay + ' ' + cHour + ':' + cMinute + ':' + cSeconde;

            let regisStatus = "{{ $customerNumber['registration_status'] }}";
            $('#toggle-event').change(function() {
                if ($(this).prop('checked')) {
                    regisStatus = 'Y'
                    $('#deactivation_time').val('')
                } else {
                    regisStatus = 'N'
                    $('#deactivation_time').val(timeStamp)
                }
            })

            let updateActivationValidation = FormValidation.formValidation(updateForm, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Activation Store Name is Required"
                            }
                        }
                    },
                    birthdate: {
                        validators: {
                            notEmpty: {
                                message: "Birthdate is Required"
                            }
                        }
                    },
                    passport: {
                        validators: {
                            notEmpty: {
                                message: "Passport Number is Required"
                            }
                        }
                    },
                    nationality: {
                        validators: {
                            notEmpty: {
                                message: "Nationality is Required"
                            }
                        }
                    },
                    activationStore: {
                        validators: {
                            notEmpty: {
                                message: "Activation is Required"
                            }
                        }
                    },
                    tempat_lahir: {
                        validators: {
                            notEmpty: {
                                message: "Place of Birth is Required"
                            }
                        }
                    },
                    availability: {
                        validators: {
                            notEmpty: {
                                message: "Availability is Required"
                            }
                        }
                    },
                    apFormUpload: {
                        validators: {
                            file: {
                                xtension: 'jpeg,jpg,png,tif tiff,PDF',
                                type: 'image/jpeg,image/png,image/tiff,application/pdf',
                                message: 'Please choose an Image / PDF File'
                            }
                        }
                    },
                    // customerIdUpload: {
                    //     validators: {
                    //         file: {
                    //             extension: 'jpeg,jpg,png,tif tiff',
                    //             type: 'image/jpeg,image/png,image/tiff',
                    //             message: 'Please choose an Image File'
                    //         }
                    //     }
                    // },
                    msisdn_tw: {
                        validators: {
                            notEmpty: {
                                message: "MSISDN Taiwan is Required"
                            }
                        }
                    },
                    gender: {
                        validators: {
                            notEmpty: {
                                message: "Gender is Required"
                            }
                        }
                    },
                    id_type: {
                        validators: {
                            notEmpty: {
                                message: "Identity Type is Required"
                            }
                        }
                    },
                    id_number: {
                        validators: {
                            notEmpty: {
                                message: "Identity Number is Required"
                            }
                        }
                    },
                    expdate: {
                        validators: {
                            notEmpty: {
                                message: "Expiration Date is Required"
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: "City is Required"
                            }
                        }
                    },
                    district: {
                        validators: {
                            notEmpty: {
                                message: "District is Required"
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: "Address is Required"
                            }
                        }
                    },
                    // activationDate: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "Activation Date is Required"
                    //         }
                    //     }
                    // },
                    apFormLocation: {
                        validators: {
                            notEmpty: {
                                message: "AP. Form Location is Required"
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            });

            let updateProcessInActivation = FormValidation.formValidation(updateForm, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Activation Store Name is Required"
                            }
                        }
                    },
                    birthdate: {
                        validators: {
                            notEmpty: {
                                message: "Birthdate is Required"
                            }
                        }
                    },
                    passport: {
                        validators: {
                            notEmpty: {
                                message: "Passport is Required"
                            }
                        }
                    },
                    nationality: {
                        validators: {
                            notEmpty: {
                                message: "Nationality is Required"
                            }
                        }
                    },
                    activationStore: {
                        validators: {
                            notEmpty: {
                                message: "Activation is Required"
                            }
                        }
                    },
                    pic: {
                        validators: {
                            notEmpty: {
                                message: "Pic is Required"
                            }
                        }
                    },
                    tempat_lahir: {
                        validators: {
                            notEmpty: {
                                message: "Place of Birth is Required"
                            }
                        }
                    },
                    availability: {
                        validators: {
                            notEmpty: {
                                message: "Availability is Required"
                            }
                        }
                    },
                    apFormUpload: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png,tif tiff,pdf',
                                type: 'image/jpeg,image/png,image/tiff,application/pdf',
                                message: 'Please choose an Image or PDF File'
                            }
                        }
                    },
                    // customerIdUpload: {
                    //     validators: {
                    //         file: {
                    //             extension: 'jpeg,jpg,png,tif tiff',
                    //             type: 'image/jpeg,image/png,image/tiff',
                    //             message: 'Please choose an Image File'
                    //         },
                    //     }
                    // },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            });

            const formActivatedParams = () => {
                // var uploadIdFile = $('#customerIdUpload')[0].files[0];

                var formActivated = new FormData();
                formActivated.append("nama", $('#name').val());
                formActivated.append("tgl_lahir", $('#birthdate').val());
                formActivated.append("negara", $('#nationality').val());
                formActivated.append("id_activation_store", $('#activationStore').val());

                // APPEND PASSPORT
                formActivated.append("id_type[]", "passport");
                formActivated.append("id_expire[]", ($("[name='expdate_passport']").val() != '') ? $("[name='expdate_passport']").val() : '9999-31-12');
                formActivated.append("nomor_identity[]", $('#passport').val());
                formActivated.append("nomor_identity_ori[]", $('#passport').val());

                let uploadmultiProcess = $("[name='uploadIdentities[0][]']")[0].files;
                if (uploadProcessIdBloob.length != 0) {
                    for (var i in uploadProcessIdBloob) {
                        formActivated.append("upload_identity[0][]", uploadProcessIdBloob[i]);
                    }
                }
                if (uploadmultiProcess.length > 0) {
                    for (let i = 0; i < uploadmultiProcess.length; i++) {
                        const multipleFileSet = uploadmultiProcess[i];
                        formActivated.append("upload_identity[0][]", multipleFileSet);
                    }
                }

                let id_typemulti = $("[name='id_type']");
                let id_expiremulti = $("[name='expdate']");
                let no_idmulti = $("[name='id_number']");

                for (var i = 0; i < id_typemulti.length; i++) {
                    if (id_typemulti[i].value != '' && id_expiremulti[i].value != '' && no_idmulti[i].value != '') {
                        let y = i + 1
                        let id_typeset = id_typemulti[i].value;
                        let id_expireset = id_expiremulti[i].value;
                        let no_idmultiset = no_idmulti[i].value;

                        formActivated.append("id_type[]", id_typeset);
                        formActivated.append("id_expire[]", id_expireset);
                        formActivated.append("nomor_identity[]", no_idmultiset);
                        formActivated.append("nomor_identity_ori[]", no_idmultiset);

                        // let uploadmultiProcess = $("[name='uploadIdentities[" + y + "][]']")[0].files;
                        // console.log("uploadActivatedIdBloobs")
                        // console.log(uploadActivatedIdBloobs)
                        // if(uploadActivatedIdBloobs[i]) {
                        //     for(var uaib in uploadActivatedIdBloobs[i]) {
                        //         formActivated.append("upload_identity[" + y + "][]", uploadActivatedIdBloobs[i][uaib]);
                        //     }
                        // }
                        // if (uploadmultiProcess.length > 0) {
                        //     for (let x = 0; x < uploadmultiProcess.length; x++) {
                        //         const multipleFileSet = uploadmultiProcess[x];
                        //         formActivated.append("upload_identity[" + y + "][]", multipleFileSet);
                        //     }
                        // }
                    }
                }
                formActivated.append("availibility", $('input[name="availability"]:checked').val());
                formActivated.append("information", $('#information').val());
                formActivated.append("tipe_number", "kartu_as");

                if($('input[name="availability"]:checked').val() == 'terminate') {
                    if (uploadProcessTermFormBloob.length != 0) {
                    for (var i in uploadProcessTermFormBloob) {
                            formActivated.append("termination_form[]", uploadProcessTermFormBloob[i]);
                        }
                    }
                    for (const tfF of $('#termFormUpload')[0].files) {
                        console.log(tfF)
                        formActivated.append("termination_form[]", tfF);
                    }
                }

                if (uploadProcessApfBloob.length != 0) {
                    for (var i in uploadProcessApfBloob) {
                        formActivated.append("ap_form[]", uploadProcessApfBloob[i]);
                    }
                }
                for (const apF of $('#apFormUpload')[0].files) {
                    formActivated.append("ap_form[]", apF);
                }

                formActivated.append("gender", $('input[name="gender"]:checked').val());
                formActivated.append("address_complete", $('#address').val());
                formActivated.append("other_phone", $('#other_phone').val());
                formActivated.append("id_city", $('#city').val());
                formActivated.append("id_district", $('#district').val());

                if ($('#activationDate').val() === '' || $('#activationDate').val() === null) {
                    formActivated.append("status", "process");
                } else {
                    formActivated.append("activation_date", $('#activationDate').val());
                    formActivated.append("status", "activated");
                }


                formActivated.append("id_customer", idCustomer);
                formActivated.append("apform_location", $('input[name="apFormLocation"]:checked').val());
                let formDeactivationTime = ''

                if ($('input[name="availability"]:checked').val() == "terminate") {
                    formDeactivationTime = timeStamp;
                    formActivated.append("status_termination", "Y");
                } else {
                    formDeactivationTime = '';
                    formActivated.append("status_termination", "N");
                }

                formActivated.append("registration_status", regisStatus);
                if (regisStatus == 'N') {
                    formDeactivationTime = timeStamp
                }

                formActivated.append("deactivation_time", formDeactivationTime);

                formActivated.append("msisdn_tw", msisdnTW.val());
                formActivated.append("msisdn_id", msisdnID.val());
                formActivated.append("msisdn_tw_ori", "{{ $customerNumber['msisdn_tw'] }}");

                formActivated.append("id_customer_number", idCustomerNumber);
                formActivated.append("tempat_lahir", $('#nationality').val());
                formActivated.append("termination_form", $('#TerminateFormUpload').val());
                return formActivated;
            }

            $('#updateActivated').on('click', (e) => {
                e.preventDefault();
                data = formActivatedParams();
                // logFormData(data)
                if ($('#activationDate').val() === '' || $('#activationDate').val() === null) {
                    return updateCustomer(data);
                } else {
                    updateActivationValidation.validate().then(function(status) {
                        if (status == "Valid") {
                            return updateCustomer(data);
                        } else {
                            return errorAlert();
                        }
                    });
                }
            });

            const updateCustomer = (formData) => {
                logFormData(formData);
                $.ajax({
                    url: "{{ config('app.api.url') }}update_customer",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        "Authorization": authorization,
                    },
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (res) => {
                        return successAlert(res);
                    },
                    error: function(xhr, status, error) {
                        return failedAlert(xhr);
                    }
                })
            };
        });
    </script>


    <script>
        jQuery(document).ready(function() {
            function getImageFormUrl(url, callback) {
                var img = new Image();
                img.setAttribute('crossOrigin', 'anonymous');
                img.onload = function(a) {
                    var canvas = document.createElement("canvas");
                    canvas.width = this.width;
                    canvas.height = this.height;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(this, 0, 0);

                    var dataURI = canvas.toDataURL("image/jpg");

                    // convert base64/URLEncoded data component to raw binary data held in a string
                    var byteString;
                    if (dataURI.split(',')[0].indexOf('base64') >= 0)
                        byteString = atob(dataURI.split(',')[1]);
                    else
                        byteString = unescape(dataURI.split(',')[1]);

                    // separate out the mime component
                    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

                    // write the bytes of the string to a typed array
                    var ia = new Uint8Array(byteString.length);
                    for (var i = 0; i < byteString.length; i++) {
                        ia[i] = byteString.charCodeAt(i);
                    }

                    return callback(new Blob([ia], {
                        type: mimeString
                    }));
                }

                img.src = url;
            }
            /* let multipleType = $("[name='id_type']");
            for (let i = 0; i < multipleType.length; i++) {
                console.log('Type: ', multipleType[i].value);
            } */

            $("#termFormUpload").fileinput({
                dropZoneEnabled: false,
                allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
                showZoom: false,
                fileActionSettings: {
                    showZoom: false
                }
            });

            $("#apFormUpload").fileinput({
                dropZoneEnabled: false,
                allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
                showZoom: false,
                fileActionSettings: {
                    showZoom: false
                }
            });

            $("#TerminateFormUpload").fileinput({
                dropZoneEnabled: false,
                allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
                showZoom: false,
                fileActionSettings: {
                    showZoom: false
                }
            });

            $('.upload-identities').each(function(index) {
                $(this).fileinput({
                    dropZoneEnabled: false,
                    allowedFileExtensions: ["jpg", "jpeg", "png", "tif", "pdf"],
                    showZoom: false,
                    fileActionSettings: {
                        showZoom: false
                    }
                })
            })

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
                    @if($customer['id_city'] != null)
                    selectCity.val("{{ $customer['id_city'] }}")
                    getDistrict(selectCity.val())
                    @endif
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
                        @if($customer['id_district'] != null)
                        selectDistrict.val("{{ $customer['id_district'] }}")
                        let districtText = $('#district option:selected').text();
                        var postCode = districtText.substring(districtText.length, 3);
                        $('#inputPostCode').val(postCode)
                        @endif
                    }
                });
            };

            selectDistrict.on('change', () => {
                let districtText = $('#district option:selected').text();
                var postCode = districtText.substring(districtText.length, 3);
                $('#inputPostCode').val(postCode)

            })

            $('.idFormUploadedPic').each(function(index) {
                let assetUris = $(this).data('src')
                assetUris = assetUris.split(';')
                var uploadActivatedIdBloob = []
                for (var assetUri in assetUris) {
                    let uploadIdURI = "{{ config('app.api.asset') }}" + assetUris[assetUri];
                    getImageFormUrl(uploadIdURI, function(blobImage) {
                        uploadActivatedIdBloob.push(blobImage)
                        uploadActivatedIdBloobs.push(uploadActivatedIdBloob)
                    });
                    let img =
                        `<div class="col-md-3 div-image-activated-cust-id">` +
                        `   <a href=${uploadIdURI} data-fancybox="images" data-caption="Data Upload ID">` +
                        `       <img class="img-responsive img-thumbnail col-md-12" src="${uploadIdURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                        `   </a>` +
                        `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-activated-cust-id" data-index="${index}" data-img-key="${assetUri}">` +
                        `       Delete` +
                        `   </a>` +
                        `</div>`
                    $(this).append(img)
                }
                console.log(uploadActivatedIdBloob)
            })
            console.log(uploadActivatedIdBloobs)
            $('.btn-del-activated-cust-id').each(function() {
                $(this).on('click', function() {
                    const index = $(this).data('index')
                    const key = $(this).data('img-key')
                    uploadActivatedIdBloobs[index].splice(key, 1);
                    $(this).parents('.div-image-activated-cust-id').remove()
                    console.log(uploadActivatedIdBloobs[key][index])
                })
            })

            let formIdentities = (length) => {
                const newForm = `
                <div class="row mb-3 form-group">
                    <label for="nama" class="col-sm-3 col-form-label text-right">
                        ID:
                    </label>
                    <div class="col-sm-9">
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <select class="form-control" name="id_type" id="id_type-${length}">
                                    <option value="" selected>Not Available</option>
                                    <option value="arc">
                                        {{ strtoupper('arc') }}
                                    </option>
                                    <option value="taiwan_id">
                                        {{ strtoupper('taiwan_id') }}
                                    </option>
                                </select>
                                <input type="text" class="form-control" placeholder="Input ID Number" name="id_number"
                                    id="id_number-${length}" />
                                <input type="text" class="form-control" placeholder="Expired Date" name="expdate" id="expdate-${length}" />
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <div class="">
                            <div class="new-upload-identities upload-identities" id="upload-identities-${length}"></div>
                            <span class="text-mute">
                                *) upload new file(s), means you are adding file in DB
                            </span>
                        </div>
                    </div>
                </div>`;

                return newForm;
            };

            const formID = $('input[name="id_number"]');
            let i = 1;
            $('#addIdentities').on('click', () => {
                i += 1;
                if (i <= 2) {
                    $('#newIdentities').append(formIdentities(i));
                    appendUploadImage(i);
                    $('#addIdentities').prop('disabled', true);
                }
            });

            const appendUploadImage = (i) => {
                if (i == 2) {
                    $("div#upload-identities-2").imageUploader({
                        imagesInputName: 'uploadIdentities[2]',
                    });
                }
            };
        });
    </script>


    @endpush
