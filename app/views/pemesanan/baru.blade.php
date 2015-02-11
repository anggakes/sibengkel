
@extends('template.template')

<!-- awal section content -->
@section('content')
{{HTML::script("assets/jquery.autocomplete.js")}}
	<div class="span12">
		<div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Pemesanan SukuCadang</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content span12">
                  <br>
                  <div class="span11">
                    {{Form::open(["route"=>"pemesanan.create","class"=>"form-horizontal","id"=>"ajaxform"])}}  
                      <div class='row'>
                         <div class='pull-left'>
                          {{ HTML::image('assets/images/am.png', 'a picture', array('class' => 'span2 pull-left thumb', 'style' => 'margin-left:0px')) }}
                          {{ HTML::image('assets/images/kop.png', 'a picture', array('class' => 'thumb', 'style' => 'margin:10px')) }}
                          {{ HTML::image('assets/images/ahass.png', 'a picture', array('class' => 'span1 pull-right thumb', 'style' => 'margin-left:0px')) }}
                        </div>
                         <div class='pull-right' style='margin-left:-10px;margin-top:10px'>
                            <div class='control-group group' id='kode_transaksi-group'>
                              {{Form::label("kode_transaksi","Tanggal",['class'=>' control-label'])}}
                                <div class='controls right'>
                                  {{Form::text("kode_transaksi",date('d M Y'),
                                    [
                                    'class'=>'',
                                    'id'=>"kode_transaksi",          
                                      'title'=>"kode_transaksi",
                                    'placeholder'=>"Tanggal"]);
                                  }}   
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
                          </div>
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
                          </div>
                         </div><!-- end span -->
                    </div><!-- end row -->

                    <div class='row'>
                        <table id='tabel' class=''>
                            <thead class='alert'style='border:1px #ddd solid'>
                              <th width="80" rowspan="2">Aksi</th>
                              <th width="260" rowspan="2">Kode</th>
                              <th width='260'> Biaya Jasa Bengkel</th>
                              <th width="60" rowspan="2">@ Qty</th>
                              <th width="150" rowspan="2">@ Harga</th>
                              <th width="50" rowspan="2">@ Discount</th>
                              <th width='390' rowspan="2">Jumlah</th>
                              <tr><th width='260' style="border-top:1px solid silver"> Nota Suku Cadang</th></tr>
                            </thead>
                            <tbody>
                              <tr id="detailpakai">
                                <td width="80">
                                  <button type="button" value="Delete" onclick="deleteRow(this)" class='btn btn-danger btn-mini'><i class='btn-icon-only icon-minus-sign'></i></button>
                                </td>
                                <td width='260'>
                                  <input type="text" name="kode[]" class="span3" id="kode_0" placeholder="Kode" style="text-align: left;" readonly required/>
                                </td>
                                <td width='260'>
                                  <input type="text" name="jasa[]" class="span3 autocomplete" id="jasa_0" placeholder="Nama Jasa" style="text-align: left;" onclick="add_row(this)" onkeydown="autoc(this)" required/>
                                </td>
                                <td width='60'>
                                  <input type="number" name="qty[]" class="span1" idx="100" max="10" id="qty_0" title="0" min="1" step="1" placeholder="Quantity" style="text-align: right;" value="1" required/>
                                </td>
                                <td width='150'>
                                  <input type="number" name="harga[]" class="span2" id="harga_0" akuma="90" min="100" step="500" placeholder="Harga" style="text-align: right;" readonly required/>
                                </td>
                                <td width='50'>
                                  <input type="number" name="disc[]" class="span1" id="disc_0" value="0" min="0" max="100" step="1" placeholder="Discount" style="text-align: right;"/>
                                </td>
                                <td width='390' style="text-align:right;">
                                  Rp <input type="number" value="0" name="jumlah[]" class="span2 jumlah" id="jumlah_0" min="0" step="100" placeholder="Jumlah" style="text-align: right;" readonly required/>
                                </td>
                              </tr>
                        </table><!-- end span -->

                    </div> <!-- end row -->
                    <hr>
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
    var countries = [   { value: 'Andorra', kode: 'a0832 ds8', harga: '10000' },
                     // ...
   { value: 'zorra', kode: 'po32 ds8', harga: '18900' },
   { value: 'yondorra', kode: 'i3q832 ds8', harga: '90000' }
];
function autoc(data){
$(data).autocomplete({
    lookup: countries,
    onSelect: function (suggestion) {
        alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        ajsdljahskldjakldjalj
    }
});
}

// -------------------------------------------------------------------------

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

    function add_row(data)
    {
          var numid=data.id;            
              numid=numid.split('_');
          var num=($("input[name='jasa[]']").length)-1;
          var i = 1;
            
           if(numid[1]>=num){
              numid[1]=num;
              console.log('ya');
           }

           if(num == numid[1]){
              $("table tr:last").clone().find("input").each(function() {
              $(this).attr({
                  'id': function(_, id) { return numid[0]+'_'+(num + i )},
                  'value': function(_,value)  {
                        if(numid[0]=='qty'){ return 1;  }
                        else if(numid[0]=='jumlah'){ return 0;  }
                        else if(numid[0]=='disc'){ return 0;  }
                  }
              });
              }).end().appendTo("table");i++;
           }
    }

    function deleteRow(r)
    {
        var i = r.parentNode.parentNode.rowIndex;
        if($("tr#detailpakai").length >1)
        {
          document.getElementById('tabel').deleteRow(i);
        }
        else{
          alert('Data tidak boleh kosong sama sekali!');
        }
    }
  /*var i = 1;
  $("#detailpakai:last").on("focus", "input:last", function(e) {
    $("table tr:last").clone().find("input").each(function() {
          $(this).val('').attr('id', function(_, id) { return id + i });
      }).end().appendTo("table");
      i++;    
  });*/

</script>
@stop



