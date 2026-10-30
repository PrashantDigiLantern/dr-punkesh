<?php $rand = rand(9999,99999);
$countparagraph = $_POST['countsec'];
?>

                     <div id="removethreesec{{$rand}}">
                     <div class="form-group col-md-12">
                      <label class="control-label">Education Name</label> 
                      <input class="form-control tabheading{{$rand}}"  name="education_name[]" type="text">
                      </div>
                      <div class="form-group col-md-12">
                      <label class="control-label">Year</label> 
                      <input class="form-control tabheading2{{$rand}}"  name="education_year[]" type="text">
                      </div>
                      <div class="col-md-11">
        			      	<label class="control-label">Education College</label>              
                        <textarea class="form-control ckeditor editorleft{{$rand}}" id="editorleft{{$rand}}" name="education_college[]" rows="3"></textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1">
                            <input type="text" class="form-control orderby{{$rand}}" name="education_order_by[]">
                            <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removethreepragraph('{{$rand}}')">-</button>
                        </div>
                        </div>
                        
                        <script>
    $('.editorleft{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
        $(this).attr('name', 'education_college<?php echo $countparagraph;?>[]');
    });

    $('.orderby{{$rand}}').each(function () {
        $(this).attr('name', 'education_order_by<?php echo $countparagraph;?>[]');
    });

    $('.tabheading{{$rand}}').each(function () {
        $(this).attr('name', 'education_name<?php echo $countparagraph;?>[]');
    });
    $('.tabheading2{{$rand}}').each(function () {
        $(this).attr('name', 'education_year'+count+'[]');
    });
    // $('.tabimage{{$rand}}').each(function () {
    //     $(this).attr('name', 'tabimage<?php echo $countparagraph;?>[]');
    // });

    // changeeditor('{{$rand}}','{{$countparagraph}}');
</script>