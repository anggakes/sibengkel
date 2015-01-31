
{{HTML::script("assets/jquery-2.0.3.min.js")}}


@if($type=='create')
	{{Form::open(["route"=>$name.'.store',"class"=>"form-horizontal","id"=>"ajaxform"])}}  
@elseif($type=='edit')
	{{Form::open(["route"=>[$name.'.update',$value->id],"class"=>"form-horizontal","id"=>"ajaxform"])}}  
@endif


@foreach($fields as $v)
<?php
	echo "<div class='form-group'>";
  echo "<div id='".$v['name']."-error' class='error' style='display: none'></div>";
	echo Form::label($v['name'],$v['label'],['class'=>'col-sm-3 control-label']);
    echo "<div class='col-sm-9'>";

switch ($v['type'])
{
	case "text":
    echo Form::text($v['name'],
    			@$value->$v['name'],
    			[
    			'class'=>'form-control',
    			'id'=>$v['name'],
    			'placeholder'=>$v['placeholder']]);
  	break;
  
  case "textarea":
  	echo Form::textarea($v['name'],@$value->$v['name'],[
    			'class'=>'form-control',
    			'id'=>$v['name'],
    			'placeholder'=>$v['placeholder']]);
  	break;

	case "select":
  	echo Form::select($v['name'], 
  				$v['list'], 
  				@$value->$v['name']);
  	break;

  case "multiselect":
  echo  "<select name='".$v['name']."[]' class='js-example-basic-multiple' multiple='multiple'>";
  foreach ($v['list'] as $key=>$l){
    echo "<option value='".$key."'>".$l."</option>";  
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
  echo "</div></div>";

?>
@endforeach

{{Form::submit('simpan')}}
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
                    $(".error").hide().empty(); 
                },
                success: function(data) {
                    if(data.success == false)
                    {
                        var arr = data.errors;
                        $.each(arr, function(index, value)
                        {
                            if (value.length != 0)
                            {
                                $("#"+index+"-error").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                            }
                            $("#"+index+"-error").slideDown();
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