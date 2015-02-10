
@extends('template.template')

<!-- awal section content -->
@section('content')

	<div class="span12">
		<div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Pemesanan SukuCadang</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <br>
                  <div class="span11">
{{Form::open(["route"=>"pemesanan.create","class"=>"form-horizontal","id"=>"ajaxform"])}}  
<div class='row'>
  <div class='span5'>

<div class='control-group group' id='kode_transaksi-group'>
{{Form::label("kode_transaksi","Tanggal",['class'=>' control-label'])}}
<div class='controls'>
{{Form::text("kode_transaksi","",
          [
          'class'=>'',
          'id'=>"kode_transaksi",          
            'title'=>"kode_transaksi",
          'placeholder'=>"Kode Transaksi"])}}   
</div>
</div> <!-- end control group-->

<div class='control-group group' id='kode_transaksi-group'>
{{Form::label("kode_transaksi","Kode Transaksi",['class'=>' control-label'])}}
<div class='controls'>
{{Form::text("kode_transaksi","",
          [
          'class'=>'',
          'id'=>"kode_transaksi",          
            'title'=>"kode_transaksi",
          'placeholder'=>"Kode Transaksi"])}}   
</div>
</div> <!-- end control group-->

  </div><!-- end span -->
  
  <div class='span5 pull-right'>

<div class='control-group group pull-right' id='kode_transaksi-group'>
{{Form::label("kode_transaksi","Kode Transaksi",['class'=>' control-label'])}}
<div class='controls'>
{{Form::text("kode_transaksi","",
          [
          'class'=>'',
          'id'=>"kode_transaksi",          
            'title'=>"kode_transaksi",
          'placeholder'=>"Kode Transaksi"])}}   
</div>
</div>

  </div><!-- end span -->

</div> <!-- end row -->
<hr>
<div class='control-group group pull-right' id='kode_transaksi-group'>
{{Form::label("kode_transaksi","Kode SukuCadang",['class'=>' control-label'])}}
<div class='controls'>
{{Form::text("kode_transaksi","",
          [
          'class'=>'span4 barcode',
          'id'=>"kode_sc",          
            'title'=>"kode_transaksi",
          'placeholder'=>"Kode SukuCadang"])}}   
<a href ='#'class='btn btn-primary'>cari</a>
</div>
</div> <!-- end control group-->

<table class='table'>
<tr>
<td>Kode</td>
<td>Nama</td>
<td>Harga</td>
<td>Banyak</td>
<td>Diskon</td>
<td>subtotal</td>
</tr>
</table>
<div class='clearfix'></div>
<hr>
<div class='form-actions'>
{{Form::submit('Simpan',["class"=>"btn btn-primary"])}}
<button id="batal-btn" class="btn">Kembali</button>
</div>
{{Form::close()}}

				  </div>


				</div>
			  </div>
			</div>
		</div>
	</div>  
@stop




@section('js')
<script type="text/javascript">

$('.barcode').on('keyup',function(e){
  e.preventDefault();
  alert('a');
});

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
                    
                },
                error: function(xhr, textStatus, thrownError) {
                    alert('Something went to wrong.Please Try again later...');
                    submit = true;
                }
            });
      }
            return false;
    });

</script>
@stop



