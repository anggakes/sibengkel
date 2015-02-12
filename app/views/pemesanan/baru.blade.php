
@extends('template.template')

<!-- awal section content -->
@section('content')
{{HTML::script("assets/jquery.autocomplete.js")}}
{{HTML::style("assets/CSS/styles.css")}}
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
                              {{Form::label("tanggal","Tanggal",['class'=>' control-label'])}}
                                <div class='controls right'>
                                  {{Form::text("kode_transaksi",date('Y-m-d'),
                                    [
                                    'class'=>'',
                                    'id'=>"tanggal",          
                                    'title'=>"tanggal",
                                    'placeholder'=>"Tanggal"]);
                                  }}   
                                </div>

                            </div> <!-- end control group-->
                            <div class='control-group group' id='kode_transaksi-group'>

                            {{Form::label("no_faktur","Nomor Faktur",['class'=>' control-label'])}}
                              <div class='controls'>
                                {{Form::number("no_faktur",$nofaktur,
                                  [
                                  'class'=>'',
                                  'id'=>"no_faktur",          
                                  'title'=>"no_faktur",
                                  'placeholder'=>"Nomor Faktur Transaksi"])}}   
                              </div>
                          </div>
                          <div class='control-group group' id='kode_transaksi-group'>

                            {{Form::label("supply","Supplier",['class'=>' control-label'])}}
                              <div class='controls'>
                                {{Form::text("supplier",'',
                                  [
                                  'class'=>'',
                                  'id'=>"supplier",          
                                  'title'=>"supplier",
                                  'placeholder'=>"Supplier"])}}   

                              </div>
                          </div>
                         </div><!-- end span -->
                    </div><!-- end row -->

                    <div class='row'>
                        <table id='tabel' class=''>
                            <thead class='alert'style='border:1px #ddd solid'>
                              <th width="100" rowspan="2">Aksi</th>
                              <th width="160" rowspan="2">Kode</th>
                              <th width='180'> Biaya Jasa Bengkel</th>
                              <th width="40" rowspan="2">@ Qty</th>
                              <th width="150" rowspan="2">@ Harga</th>
                              <th width="40" rowspan="2">% Discount</th>
                              <th width='390' rowspan="2">Jumlah</th>
                              <th width='390' rowspan="2">Keterangan</th>
                              <tr><th width='180' style="border-top:1px solid silver"> Nota Suku Cadang</th></tr>
                            </thead>
                            <tbody>
                              <tr id="detailpakai">
                                <td width="80">
                                  <button type="button" value="Delete" onclick="deleteRow(this)" class='btn btn-danger btn-mini'><i class='btn-icon-only icon-minus-sign'></i></button>
                                </td>
                                <td width='160'>
                                  <input type="text" name="kode[]" class="span2" id="kode_0" placeholder="Kode" style="text-align: left;" onchange="Hitung(this);" readonly required/>
                                  <input type="hidden" name="idsc[]" class="span2" id="idsc_0" placeholder="Kode" style="text-align: left;" required/>
                                </td>
                                <td width='180'>
                                  <input type="text" name="jasa[]" class="span2 autocomplete" id="jasa_0" placeholder="Nama Jasa" style="text-align: left;" onfocus="add_row(this);" onchange="Hitung(this);" required/>                                 
                                </td>
                                <td width='40'>
                                  <input type="number" name="qty[]" class="span1" idx="100" max="200" id="qty_0" title="0" min="1" step="1" placeholder="Quantity" style="text-align: right;width:40px;" value="1" onchange="Hitung(this)" required/>
                                </td>
                                <td width='150'>
                                  <input type="number" name="harga[]" class="span2" id="harga_0" akuma="90" min="100" step="500" placeholder="Harga" style="text-align: right;" readonly required/>
                                </td>
                                <td width='40'>
                                  <input type="number" name="disc[]" class="" id="disc_0" value="0" min="0" max="100" step="1" placeholder="Discount" style="text-align: right;width:50px;" onchange="Hitung(this)" required/>
                                </td>
                                <td width='390' style="text-align:right;">
                                  <input type="number" value="0" name="jumlah[]" class="span2 jumlah" id="jumlah_0" min="0" step="100" placeholder="Jumlah" style="text-align: right;" readonly required/>
                                </td>
                                 <td width='390' style="text-align:right;">
                                  <input type="text" name="keterangan[]" class="span3" id="keterangan_0" placeholder="Keterangan"/>
                                  <input type="hidden" name="refid[]" class="span3" id="refid_0" placeholder="Keterangan"/>
                                </td>
                              </tr>
                        </table><!-- end span -->
                        <hr>
                        <div class='row pull-right'>
                           <div class='control-group group' id='kode_transaksi-group'>

                           {{Form::label("total","Total",['class'=>' control-label'])}}
                                <div class='controls right'>
                                  {{Form::number("total", '0',
                                    [
                                    'class'=>'',
                                    'readonly'=>'true',
                                    'id'=>"total",  
                                    'style'=>'text-align:right',        
                                    'title'=>"total",
                                    'placeholder'=>"Total"]);
                                  }}   
                              </div>
                          </div>
                        </div>
                    </div> <!-- end row -->
                    
                    <div class='clearfix'></div>
                    
                    <div class='row'>
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
@stop




@section('js')
<script type="text/javascript">

    var countries = [ {{ $acSukucadang }} ];
    var supplier = [ 'isa', 'nadiah', 'jebot' ];
    var infield = ['#kode_', '#jasa_', '#harga_'];

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
                  'id': function(_, id) { return this.id.split('_')[0]+'_'+(num + i )},
                  'value': function(_,value)  {
                        if(numid[0]=='qty'){ return 1;  }
                        else if(numid[0]=='jumlah'){ return 0;  }
                        else if(numid[0]=='disc'){ return 0;  }
                  }
              });
              }).end().appendTo("table");i++;

            $(".autocomplete").autocomplete({
                lookup: countries,
                onSelect: function (suggestion) {
                    var numid=data.id;            
                        numid=numid.split('_');
                        var arga=suggestion.harga;
                        $(infield[0]+numid[1]).val(suggestion.kode);
                        $(infield[1]+numid[1]).val(suggestion.value);
                        $(infield[2]+numid[1]).val(suggestion.harga);
                        Hitung(data);
                    }
            });
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

    $("#supplier").autocomplete({
                lookup: supplier,
                onSelect: function (suggestion) {   }
            });

    function Hitung (data){ 
        var numid=data.id;            
            numid=numid.split('_');
        var qty = $('#qty_'+numid[1]).val();
        var harga = $('#harga_'+numid[1]).val();
        var disc = $('#disc_'+numid[1]).val();
        var jumlah = (qty * harga) - (qty * harga* disc /100);
           $('#jumlah_'+numid[1]).val(jumlah);

            sum();
    }

    function sum(){
        var tot=0;
        var count = $("input[id*='jumlah']");
        for(var i=0; i<count.length; i++){
          tot = tot + parseInt(count[i].value);
        }
        $('#total').val(tot);
    }

</script>
@stop



