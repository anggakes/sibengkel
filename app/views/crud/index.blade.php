
@extends('template.template')

<!-- awal section content -->
@section('content')

<!-- Modal -->

<div class="modal fade tambah" id='modal'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah {{$name}}</h4>
        <br>
      </div><br>
      <div class="modal-body">
        <p>loading ...</p>
      </div>
    <br>
    <div class="modal-footer">
    </div>
    </div>
  </div>
</div>

<!--end modal-->
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
<a data-toggle="modal" class="open-obatDialog pull-right btn btn-primary"  href="{{URL::route($name.'.create')}}" data-target='#modal'><i class="icon-plus" style="font-size:13pt"></i> Tambah</a>
<div class='clearfix'></div> <br>					
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

@section('js')


{{HTML::script("assets/template/js/bootstrap-modal.js")}}

<script type="text/javascript">

$(document).ready(function(){

	$(document).on('hidden', '#modal', function () {
      $('.modal-body').html("      loading..");
      $(this).removeData('modal');
    });

});
  
</script>

@stop



