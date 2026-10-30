
     
      @php 
     
    $clc_mnu_id =  explode(',', $cfgplan[0]->cfgmnu_mnu_id);
    $clc_op_id =  explode(',', $cfgplanorg[0]->oper_op_id);
     @endphp
     <style>
.treemenuview{
  margin-left: 50px;
  list-style: none;
}
.menulistdata{
    margin-left: 26px;
    list-style: none;
    margin-top: 0px;
}
.checkpermission{
    margin: 0px 0px;
}
.treemenuview li{
    line-height: 28px;
    margin-bottom: 5px;
}
.menulistdata li{
    line-height: 0px;
    margin-bottom: 0px;
}
       </style>
     <div class="col s6">
<?php //print_r($menu);?>
     <h6><b>Backend</b></h6><br><br>
     <ul class="treemenuview">
      @foreach($menu as $key => $menulist)     
      @if($menulist->mnu_type=='backend')
      
        <li>
                <input type="checkbox" name="menu[]" id="{{'menu-'.$menulist->mnu_id}}" value="{{ $menulist->mnu_id }}" @if(in_array($menulist->mnu_id,$clc_mnu_id)) checked @endif/>
                <label for="{{'menu-'.$menulist->mnu_id}}" class="menucheck checkpermission @if(in_array($menulist->mnu_id,$clc_mnu_id)) custom-checked @else custom-unchecked @endif">{{ $menulist->mnu_name }}</label>
                @if($menulist->mnu_dropdown=='Yes')
                <ul class="menulistdata">
              @foreach($operations as $operationslist)
              @if($operationslist->cfg_mun_id == $menulist->mnu_id)
              <li>
              <label class="subcheck">
                <input type="checkbox" name="operation[]" id="{{'menu-'.$menulist->mnu_id.'-'.$operationslist->op_id}}" value="{{ $operationslist->op_id }}" @if(in_array($operationslist->op_id,$clc_op_id)) checked @endif/>
                <label for="{{'menu-'.$menulist->mnu_id.'-'.$operationslist->op_id}}" class="menucheck @if(in_array($operationslist->op_id,$clc_op_id)) custom-checked @else custom-unchecked @endif">{{ $operationslist->op_name }} {{$operationslist->op_mnu_id}}</label>
</li>
            @endif
            @endforeach
            </ul>
            @endif
                </li>
  
            @endif
            @endforeach
            </ul>
     </div>
     <!-- <div class="col s6">
     <h6><b>Site Backend</b></h6><br><br>
     @foreach($menu as $key => $menulist)
            @if($menulist->mnu_type=='backend')
            <ul class="treemenuview">
        <li>
                <input type="checkbox" name="menu[]" id="{{'menu-'.$menulist->mnu_id}}" value="{{ $menulist->mnu_id }}" @if(in_array($menulist->mnu_id,$clc_mnu_id)) checked @endif/>
                <label for="{{'menu-'.$menulist->mnu_id}}" class="menucheck @if(in_array($menulist->mnu_id,$clc_mnu_id)) custom-checked @else custom-unchecked @endif">{{ $menulist->mnu_name }}</label>
                <ul class="menulistdata">
                @foreach($operations as $operationslist)
              @if($operationslist->cfg_mun_id == $menulist->mnu_id)
              <li>
                <input type="checkbox" name="operation[]" id="{{'menu-'.$menulist->mnu_id.'-'.$operationslist->op_id}}" value="{{ $operationslist->op_id }}" @if(in_array($operationslist->op_id,$clc_op_id)) checked @endif/>
                <label for="{{'menu-'.$menulist->mnu_id.'-'.$operationslist->op_id}}" class="menucheck @if(in_array($operationslist->op_id,$clc_op_id)) custom-checked @else custom-unchecked @endif">{{ $operationslist->op_name }} {{$operationslist->op_mnu_id}}</label>
                </li>
            @endif
            @endforeach
            </ul>
                </li>
    </ul>
            @endif
      @endforeach
      </div> -->
     
      {{-- page script --}}
@section('page-script')

@endsection
       
        <!-- <script src="{{asset('js/vendors.min.js')}}"></script> -->
<script>
// $(function() {

//   $('input[type="checkbox"]').change(checkboxChanged);
//   function checkboxChanged() {
//     // alert('hi');
//     var $this = $(this),
//         checked = $this.prop("checked"),
//         container = $this.parent(),
//         siblings = container.siblings();

//     container.find('input[type="checkbox"]')
//     .prop({
//         indeterminate: false,
//         checked: checked
//     })
//     .siblings('label')
//     .removeClass('custom-checked custom-unchecked custom-indeterminate')
//     .addClass(checked ? 'custom-checked' : 'custom-unchecked');

//     checkSiblings(container, checked);
//   }

//   function checkSiblings($el, checked) {
//     var parent = $el.parent().parent(),
//         all = true,
//         indeterminate = false;

//     $el.siblings().each(function() {
//       return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
//     });

//     if (all && checked) {
//       parent.children('input[type="checkbox"]')
//       .prop({
//           indeterminate: false,
//           checked: checked
//       })
//       .siblings('label')
//       .removeClass('custom-checked custom-unchecked custom-indeterminate')
//       .addClass(checked ? 'custom-checked' : 'custom-unchecked');

//       checkSiblings(parent, checked);
//     } 
//     else if (all && !checked) {
//       indeterminate = parent.find('input[type="checkbox"]:checked').length > 0;

//       parent.children('input[type="checkbox"]')
//       .prop("checked", checked)
//       .prop("indeterminate", indeterminate)
//       .siblings('label')
//       .removeClass('custom-checked custom-unchecked custom-indeterminate')
//       .addClass(indeterminate ? 'custom-indeterminate' : (checked ? 'custom-checked' : 'custom-unchecked'));

//       checkSiblings(parent, checked);
//     } 
//     else {
//       $el.parents("li").children('input[type="checkbox"]')
//       .prop({
//           indeterminate: false,
//           checked: checked
//       })
//       .siblings('label')
//       .removeClass('custom-checked custom-unchecked custom-indeterminate')
//       .addClass('custom-indeterminate');
//     }
//   }
// });
</script>
