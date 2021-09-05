<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>ID :</label>
            <div class="input-group">
                <select class="form-control selectpicker" name="id_type" id="id_type">
                    <option value="" selected>Not Available</option>
                    <option value="passport">
                        {{ strtoupper('passport') }}
                    </option>
                    <option value="arc">
                        {{ strtoupper('arc') }}
                    </option>
                    <option value="taiwan_id">
                        {{ strtoupper('taiwan_id') }}
                    </option>
                </select>
                <input type="text" class="form-control" placeholder="Input ID Number" name="id_number"
                    id="id_number-" />
                <input type="text" class="form-control" placeholder="Expired Date" name="expdate" id="expdate-" />
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group ml-4 mr-4">
            <div name="upload-identities" id="upload-identities-${length}"></div>
            <span class="text-mute">
                *) upload new file(s), means you are adding file in DB
            </span>
        </div>
    </div>
</div>
