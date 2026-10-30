<?php $rand = rand(9999, 99999);?>
<div class="row" id="remove{{$rand}}">
                            <div class="col-sm-4">
                            <div class="form-group">
                            <!-- <label class="control-label">Days</label> -->
                            <input class="form-control"  name="day[]" value="" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <!-- <label class="control-label">Start Time</label> -->
                            <input class="form-control"  name="start_time[]" value="" type="time">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <!-- <label class="control-label">End Time</label> -->
                            <input class="form-control"  name="end_time[]" value="" type="time">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <!-- <label class="control-label">Select Type</label> -->
                            <select class="form-control" name="status[]">
                            <option value="">Select Type</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                            <input class="form-control"  name="timing_order_by[]" value="" type="text">
                        </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removeday('{{$rand}}')">-</button>
                        </div>
                            </div>