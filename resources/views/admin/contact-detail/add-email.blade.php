<?php $rand = rand(9999, 99999); ?>
<div class="row" id="remove{{$rand}}">
    <div class="col-sm-2">
        <div class="form-group">
            <select class="form-control" name="emailstatus[]">
                <option value="">Select Type</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <input class="form-control" name="email[]" type="email">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <input class="form-control" name="email_order_by[]" value="" type="text">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <button class="btn btn-danger" type="button" onclick="removeemail('{{$rand}}')">-</button>
        </div>
    </div>
</div>