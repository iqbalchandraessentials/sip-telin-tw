<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        /* position: absolute; */
        top: 0;
        left: 0;
        /* width: auto; */
        height: 250px;
        max-height: 250px;
    }

    .carousel-control-prev-icon {
        filter: invert(100%);
    }

    .carousel-control-next-icon {
        filter: invert(100%);
    }

    #arcCarousel .carousel-indicators {
        position: static;
        margin-top: 20px;
    }

    #arcCarousel .carousel-indicators>li {
        width: 100px;
    }

    #arcCarousel .carousel-indicators li img {
        display: block;
        opacity: 0.5;
    }

    #arcCarousel .carousel-indicators li.active img {
        opacity: 1;
    }

    #arcCarousel .carousel-indicators li:hover img {
        opacity: 0.75;
    }

    #nhiCarousel .carousel-indicators {
        position: static;
        margin-top: 20px;
    }

    #nhiCarousel .carousel-indicators>li {
        width: 100px;
    }

    #nhiCarousel .carousel-indicators li img {
        display: block;
        opacity: 0.5;
    }

    #nhiCarousel .carousel-indicators li.active img {
        opacity: 1;
    }

    #nhiCarousel .carousel-indicators li:hover img {
        opacity: 0.75;
    }
</style>



<div class="card card-custom card-border mb-8">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-plus-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                Identity
            </h3>
        </div>
    </div>

    <div class="card-body">
        <div class="col-md-12">

            <div class="row">
                <div class="col-lg-6">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="labelType">ARC No.</label>
                            <input class="form-control" value="{{ $customerNumber['customer_nomor_identity_arc'] }}" type="text" id="nomor_identity" name="arc_no" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="labelType">ARC Expired Date</label>
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="flaticon-calendar"></i>
                                    </span>
                                </div>
                                <input class="form-control" value="{{ $customerNumber['customer_arc_expired'] }}" type="text" id="nomor_identity" name="arc_expired" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="labelType">Passport No.</label>
                            <input class="form-control" value="{{ $customerNumber['customer_nomor_identity_passpor'] }}" type="text" id="nomor_identity" name="passport_no" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ARC File :</label>
                            <table class="table">
                                <!-- <tbody id="idFileLinks">
                                    @if ($customerIdentity[0]['id_type']=='arc' || $customerIdentity[0]['id_type']=='ARC')
                                    <tr name="appended">
                                        <td> <a href="http://20.194.7.52:3000/{{ $customerIdentity[0]['upload_identity'] }}" target="_blank">{{ $customerIdentity[0]['upload_identity'] }} </a> </td>
                                    </tr>
                                    @else
                                    <tr name="appended">
                                        <td> <a href="http://20.194.7.52:3000/{{ $customerIdentity[1]['upload_identity'] }}" target="_blank">{{ $customerIdentity[0]['upload_identity'] }} </a> </td>
                                    </tr>
                                    @endif
                                </tbody> -->
                            </table>
                            <input type="file" class="custom-file-input" id="arcFormUpload" name="customerIdUpload" data-show-upload="false" multiple="multiple" />
                            <span class="text-mute">
                                *) upload new file(s)
                            </span>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="card" style="height: 93%;">
                        <!--Carousel Wrapper-->
                        <div class="row">
                            <!--  -->
                            @foreach ($customerIdentity as $_identity)
                            @if (strtolower($_identity['id_type']) == 'arc')

                            @php $imgs = explode(';',$_identity['upload_identity']); @endphp
                            <div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.1)">
                                <div id="arcCarousel" class="carousel slide" data-ride="carousel" align="center">
                                    <div class="carousel-inner" style="height:250px; width:100%;padding: 10px;">
                                        @php $i=0 @endphp
                                        @foreach ($imgs as $img)
                                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                            <a href="{{ config('app.api.asset').$img }}" data-fancybox="images" data-caption="Data Upload ARC">
                                                <img src="{{ config('app.api.asset').$img }}" class="img-fluid">
                                            </a>
                                        </div>
                                        @php $i++ @endphp
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#arcCarousel" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#arcCarousel" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                    <ol class="carousel-indicators list-inline mt-0">
                                        @php $i=0 @endphp
                                        @foreach ($imgs as $img)
                                        <li class="list-inline-item {{ $i == 0 ? 'active' : '' }}">
                                            <a id="carousel-selector-0" class="selected" data-slide-to="{{ $i }}" data-target="#arcCarousel" style="width: 300px; height: 500px;overflow: auto;">
                                                <img src="{{ config('app.api.asset').$img }}" style="width: auto;height: 90px;">
                                            </a>
                                        </li>
                                        @php $i++ @endphp
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="row mb-25">
                <div class="col-lg-6">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="labelType">NHI No.</label>
                            <!-- biar form input nhi muncul bila nhi nya kosong -->
                            @foreach ($customerIdentity as $_identity)
                            @if (strtolower($_identity['id_type']) == 'nhi')
                            <input class="form-control" value="{{$_identity['nomor']}}" type="text" data-ori="{{$_identity['nomor']}}" id="nomor_identity" name="nhi_no" />
                            @break
                            @else
                            <input class="form-control" value="" type="text" data-ori="{{$_identity['nomor']}}" id="nomor_identity" name="nhi_no" />
                            @break
                            @endif
                            @endforeach
                            <!-- im sorry if my code not good  -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>NHI File :</label>
                            <table class="table">
                                <!--  -->
                                <!-- <tbody id="idFileLinks">
                                    @if ($customerIdentity[0]['id_type']=='nhi')
                                    <tr name="appended">
                                        <td> <a href="http://20.194.7.52:3000/{{ $customerIdentity[0]['upload_identity'] }}" target="_blank">{{ $customerIdentity[0]['upload_identity'] }} </a> </td>
                                    </tr>
                                    @elseif ($customerIdentity[1]['id_type']=='nhi')
                                    <tr name="appended">
                                        <td> <a href="http://20.194.7.52:3000/{{ $customerIdentity[1]['upload_identity'] }}" target="_blank">{{ $customerIdentity[0]['upload_identity'] }} </a> </td>
                                    </tr>
                                    @else
                                    <tr name="appended">
                                        <td> <a href="" target="_blank"></a> </td>
                                    </tr>
                                    @endif
                                </tbody> -->
                            </table>
                            <input type="file" class="custom-file-input" id="nhiFormUpload" name="customerIdUpload" data-show-upload="false" multiple="multiple" />
                            <span class="text-mute">
                                *) upload new file(s)
                            </span>
                        </div>
                    </div>
                </div>
                <!--Carousel Wrapper-->
                <div class="col-lg-6 col-md-6">
                    <div class="card" style="height: 122%;">
                        <!--  -->
                        <!-- im sorry if my code not good  -->
                        @foreach ($customerIdentity as $_identity)
                        @if (strtolower($_identity['id_type']) == 'nhi')
                        <div class="row">
                            @php $imgs = explode(';',$_identity['upload_identity']); @endphp
                            <div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.1)">
                                <div id="nhiCarousel" class="carousel slide" data-ride="carousel" align="center">
                                    <div class="carousel-inner" style="height:250px; width:100%;padding: 10px;">
                                        @php $i=0 @endphp
                                        @foreach ($imgs as $img)
                                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                            <a href="{{ config('app.api.asset').$img }}" data-fancybox="images" data-caption="Data Upload ARC">
                                                <img src="{{ config('app.api.asset').$img }}" class="img-fluid">
                                            </a>
                                        </div>
                                        @php $i++ @endphp
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#nhiCarousel" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#nhiCarousel" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                    <ol class="carousel-indicators list-inline mt-0">
                                        @php $i=0 @endphp
                                        @foreach ($imgs as $img)
                                        <li class="list-inline-item {{ $i == 0 ? 'active' : '' }}">
                                            <a id="carousel-selector-0" class="selected" data-slide-to="{{ $i }}" data-target="#nhiCarousel" style="width: 300px; height: 500px;overflow: auto;">
                                                <img src="{{ config('app.api.asset').$img }}" style="width: auto;height: 90px;">
                                            </a>
                                        </li>
                                        @php $i++ @endphp
                                        @endforeach
                                        <!-- im sorry if my code not good  -->
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










