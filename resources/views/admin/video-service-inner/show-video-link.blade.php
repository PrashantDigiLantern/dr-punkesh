<?php $rand = rand(9999, 99999);?>
<div class="row" id="remove{{$rand}}">
                        <div class="form-group col-md-8" id="videoupload">
                            <label class="control-label">Service Video Link</label>
                            <input class="form-control"  name="service_video_link[]" type="text" required>
                        </div>
                        <div class="col-sm-4">
                            <button trpe="button" class="btn btn-danger marginT38" onclick="removelink('{{$rand}}')">-</button>
                        </div>
                        </div>