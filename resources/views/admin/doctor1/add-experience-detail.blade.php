<?php $rand = rand(9999, 99999);?>
<div class="row" id="remove{{$rand}}">
<div class="col-sm-2">
                            <div class="form-group">
                                <input class="form-control" name="experience_year[]" type="text">
                            </div>
                        </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            <input class="form-control"  name="experience_name[]" type="text">
                        </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                        <input class="form-control"  name="experience_address[]" type="text">
                        </div>
                        </div>
                        <div class="col-sm-1">
                        <div class="form-group">
                        <input class="form-control"  name="experience_order_by[]" type="text">
                        </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removeexperience('{{$rand}}')">-</button>
                        </div>
                            </div>
                        </div>