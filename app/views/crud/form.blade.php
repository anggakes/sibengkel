

                
@if($type=='create')
	{{Form::open(["route"=>$name.'.store',"class"=>"form-horizontal","id"=>"ajaxform"])}}  
@elseif($type=='edit')
	{{Form::open(["route"=>[$name.'.update',$value->id],"class"=>"form-horizontal","id"=>"ajaxform"])}}  
@endif


@foreach($fields as $v)
<?php
	echo "<div class='control-group group' id='".$v['name']."-group'>";
  	echo Form::label($v['name'],$v['label'],['class'=>' control-label']);
  
  echo "<div class='controls'>";

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
  break;
  
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
echo "<span class='help-inline error error-text' id='".$v["name"]."-error'></span>";

echo "</div>";//controls


echo "</div>";//form group

?>
@endforeach


<div class='form-actions'>
{{Form::submit('simpan',["class"=>"btn btn-primary"])}}
</div>
<!-- end form -->
{{ Form::close() }}




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
                    $(".group").removeClass("error");
                   $(".error-text").html('');
                },
                success: function(data) {
                    if(data.success == false)
                    {
                        var arr = data.errors;
                        $.each(arr, function(index, value)
                        {
                            if (value.length != 0)
                            {   $("#"+index+"-group").addClass("error");
                                $("#"+index+"-error").html('<strong>'+ value +'</strong>');
                            }
                            
                        });
                        submit = true;
                    } else {

                          alert('Data berhasil disimpan');
                          submit = true;
                          location.reload();
                        
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
