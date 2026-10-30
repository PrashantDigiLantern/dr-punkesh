<?php $rand = rand(9999, 99999);?>
<div class="row" id="remove{{$rand}}">
<div class="col-sm-2">
                            <div class="form-group">
                                <input class="form-control" name="education_year[]" type="text">
                            </div>
                        </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            <input class="form-control"  name="education_name[]" type="text">
                        </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <input class="form-control"  name="education_college[]" type="text">
                        </div>
                        </div>
                        <div class="col-sm-1">
                        <div class="form-group">
                        <input class="form-control"  name="education_order_by[]" type="text">
                        </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removetype('{{$rand}}')">-</button>
                        </div>
                            </div>
                        </div>