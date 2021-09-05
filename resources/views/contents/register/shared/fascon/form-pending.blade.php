<div class="card card-custom card-border mb-8">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-plus-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                User Profile
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $customerNumber['customer_nama'] }}" placeholder="Input Name Here" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="birthdate">Birthdate:</label>
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
            <div class="col-md-12" style="display:none">
                <div class="form-group">
                    <label for="passport">Passport:</label>
                    <input type="text" class="form-control" id="passport" name="passport" placeholder="Input Passport Here" value="{{ $customerNumber['customer_nomor_identity_passpor'] }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nationality">Nationality:</label>
                    <select class="form-control selectpicker" id="nationality" name="nationality">
                        @foreach ($nationalities as $nationality)
                        <option value="{{ $nationality }}" {{ $nationality == $customerNumber['customer_nationality'] ? 'selected' : '' }}>
                            {{ ucfirst($nationality) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="city">City:</label>
                    <select class="form-control selectpicker" id="city" name="city">

                        @foreach ($cities as $city)
                        <option value="{{ $city['id'] }}" {{ $city['id'] == $customerNumber['customer_id_city'] ? 'selected' : '' }}>
                            {{ ucfirst($city['city']) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12" style="display:none">
                <div class="form-group">
                    <label for="district">District:</label>
                    <select class="form-control" id="district" name="district" data-live-search="true">
                        @foreach ($districts as $ds)
                        <option value="{{ $ds['id'] }}" {{ $ds['id'] == $customerNumber['customer_id_district'] ? 'selected' : '' }}>
                            {{ ucfirst($ds['district']) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pic">P.I.C:</label>
                    <select class="form-control" id="picLead" name="picLead" disabled="disabled">
                        <option value="{{ Session::get('user')[0]->getAuthIdentifierName() }}">
                            {{ Session::get('user')[0]->getAuthIdentifierName() }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tempat_lahir">Place Of Birth:</label>
                    <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Input Place Of Birth Here" value="{{ $customerNumber['customer_tempat_lahir'] }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row mt-2">
                    <label class="col-3">Status:</label>
                    <div class="radio-list">
                        <label class="radio">
                            <input type="radio" name="status" {{ $customerNumber['status'] == 'pending' ? 'checked' : '' }} value="pending" />
                            <span></span>
                            Pending
                        </label>
                        <label class="radio">
                            <input type="radio" name="status" {{ $customerNumber['status'] == 'registered' ? 'checked' : '' }} value="registered" />
                            <span></span>
                            Registered
                        </label>
                        <label class="radio">
                            <input id="radioReject" type="radio" name="status" {{ $customerNumber['status'] == 'rejected' ? 'checked' : '' }} value="rejected" />
                            <span></span>
                            Reject
                        </label>
                    </div>
                </div>
            </div>
            <div class=" col-md-12" style="{{ $customerNumber['status'] != 'rejected' ? 'display:none' : '' }}" id="remarkReject">
                <div class="form-group">
                    <label for="information">Remark:</label>
                    <select id="remarkOpt" class="form-control" name="information">
                        <option value="Foto ARC blur" {{ $customerNumber['deskripsi'] == 'Foto ARC blur' ? 'selected' : '' }}>Foto ARC blur</option>
                        <option value="Foto ARC terkena pantulan cahaya" {{ $customerNumber['deskripsi'] == 'Foto ARC terkena pantulan cahaya' ? 'selected' : '' }} >
                            Foto ARC terkena pantulan cahaya
                        </option>
                        <option value="Tulisan di ARC tidak terbaca" {{ $customerNumber['deskripsi'] == 'Tulisan di ARC tidak terbaca' ? 'selected' : '' }} >
                            Tulisan di ARC tidak terbaca
                        </option>
                        <option value="Foto ARC terpotong" {{ $customerNumber['deskripsi'] == 'Foto ARC terpotong' ? 'selected' : '' }} >
                            Foto ARC terpotong
                        </option>
                        <option value="Foto ARC tertutup benda / jari" {{ $customerNumber['deskripsi'] == 'Foto ARC tertutup benda / jari' ? 'selected' : '' }} >
                            Foto ARC tertutup benda / jari
                        </option>
                        <option value="ARC kadaluarsa / expired" {{ $customerNumber['deskripsi'] == 'ARC kadaluarsa / expired' ? 'selected' : '' }} >
                            ARC kadaluarsa / expired
                        </option>
                        <option value="other_remark" {{ $customerNumber['deskripsi'] == 'Lainnya' ? 'selected' : '' }} >
                            Lainnya
                        </option>
                    </select>
                    <textarea class="form-control" placeholder="Input Other Information" id="otherRemark" style="display:none" name="information" rows="4">{{ $customer['information'] }}</textarea>
                </div>
            </div>
            @if ($customerNumber['status']=='reject')
            <div class=" col-md-12">
                <div class="form-group">
                    <label for="information">Remark:</label>
                    <textarea class="form-control" placeholder="Input Other Information" id="deskripsi" name="information" rows="4">{{ $customer['information'] }}</textarea>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">MSISDN KN:</label>
                    <input class="form-control" type="text" id="msisdn_kn" name="msisdn_kn" value="{{ $customerNumber['msisdn_kn'] }}" placeholder="Input MSISDN KN Here" />
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
    $("input[type='radio']").change(function() {
        var val = $(this).val()
        changeReject(val);
    })
    $("select#remarkOpt").change(function() {
        var val = $(this).val();
        if (val == 'other_remark') {
            $("#otherRemark").attr('style', 'display:block')
            $("select#remarkOpt").attr('name')
        } else {
            $("#otherRemark").attr('style', 'display:none')
        }
    })

    function changeReject(val) {
        if (val == 'rejected') {
            $("#remarkReject").attr('style', 'display:block');
        } else {
            $("#remarkReject").attr('style', 'display:none');
        }
    }
    jQuery(document).ready(function() {
        let selectDistrict = $('#district');
        let selectCity = $('#city');


        selectDistrict.select2({
            placeholder: "Select City First",
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
