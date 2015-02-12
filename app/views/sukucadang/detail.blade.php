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
                  <div class="span6">
                    <table class="table alert-info">
                      @foreach($sukucadang->fields() as $v)
                      @if($v['type']=='multiselect')
                      <tr>
                        <td> {{$v['label']}} </td>
                        <td> : 
                          @foreach($sukucadang->$v['name'] as $k)
                            <span class='label label-info'>{{$k->nama}}</span> 

                             
                          @endforeach 
                        </td>
                      </tr>
                      
                      @else
                      <tr>

                        <td> {{$v['label']}} </td>
                        <td> : {{$sukucadang->$v['name']}} </td>

                        <td class="span3"> {{$v['label']}} </td>
                        <td class="span2"> : {{$sukucadang->$v['name']}} </td>

                      </tr>
                      @endif
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
