<?php $rand = rand(9999, 99999);?>
<div id="remove{{$rand}}">
<div class="row">
<div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Education Year</label>
                                <input class="form-control" name="education_year[]" type="text">
                            </div>
                        </div>
</div>
<div class="row">
<div class="col-sm-11">
                            <div class="col-sm-12">
                            <div class="form-group">
                            <label class="control-label">Education Name</label>
                            <textarea class="form-control eduname{{$rand}}" id="eduname{{$rand}}" name="education_name[]" rows="3"></textarea>
                            <!-- <input class="form-control"  name="education_name[]" type="text"> -->
                        </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label class="control-label">Education College</label>
                            <textarea class="form-control educollege{{$rand}}" id="educollege{{$rand}}" name="education_college[]" rows="3"></textarea>
                            <!-- <input class="form-control"  name="education_college[]" type="text"> -->
                        </div>
                        </div>
</div>
                        <div class="col-sm-1 paddingL0">
                        <div class="formorder">
                        <label class="control-label orderbydoct">Order By</label>
                        <input class="form-control"  name="education_order_by[]" type="text">
                        </div>
                        <div>
                            <label class="control-label orderbydoct">Design Section Set</label>
                            <select class="form-control" name="education_design_set[]">
                                <option value="">Select Section Set</option>
                                @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if($i=="1") selected @endif>{{$i}}</option>
                               @endfor
                            </select>
                        </div>
                            <div>
                            <button class="btn btn-danger marginT38 adddoctp" type="button" onclick="removetype('{{$rand}}')">-</button>
                        </div>
                            </div>
</div>
                        

                        <script>
    $('.eduname{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });

    $('.educollege{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });

    </script>

</div>