<?php $rand = rand(9999, 99999); ?>
<div class="row" id="remove{{$rand}}">
    <div class="col-sm-4">
        <div class="form-group">
            <input class="form-control" name="menu_name[]" value="" type="text">
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <input class="form-control" name="menu_url[]" value="" type="text">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <input class="form-control" name="menu_order_by[]" value="" type="text">
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <button class="btn btn-danger" type="button" onclick="removemenu('{{$rand}}')">-</button>
        </div>
    </div>
</div>