<!-- <?php $no = 1; ?>
@foreach($customerIdentity as $cId)
<div class="card card-custom card-border mb-10" id="rowId{{$no}}">
    <div class="card-header">
        <div class="card-title">
            &nbsp;
        </div>
        <div class="card-title pull-right">
            <button class="btn btn-sm btn-danger" onclick="deleteRowId({{$no}})"><i class="flaticon2-trash"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="labelType">ID Type</label>
                    <select class="form-control selectpicker" id="id_type{{$no}}" name="id_type">
                        <option {{ $cId['id_type']=='arc' ? 'selected' : '' }} value="arc">ARC</option>
                        <option {{ $cId['id_type']=='nhi' ? 'selected' : '' }} value="nhi">NHI</option>
                    </select>
                </div>


                @if ($cId['id_type'] == 'ARC' || $cId['id_type'] == 'arc')
                <div class="form-group">
                    <label for="labelType">ARC No.</label>
                    <input class="form-control" value="{{  $cId['nomor'] }}" type="text" id="nomor_identity{{$no}}" name="nomor_identity" />
                </div>
                @endif
                @if ($cId['id_type']=='passport')
                <div class="form-group">
                    <label for="labelType">Passport No.</label>
                    <input class="form-control" value="{{  $cId['nomor'] }}" type="text" id="passport{{$no}}" name="nomor_identity" />
                </div>
                @endif

                @if ($cId['id_type']=='nhi')
                <div class="form-group">
                    <label for="labelType">NHI No.</label>
                    <input class="form-control" value="{{  $cId['nomor'] }}" type="text" id="passport{{$no}}" name="nomor_identity" />
                </div>
                @endif

                @if ($cId['id_type'] == 'ARC' || $cId['id_type'] == 'arc')
                <div class="form-group">
                    <label for="labelType">ARC Expired Date</label>
                    <input type="text" value="{{ $customerIdentity[0]['id_expire']  }}" class="form-control" placeholder="YYYY-MM-DD" id="ARCexpiredDate" name="id_expire" />
                    <input class="form-control" value="{{ $cId['id_expire'] }}" type="date" id="id_expire{{$no}}" name="id_expire" />

                </div>
                @endif




                @if ($cId['id_type'] == 'nhi')
                <div class="form-group">
                    <label for="labelType">Date of Issue</label>
                    <input class="form-control" value="{{ $cId['id_expire'] }}" type="date" id="id_expire{{$no}}" name="id_expire" />
                </div>
                @endif


                <div class="form-group">
                    <label>Customer Identity</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customerIdUpload{{$no}}" name="customerIdUpload" />
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <span class="text-mute">
                        *) upload new file(s)
                    </span>
                </div>

            </div>
            <div class="col-md-6">
                @if ($cId['upload_identity'] != null)
                <?php
                $uploadData = $cId['upload_identity'];
                $uploadUrl = 'https://sip.telin.tw/' . $cId['upload_identity'];
                ?>

                <div id="cardImg" onclick="openModalPhoto('{{ $uploadUrl }}')" style="cursor:pointer;margin-top:25px;background: url({{ $uploadUrl }}) center center no-repeat; background-size: cover; height:280px; width:100%;padding: 10px; border: solid 3px #eee">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<?php $no++ ?>
@endforeach
<div id="rowMultiple"></div> -->





<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>