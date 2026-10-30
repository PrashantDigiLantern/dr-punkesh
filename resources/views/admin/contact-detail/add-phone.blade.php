<?php $rand = rand(9999, 99999); ?>
<div class="row" id="remove{{$rand}}">
    <div class="col-sm-2">
        <div class="form-group">
            <select class="form-control" name="phonestatus[]">
                <option value="">Select Type</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <select class="form-control" name="phonecode[]" required>
                <option>Select Country Code</option>
                @foreach($country as $countrylist)
                <option value="{{$countrylist->phonecode}}">{{$countrylist->name}} {{$countrylist->phonecode}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <input class="form-control" name="phone[]" type="text">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <input class="form-control" name="phone_order_by[]" value="" type="text">
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <button class="btn btn-danger" type="button" onclick="removephone('{{$rand}}')">-</button>
        </div>
    </div>
</div>