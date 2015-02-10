<!---->
@extends('template.template')

<!-- awal section content -->
@section('content')

	<div class="span6">
		<div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> {{$sukucadang->kode_suku_cadang}} -- {{$sukucadang->nama}}</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <div class="span5">
                    <table class="table">
                      @foreach($sukucadang->fields() as $v)
                      <tr>
                        <td> {{$v['label']}} </td>
                        <td> : {{$sukucadang->$v['name']}} </td>
                        @if()
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div> 
				      </div>
				    </div>
			   </div>
			</div>
		</div>
	</div>
  </div>
@stop
