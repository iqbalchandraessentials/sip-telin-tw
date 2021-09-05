{{-- Form Lead --}}
<div class="card card-custom card-border mb-10">
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
                    <input class="form-control" type="text" id="name" name="name" value="{{ $customer['nama'] }}" placeholder="Input Name Here" />
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
                    Activation Store :
                </label>
                <div class="col-sm-9">
                    <select class="form-control selectpicker col-sm-9" id="activationStore" name="activationStore" data-live-search="true">
                        @foreach ($activationStores as $store)
                            <option value="{{ $store['id'] }}"
                                {{ $store['id'] == $customerNumber['id_activation_store'] ? 'selected' : '' }}>
                                {{ ucfirst($store['nama']) }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-success btn-sm ml-5" type="button" data-toggle="modal" data-target="#add-activation">
                        <i class="flaticon2-plus"></i>
                    </button>
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
                        <option value="{{ $customerIdentity['create_by'] }}">
                            {{ $customerIdentity['create_by'] }}
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
                        <input type="text" class="form-control" placeholder="Input MSISDN(TW)" name="msisdn_tw"
                            id="msisdn_tw" value="{{ $customerNumber['msisdn_tw'] }}" />
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
                        <input type="text" class="form-control" placeholder="Autofilled MSISDN(ID)" name="msisdn_id"
                            id="msisdn_id" value="{{ $customerNumber['msisdn_id'] }}" disabled />
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
                    {{-- <div class="row mb-3 form-group hidden">
                        <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                @if ($_identity['upload_identity'] != null)
                                    <div id="" class="mb-2 idFormUploadedPic row" data-src="{{ $_identity['upload_identity'] }}"></div>
                                @endif
                                <div name="upload-identities" class="upload-identities" id="upload-identities-1"></div>
                                <span class="text-mute">
                                    *) upload new file(s), the old file will be replaced!
                                </span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- @if ($key == 0 && count($identities) < 3)
                    <div class="row mb-3 form-group">
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
                            <input type=" text" class="form-control mr-5" placeholder="Input ID Number" name="id_number"
                                id="id_number-0" />
                            <input type="text" class="form-control" placeholder="Expired Date" name="expdate"
                                id="expdate-" />
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row hidden">
                    <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <div class="">
                            <div name="upload-identities" class="upload-identities" id="upload-identities-1"></div>
                            <span class="text-mute">
                                *) upload new file(s), the old file will be replaced!
                            </span>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="row mb-3">
                    <label for="nama" class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <button type="button" id="addIdentities" class="btn btn-primary btn-block col-md-2 float-right">
                            More
                        </button>
                    </div>
                </div> --}}
            @endif

            <div id="newIdentities"></div>
    </div>
    <div class="col-12">
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label text-right">
                    Address :
                </label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="form-row">
                        {{-- <div class="input-group"> --}}
                            <div class="col-6 m-0">
                            <select class="form-control select2" data-live-search="true" name="city" id="city">
                                {{--  --}}
                            </select>
                            </div>
                            <div class="col-4 m-0">
                            <select class="form-control select2" data-live-search="true" name="district" id="district">
                                <option value=""> Select City </option>
                            </select>
                            </div>
                            <div class="input-group-prepend col-2 m-0">
                                <input type=" text" class="form-control" placeholder="POST CODE" id="inputPostCode"
                                    disabled />
                            </div>
                        {{-- </div> --}}
                        <div class="col-12">
                        <input type="text" class="form-control" placeholder="Input Address" name="address" id="address"
                                value="{{ $customer['address_complete'] }}" />
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
                        <input type="text" class="form-control" placeholder="Input Other Phone" name="other_phone"
                            id="other_phone" value={{ $customer['other_phone'] }}>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    Activation Date :
                </label>
                <div class="col-sm-9">
                    <div class="form-group">
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
            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label text-right">
                    APForm Location :
                </label>
                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="radio-list mt-3">
                            <label class="radio">
                                <input type="radio" value="Store / ASPro" name="apFormLocation"
                                    {{ $customerNumber['apform_location'] == 'Store / ASPro' ? 'checked' : '' }}
                                    {{ $customerNumber['apform_location'] == '' ? 'checked' : '' }} />
                                <span></span>Store / ASPro
                            </label>
                            <label class="radio">
                                <input type="radio" value="Telkom Taiwan" name="apFormLocation"
                                    {{ $customerNumber['apform_location'] == 'Telkom Taiwan' ? 'checked' : '' }} />
                                <span></span>Telkom Taiwan
                            </label>
                            <label class="radio">
                                <input type="radio" value="T-Star" name="apFormLocation"
                                    {{ $customerNumber['apform_location'] == 'T-Star' ? 'checked' : '' }} />
                                <span></span>T-Star
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="{{ asset('css/pages/ultima/image-uploader.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/pages/ultima/fileinput.css') }}">
@endpush

@push('scripts')
{{-- <script src="{{ asset('js/pages/ultima/image-uploader.js') }}"></script> --}}
<script src="{{ asset('js/pages/ultima/fileinput.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        function getImageFormUrl(url, callback) {
            var img = new Image();
            img.setAttribute('crossOrigin', 'anonymous');
            img.onload = function (a) {
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

                return callback(new Blob([ia], { type: mimeString }));
            }

            img.src = url;
        }

        // $('.upload-identities').each(function(index) {
        //     $(this).imageUploader({
        //         imagesInputName: 'uploadIdentities[' + index + ']',
        //     })
        // })

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
            allowedFileExtensions: ["jpg","jpeg","png", "tif","pdf"],
            showZoom: false,
            fileActionSettings: {showZoom: false}
        });

        $('.upload-identities').each(function(index) {
            $(this).fileinput({
                dropZoneEnabled: false,
                allowedFileExtensions: ["jpg","jpeg","png", "tif","pdf"],
                showZoom: false,
                fileActionSettings: {showZoom: false}
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
                @if ($customer['id_city'] != null)
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
                    @if ($customer['id_district'] != null)
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
                getImageFormUrl(uploadIdURI, function (blobImage) {
                    uploadActivatedIdBloob.push(blobImage)
                    uploadActivatedIdBloobs.push(uploadActivatedIdBloob)
                });
                let img =
                    `<div class="col-md-3 div-image-activated-cust-id">`+
                    `   <a href=${uploadIdURI} data-fancybox="images" data-caption="Data Upload ID">` +
                    `       <img class="img-responsive img-thumbnail col-md-12" src="${uploadIdURI}" style="width: 100%;object-fit: cover;height: 150px;"></img>` +
                    `   </a>`+
                    `   <a class=" align-self-end btn btn-danger btn-block btn-sm col-md-12 mt-2 btn-del-activated-cust-id" data-index="${index}" data-img-key="${assetUri}">`+
                    `       Delete`+
                    `   </a>`+
                    `</div>`
                $(this).append(img)
            }
            console.log(uploadActivatedIdBloob)
        })

        $('.btn-del-activated-cust-id').each(function(){
            $(this).on('click',function(){
                const index = $(this).data('index')
                const key = $(this).data('img-key')
                uploadActivatedIdBloobs[index].splice(key,1);
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
