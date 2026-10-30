<?php $rand = rand(9999,99999);
$countparagraph = $_POST['countsec'];
?>

                     <div id="removethreesec{{$rand}}">
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

    $('.orderby{{$rand}}').each(function () {
        $(this).attr('name', 'orderbypragraph<?php echo $countparagraph;?>[]');
    });

    changeeditor('{{$rand}}','{{$countparagraph}}');
</script>