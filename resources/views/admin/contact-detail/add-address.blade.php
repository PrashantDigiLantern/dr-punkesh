<?php $rand = rand(9999, 99999);?>
<div class="row" id="remove{{$rand}}">
                            <div class="col-sm-4">
                            <div class="form-group">
                            <input class="form-control"  name="type[]" type="text">
                        </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removetype('{{$rand}}')">-</button>
                        </div>
                            </div>
                        </div>