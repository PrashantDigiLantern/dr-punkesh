<?php $rand = rand(9999,99999);
$countparagraph = $_POST['countsec'];
?>

                     <div id="removethreesec{{$rand}}">
                     <div class="form-group col-md-12">
                      <label class="control-label">Tab Heading</label> 
                      <input class="form-control tabheading{{$rand}}"  name="tab_heading[]" type="text">
                      </div>
                      <div class="form-group col-md-12">
                      <label class="control-label">Tab Image</label> 
                      <input class="form-control tabimage{{$rand}}"  name="tabimage[]" type="file">
                      </div>
                      <div class="form-group col-md-12">
                      <label class="control-label">Tab Heading2</label> 
                      <input class="form-control tabheading2{{$rand}}"  name="tab_heading2[]" type="text">
                      </div>
                      <div class="col-md-11">
        			      	<label class="control-label">Tab Pragraph Section</label>              
                        <textarea class="form-control ckeditor editorleft{{$rand}}" id="editorleft{{$rand}}" name="tabpragraph[]" rows="3"></textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1">
                            <input type="text" class="form-control orderby{{$rand}}" name="orderbytabpragraph[]">
                        <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removethreepragraph('{{$rand}}')">-</button>
                        </div>
                        </div>
                        
                        <script>
    $('.editorleft{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
        $(this).attr('name', 'tabpragraph<?php echo $countparagraph;?>[]');
    });

    $('.orderby{{$rand}}').each(function () {
        $(this).attr('name', 'orderbytabpragraph<?php echo $countparagraph;?>[]');
    });

    $('.tabheading{{$rand}}').each(function () {
        $(this).attr('name', 'tab_heading<?php echo $countparagraph;?>[]');
    });
    $('.tabheading2{{$rand}}').each(function () {
        $(this).attr('name', 'tab_heading2'+count+'[]');
    });
    $('.tabimage{{$rand}}').each(function () {
        $(this).attr('name', 'tabimage<?php echo $countparagraph;?>[]');
    });

    changeeditor('{{$rand}}','{{$countparagraph}}');
</script>