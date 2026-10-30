    
	
<?php $rand = rand(9999,99999);?>
                        <div class="form-group col-md-4">
                      <label class="control-label">Section Heading 1</label> 
                      <input class="form-control"  name="service_heading[]" type="text">
                      </div>
                      <div class="form-group col-md-4">
                      <label class="control-label">Select Button Type</label> 
                      <select class="form-control" id="button_type{{$rand}}" name="button_type[]" onchange="buttontype('{{$rand}}')">
                          <option value="">Select Button Type</option>
                          <option value="Yes">Yes</option>
                          <option value="No" selected>No</option>
                      </select>
                      </div>
                      <div class="showtype{{$rand}}" style="display: none;">
                      <div class="form-group col-md-4">
                      <label class="control-label">Button Name</label> 
                      <input class="form-control"  name="button_name[]" type="text">
                      </div>
                      <div class="form-group col-md-4">
                      <label class="control-label">Button Url</label> 
                      <input class="form-control"  name="button_url[]" type="text">
                      </div>
                      <div class="form-group col-md-12">
                      <label class="control-label">Button Style</label> 
                      <textarea class="form-control"  name="button_style[]"></textarea>
                      </div>
                      </div>
                      <div class="form-group col-md-4">
                      <label class="control-label">Select Section Appointment Form</label> 
                      <select class="form-control" name="appointment_side[]">
                          <option value="">Select Button Type</option>
                          <option value="upper" selected>Upper Side</option>
                          <option value="down" >Down Side</option>
                      </select>
                      </div>

                      <div class="form-group col-md-4">
                      <label class="control-label">Select Background Type</label> 
                      <select class="form-control" id="bg_type{{$rand}}" name="bg_type[]" onchange="bgtypeimage('{{$rand}}')">
                          <option value="">Select Background Type</option>
                          <option value="white">White</option>
                          <option value="bgcolor">Background Color</option>
                          <option value="bgimage">Background Image</option>
                      </select>
                      </div>

                      <div class="bgcolor{{$rand}}" style="display: none;">
                      <div class="form-group col-md-12">
                      <label class="control-label">Background Color Style</label> 
                      <textarea class="form-control"  name="bgcolor_style[]"></textarea>
                      </div>
                      </div>

                      <div class="bgimagetype{{$rand}}" style="display: none;">
                      <div class="form-group col-md-12">
                      <label class="control-label">Bg Image</label> 
                      <input type="file" name="bgimage[]">
                      </div>
                      </div>
                        <div class="col-sm-12">
        				<label class="control-label">Section Type 1</label>              
                        <textarea class="form-control editor{{$rand}}" id="editor{{$rand}}" name="service1[]" rows="3"></textarea>
                        <span class="help-block"></span>
                        </div>
                        
                        <div class="col-sm-12">
                        <input type="hidden" name="service2[]" value="">
                        <input type="file" name="serviceimage[]" value="" class="displaynone">
                        <input type="hidden" name="servicesection[]" value="servicesection">
                        <input class="form-control"  name="service_heading1[]" type="hidden">
                        <input class="form-control"  name="tab_heading[]" type="hidden">
                        <input class="form-control"  name="tabpragraph[]" type="hidden">
                        </div>
                        <div class="form-group col-sm-12">
                        <label>Add More Section</label>
                        <select class="form-control" id="service_list{{$rand}}" name="service_type[]" onchange="servicelist('{{$rand}}')">
                        <option value="">Add More Section</option>
                        <option value="fulltext">Full Text</option>
                        <option value="imagetext">Left Image and Right Text</option>
                        <option value="rightimagetext">Right Image and Left Text</option>
                        <option value="leftheading">Left Heading and Right Text</option>
                        <option value="twoparagraph">Two Paragraph</option>
                        <option value="twoparagraphbgcolor">Two Paragraph BG Color</option>
                        <option value="threeparagraph">Three Paragraph or More</option>
                        <option value="sectionthreeparagraph">Section Three Paragraph or More</option>
                        <option value="tabparagraph">Tab Paragraph or More</option>
                        <option value="sectiontabparagraph">Section Tab Paragraph or More</option>
                        </select>
                        </div>
                        
                        <div id="servicelist{{$rand}}"></div>

<script>
    $('.editor{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });
   
    function buttontype(rand) {
        var button_type = $('#button_type' +rand).val();
        // alert(button_type);
        if (button_type == 'Yes') {
            $('.showtype'+rand).show();
        } else if (button_type == 'No') {
            $('.showtype'+rand).hide();
        }
    }

    function bgtypeimage(rand){
        var bg_type = $('#bg_type'+rand).val();
        // alert(button_type);
        if (bg_type == 'bgcolor') {
            $('.bgcolor'+rand).show();
            $('.bgimagetype'+rand).hide();
        } else if (bg_type == 'bgimage') {
            $('.bgcolor'+rand).hide();
            $('.bgimagetype'+rand).show();
        } else if (bg_type == 'white') {
            $('.bgcolor'+rand).hide();
            $('.bgimagetype'+rand).hide();
        }
    }
</script>



