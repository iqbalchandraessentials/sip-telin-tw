{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Create Lead Data</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input class="form-control" type="text" id="quick-information" name="quick-information"
                                placeholder="Paste Quick Information Here" />
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        placeholder="Input Name Here" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="birthdate">Birthdate:</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="flaticon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="YYYY/MM/DD" name="birthdate"
                                            id="birthdate" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="passport">Passport:</label>
                                    <input type="text" class="form-control" id="passport" name="passport"
                                        placeholder="Input Passport Here" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nationality">Nationality:</label>
                                    <select class="form-control selectpicker" id="nationality" name="nationality">
                                        <option value="">Indonesia</option>
                                        <option value="">Philippines</option>
                                        <option value="">Thailand</option>
                                        <option value="">Vietnam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="activationStore">Activation Store:</label>
                                    <div class="input-group">
                                        <select class="form-control selectpicker" id="activationStore"
                                            name="activationStore" data-live-search="true">
                                            <option value="">Nothing Selected</option>
                                            <option value="553">COLUMBIA</option>
                                            <option value="556">INDELIVERY</option>
                                            <option value="579">PRE ORDER </option>
                                            <option value="580">TAIWAN STAR</option>
                                            <option value="589">ASPROF ELLY</option>
                                            <option value="590">ASPROF YENNI</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button" data-toggle="modal"
                                                data-target="#add-activation">
                                                <i class="flaticon2-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pic">P.I.C:</label>
                                    <select class="form-control selectpicker" id="pic" name="pic" disabled="disabled">
                                        <option value="">STS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-7">
                                <div class="form-group">
                                    <label for="information">Information:</label>
                                    <textarea class="form-control" placeholder="Input Other Information" id="information"
                                        name="information" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row mt-2">
                                    <label class="col-3">Availability:</label>
                                    <div class="radio-list">
                                        <label class="radio">
                                            <input type="radio" name="availability" />
                                            <span></span>OK (New)</label>
                                        <label class="radio">
                                            <input type="radio" name="availability" />
                                            <span></span>OK (Former T-Star Subscriber)</label>
                                        <label class="radio">
                                            <input type="radio" name="availability" />
                                            <span></span>Terminate
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="availability" checked="checked" />
                                            <span></span>NOT OK
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-primary mr-2">Submit</button>
                                <button type="button" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-activation" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-activation">
                        Adding Activation Store
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add-activation-name">Name</label>
                                    <select class="form-control selectpicker" id="add-activation-name"
                                        name="add-activation-name">
                                        <option value="NA" default> - Select -</option>
                                        <option value="">DIRECT</option>
                                        <option value="ASPROF">ASPROF</option>
                                        <option value="ASPROT">ASPROT</option>
                                        <option value="TOKO">TOKO</option>
                                        <option value="INDEX">INDEX</option>
                                        <option value="PRE-EMPTIVE">PRE-EMPTIVE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub-name">&nbsp;</label>
                                    <input type="text" class="form-control" id="sub-name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="flaticon-home"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Address" name="address" id="address" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Location (City)</label>
                                    <select class="form-control selectpicker" data-live-search="true" id="city" name="city">
                                        <option value="" default> - Select -</option>
                                        <option value="NA">DIRECT</option>
                                        <option value="ASPROF">ASPROF</option>
                                        <option value="ASPROT">ASPROT</option>
                                        <option value="TOKO">TOKO</option>
                                        <option value="INDEX">INDEX</option>
                                        <option value="PRE-EMPTIVE">PRE-EMPTIVE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">District</label>
                                    <select class="form-control selectpicker" data-live-search="true" id="district"
                                        name="district">
                                        <option value="" default> - Select Location First- </option>
                                        <option value="NA">DIRECT</option>
                                        <option value="ASPROF">ASPROF</option>
                                        <option value="ASPROT">ASPROT</option>
                                        <option value="TOKO">TOKO</option>
                                        <option value="INDEX">INDEX</option>
                                        <option value="PRE-EMPTIVE">PRE-EMPTIVE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Input Phone Number"
                                            name="phone" id="phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact Person</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-user-o"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Input Contact Person"
                                            name="contact" id="contact" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="master-store">Master Store:</label>
                            <select class="form-control selectpicker" data-live-search="true" id="master-store"
                                name="master-store">
                                <option value="1">Columbia</option>
                                <option value="2">Index</option>
                                <option value="3">Tenten</option>
                                <option value="4">Global</option>
                            </select>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Styles Section --}}
@push('styles')
    {{--  --}}
@endpush


{{-- Scripts Section --}}
@push('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {

            let KTBootstrapDatepicker = function() {
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

                return {
                    // public functions
                    init: function() {
                        // Birth Date
                        $('#birthdate').datepicker({
                            rtl: KTUtil.isRTL(),
                            todayHighlight: true,
                            format: 'yyyy/mm/dd',
                            orientation: "bottom left",
                            templates: arrows
                        });

                        // Alert
                        $('#alert').datepicker({
                            rtl: KTUtil.isRTL(),
                            todayHighlight: true,
                            orientation: "bottom left",
                            templates: arrows
                        });
                    }
                };
            }();

            jQuery(document).ready(function() {
                KTBootstrapDatepicker.init();
            });
        });

        let quickInformation = $('#quick-information');
        quickInformation.on('keyup', function() {
            let quickInfoArr = quickInformation.val().split(' ');
            $('#name').val(quickInfoArr[0]);
            $('#birthdate').val(quickInfoArr[1]);
            $('#passport').val(quickInfoArr[2]);
        });

    </script>
@endpush
