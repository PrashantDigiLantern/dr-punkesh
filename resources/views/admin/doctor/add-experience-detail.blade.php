<?php $rand = rand(9999, 99999);?>
<div class="row" id="remove{{$rand}}">
<div class="row">
<div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Experience Year</label>
                                <input class="form-control" name="experience_year[]" type="text">
                            </div>
                        </div>
</div>
<div class="row">
<div class="col-sm-11">
                            <div class="col-sm-12">
                            <div class="form-group">
                            <label class="control-label">Experience Name</label>
                            <textarea class="form-control expname{{$rand}}" id="expname{{$rand}}" name="experience_name[]" rows="3"></textarea>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                        <label class="control-label">Experience Address</label>
                        <textarea class="form-control expcollege{{$rand}}" id="expcollege{{$rand}}" name="experience_address[]" rows="3"></textarea>
                        </div>
                        </div>
</div>
                        <div class="col-sm-1 paddingL0">
                        <div class="formorder">
                        <label class="control-label orderbydoct">Order By</label>
                        <input class="form-control"  name="experience_order_by[]" type="text">
                        </div>
                        <div>
                            <label class="control-label orderbydoct">Design Section Set</label>
                            <select class="form-control" name="experience_design_set[]">
                                <option value="">Select Section Set</option>
                                @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if($i=="1") selected @endif>{{$i}}</option>
                               @endfor
                            </select>
                        </div>
                            <div>
                            <button class="btn btn-danger marginT38 adddoctp" type="button" onclick="removeexperience('{{$rand}}')">-</button>
                        </div>
                            </div>
</div>
<script>
    $('.expname{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });

    $('.expcollege{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });

    </script>
                        </div>