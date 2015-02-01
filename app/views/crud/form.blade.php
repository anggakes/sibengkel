@extends('template.template')

<!-- awal section content -->
@section('content')

<div class="span8">
<div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Tambah {{$name}}</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <br>
                
@if($type=='create')
	{{Form::open(["route"=>$name.'.store',"class"=>"form-horizontal","id"=>"ajaxform"])}}  
@elseif($type=='edit')
	{{Form::open(["route"=>[$name.'.update',$value->id],"class"=>"form-horizontal","id"=>"ajaxform"])}}  
@endif


@foreach($fields as $v)
<?php
	echo "<div class='control-group' id='".$v['name']."-group'>";
  	echo Form::label($v['name'],$v['label'],['class'=>' control-label']);
  
  echo "<div class='controls' id='".$v['name']."-error'>";

switch ($v['type'])
{
	case "text":
    echo Form::text($v['name'],
    			@$value->$v['name'],
    			[
    			'class'=>'',
    			'id'=>$v['name'],
    			'placeholder'=>$v['placeholder']]);
  	break;

  case "number":
  echo Form::number($v['name'],
          @$value->$v['name'],
          [
          'class'=>'',
          'id'=>$v['name'],
          'placeholder'=>$v['placeholder']]);
  break
  
  case "textarea":
  	echo Form::textarea($v['name'],@$value->$v['name'],[
    			'class'=>'',
    			'id'=>$v['name'],
    			'placeholder'=>$v['placeholder']]);
  	break;

	case "select":
  	echo Form::select($v['name'], 
  				$v['list'], 
  				@$value->$v['name'],
          [
          'class'=>'',
          'id'=>$v['name']]);
  	break;

  case "multiselect":

  $selected=array();

  if(isset($value)){
    foreach ($value->$v['name'] as $k => $o) {
      $selected[] = $o->id; 
    }
  }

  echo  "<select name='".$v['name']."[]' class='js-example-basic-multiple '  multiple='multiple'>";
  foreach ($v['list'] as $key=>$l){
    if(in_array($key, $selected)) {
      echo "<option value='".$key."' selected='true'>".$l."</option>"; 
    }  
    else{
      echo "<option value='".$key."'>".$l."</option>";
    }
  } 
  echo "</select>";
  echo HTML::script("assets/select2/select2.js");
  echo HTML::style("assets/select2/select2.css");
  echo "
  <script type='text/javascript'>
  $('.js-example-basic-multiple').select2();
  </script>
  ";
  break;
}

echo "</div>";

echo "</div>";

?>
@endforeach

<div class="control-group warning">
  <label class="control-label" for="inputWarning">Input with warning</label>
  <div class="controls">
    <input type="text" id="inputWarning">
    <span class="help-inline">Something may have gone wrong</span>
  </div>
</div>
<div class='form-actions'>
{{Form::submit('simpan',["class"=>"btn btn-primary"])}}
</div>
<!-- end form -->
{{ Form::close() }}

<!-- /widget-content --> 
                
              </div>
            </div>
          </div>
        </div><!-- end span6 -->



<!--Ajax form input-->

<script type="text/javascript">

$(document).ready(function() {

// submit function  ---------------------------------------------------------------------------------------            
       var submit =true;
        $('form#ajaxform').submit(function() {
          if(submit){
            submit = false;
            $.ajax({
                url : $( 'form#ajaxform' ).prop( 'action' ),
                type: 'post',
                cache: false,
                dataType: 'json',
                data: $('form#ajaxform').serialize(),
                beforeSend: function() { 
                    $(".error").hide().empty(); 
                },
                success: function(data) {
                    if(data.success == false)
                    {
                        var arr = data.errors;
                        $.each(arr, function(index, value)
                        {
                            if (value.length != 0)
                            {   $("#"+index+"-group").addClass("error");
                                $("#"+index+"-error").append('<span class="help-inline error" ><strong>'+ value +'</strong></span>');
                            }
                            
                        });
                        submit = true;
                    } else {

                          alert('Data berhasil disimpan');
                          submit = true;
                        
                    }
                },
                error: function(xhr, textStatus, thrownError) {
                    alert('Something went to wrong.Please Try again later...');
                    submit = true;
                }
            });
      }
            return false;
    });
// end of submit --------------------------------------------------------------------------------------------------------------------------
});
</script>

@stop

<!-- akhir section content -->