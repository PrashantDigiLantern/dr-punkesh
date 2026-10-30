<?php $rand = rand(9999,99999);?>
                      <div class="form-group col-md-12">
                      <label class="control-label">Section Heading Type 3</label> 
                      <input class="form-control"  name="service_heading[]" type="text">
                      </div>
                      <div class="col-md-12">
        				<label class="control-label">Section Type 3</label>              
                        <textarea class="form-control ckeditor editor{{$rand}}" id="editor{{$rand}}" name="service1[]" rows="3"></textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-sm-12">
                        <input type="file" name="serviceimage[]" value="" class="displaynone">
                        <input type="hidden" name="service2[]" value="">
                        </div>
                      <div class="form-group col-sm-12">
                      <label>Add More Section</label>
                        <select class="form-control" id="service_list{{$rand}}" name="service_type[]" onchange="servicelist('{{$rand}}')">
                        <option value="">Add More Section</option>
                        <option value="fulltext">Full Text</option>
                        <option value="imagetext">Image and Text</option>
                        <option value="leftheading">Left Heading and Right Text</option>
                        <option value="twoparagraph">Two Paragraph</option>
                        </select>
                        </div>
                        <div id="servicelist<?php echo $rand;?>"></div>

                        <script>
    $('.editor{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });
   
</script>