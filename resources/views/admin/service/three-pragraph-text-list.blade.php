<?php $rand = rand(9999,99999);
$countparagraph = $_POST['countsec'];
?>

                     <div id="removethreesec{{$rand}}">
                     <div class="form-group col-md-12">
                      <label class="control-label">Heading</label>
                      <input class="form-control secheading{{$rand}}"  name="sec_heading[]" type="text">
                      </div>
                     <div class="form-group col-md-12">
                      <label class="control-label">Design Div class</lbel>
                      <textarea class="form-control" id="threedesignstart{{$rand}}" name="threedesignstart[]" col="12" rows="3"></textarea>
                      </div>
                      <div class="col-md-11">
        			      	<label class="control-label">Three Pragraph Section</label>
                        <textarea class="form-control ckeditor editorleft{{$rand}}" id="editorleft{{$rand}}" name="threepragraph[]" rows="3"></textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1">
                            <input type="text" class="form-control orderby{{$rand}}" name="orderbypragraph[]">
                        <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removethreepragraph('{{$rand}}')">-</button>
                        </div>
                        </div>

                        <script>
    $('.editorleft{{$rand}}').each(function () {
        CKEDITOR.replace($(this).prop('id'));
        $(this).attr('name', 'threepragraph<?php echo $countparagraph;?>[]');
    });

    $('.secheading{{$rand}}').each(function () {
        $(this).attr('name', 'sec_heading<?php echo $countparagraph;?>[]');
    });
    
    $('.orderby{{$rand}}').each(function () {
        $(this).attr('name', 'orderbypragraph<?php echo $countparagraph;?>[]');
    });

    $('.threedesignstart{{$rand}}').each(function () {
        $(this).attr('name', 'threedesignstart<?php echo $countparagraph;?>[]');
    });

    changeeditor('{{$rand}}','{{$countparagraph}}');
</script>
