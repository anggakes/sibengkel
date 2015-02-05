
@extends('template.template')

<!-- awal section content -->
@section('content')

	<div class="span12">
		<div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Tambah {{$name}}</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <br>
                  <div class="span11">

					{{HTML::style("assets/datatables/jquery.dataTables.css")}}

					{{HTML::script("assets/jquery-2.0.3.min.js")}}
					{{HTML::script("assets/datatables/jquery.dataTables.js")}}
					{{ Datatable::table()
						->addColumn($showColoumn)       // these are the column headings to be shown
						->setUrl(route($name.'.datatables'))   // this is the route where data will be retrieved
						->render() }}
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
@stop



