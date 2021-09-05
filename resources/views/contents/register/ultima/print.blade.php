
{{-- Extends layout --}}
@extends('layout.empty')

{{-- Styles Section --}}
@push('addon-style')
<style>
    body {
        background: rgb(204, 204, 204);
    }

    /* .page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        padding: 50px;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    } */

    .imgHalf {
        width: 100%;
        height: 50%;
    }

    .page {
        /* width: 21cm; */
        /* height: 29.7cm; */
        /* overflow: auto; */
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #d3d3d3 solid;
        border-radius: 5px;
        background: #fff;
    }

    @media print {
        .page {
            border: none;
            border-radius: none;
            background: none;
        }

        body,
        .page {
            margin: 0;
            padding: 0;
            box-shadow: 0;
        }

        /* .identityPhoto {
            max-height: 650px;
            width: auto;
        }

        .imgPhoto {
            max-height: 650px;
            width: auto;
        } */
        .pagebreak { page-break-before: always; }

        .uploadIdentity {
            display: none
        }

        .apForm {
            display: none
        }

        #btnPrint {
            display: none;
        }


    }
</style>
@endpush



{{-- Content --}}
@section('content')
<div class="container text-center">
    <div class="col-12">
        <button id="btnPrint" class="float btn btn-danger mt-10" onclick="window.print()">Print this page</button>
    </div>
    <div id="apformLink" class="mb-2 row"></div>
    <div class="pagebreak"> </div>
    @if ($customerIdentity['upload_identity'] != null || end($identities)['upload_identity'] != null)
    <div class="imghalf">
        <div id="uploadIdForm" class="mb-5 mt-5"></div>
    </div>
    @else
    <p class="h3 text-muted pt-15  uploadIdentity"> no Identity File to show </p>
    @endif

</div>

@endsection
@push('scripts')
<script>

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
                    apFormDownload =
                    `<div class="page mt-4">
                        <img class="mb-20 img-fluid w-75 identityPhoto"  src='${apFormURI}'></img>
                    </div>`
                }

                $('#apformLink').append(apFormDownload);
            }

    // // console.log(upload_identity);
    // const upload_identity = "{{ $customerIdentity['upload_identity'] }}"
    // const uploadIdentityHttps = upload_identity.split(':')[0] == "https";
    // console.log(uploadIdentityHttps);
    // let uploadIdRaw = JSON.parse('{!!json_encode(end($identities))!!}');
    // let uploadIdDatas = uploadIdRaw.upload_identity;
    // uploadIdDatas = uploadIdDatas.split(';');
    // for (var idData in uploadIdDatas) {
    //     if (uploadIdDatas[idData].includes('https://sip.kartuas2in1.tw/data')) {
    //         uploadIdDatas[idData] = uploadIdDatas[idData];
    //     } else {
    //         uploadIdDatas[idData] = "{{ config('app.api.asset') }}" + uploadIdDatas[idData];
    //     }
    //     let uploadIdURI = uploadIdDatas[idData]
    //     let uploadFormDownload = ''
    //     if (uploadIdURI.substr(uploadIdURI.length - 3) == 'pdf') {
    //         getPdfFormUrl(uploadIdDatas[idData], function(blobPdf) {
    //             console.log(blobPdf)
    //             uploadProcessIdBloob.push(blobPdf)
    //         });
    //         uploadFormDownload =
    //             `<div class="col-md-4 div-image-process-cust-id">` +
    //             `   <a href=${uploadIdURI} target="_blank">` +
    //             `       <img class="img-responsive img-thumbnail col-md-12" src="{{ asset('media/svg/files/pdf.svg') }}" style="width: 100%;object-fit: cover;height: 150px;"/>` +
    //             `   </a>` +
    //             `</div>`
    //     } else {
    //         uploadFormDownload =
    //             `<div class="page mt-4">
    //                 <img class="mb-20 img-fluid w-75 identityPhoto"  src='${uploadIdURI}'></img>
    //             </div>`
    //     }
    //     $('#uploadIdForm').append(uploadFormDownload);
    // }

    const upload_identity = "{{ $customerIdentity['upload_identity'] }}"
    const uploadIdentityHttps = upload_identity.split(':')[0] == "https";
    console.log(uploadIdentityHttps);
    let uploadIdRaw = JSON.parse('{!!json_encode(end($identities))!!}');
    let uploadIdDatas = uploadIdRaw.upload_identity;
    uploadIdDatas = uploadIdDatas.split(';');

    let uploadFormDownload = '<div class="page mt-4 row">'
    let x = 0
    for (var idData in uploadIdDatas) {
        if (uploadIdDatas[idData].includes('https://sip.kartuas2in1.tw/data')) {
            uploadIdDatas[idData] = uploadIdDatas[idData];
        } else {
            uploadIdDatas[idData] = "{{ config('app.api.asset') }}" + uploadIdDatas[idData];
        }
        let uploadIdURI = uploadIdDatas[idData]

        if(x > 0 && x%4 == 0) uploadFormDownload +='</div><div class="page mt-4 row">'

        if (uploadIdURI.substr(uploadIdURI.length - 3) == 'pdf') {
            getPdfFormUrl(uploadIdDatas[idData], function(blobPdf) {
                console.log(blobPdf)
                uploadProcessIdBloob.push(blobPdf)
            });
            uploadFormDownload +=
                `<div class="col-6 >` +
                `       <img class="img-fluid" src="{{ asset('media/svg/files/pdf.svg') }}"/>` +
                `</div>`
        } else {
            uploadFormDownload +=
                `<div class="col-6">
                    <img class="mb-20 img-fluid identityPhoto"  src='${uploadIdURI}'></img>
                </div>`
        }
        x++
    }
    uploadFormDownload += `</div>`
    $('#uploadIdForm').append(uploadFormDownload);

    $(document).ready(function() {
        $("#myModal").modal('show');
    });

    $(document).ready(function() {
        $("img").on("contextmenu", function() {
            return false;
        });
    });
</script>
@endpush
