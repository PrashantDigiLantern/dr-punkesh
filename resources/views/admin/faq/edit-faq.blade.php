@extends('admin.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
  <div class="card cardsec">
                <div class="card-body"> 
                      <div class="page-title pagetitle">
        <h1>Edit FAQ</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/faq')}}">FAQ</a></li>
          <li><a href="{{url('/admin/faq')}}">List FAQ</a></li>
          <li class="active">Edit FAQ</li>
        </ul>
      </div>   
      </div>  
      </div> 
       <form action="{{URL::to('/admin/update_faq'.'/'.$edit->id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
       <div class="card">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                    <div class="row">
                
                <div class="form-group col-sm-12">
                    <label>Question</label>              
                    <textarea class="form-control ckeditor" name="question" rows="3" >{{$edit->question}}</textarea>
                    <span class="help-block"></span>
				</div>
                
               <div class="form-group col-sm-12">
                    <label>Answer</label>              
                    <textarea class="form-control ckeditor" name="answer" rows="3" >{{$edit->answer}}</textarea>
                    <span class="help-block"></span>
				</div>
               
               
                
				<div class="col-sm-12 marginT30">
					<button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
					<a class="btn btn-default icon-btn" href="{{url('/admin/faq')}}" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
				</div>
           
                </div>
                 </div>
                </div>
        </form>
        
  </section>
</section>
<script>
   CKEDITOR.replace( 'textArea' );
</script>

@endsection