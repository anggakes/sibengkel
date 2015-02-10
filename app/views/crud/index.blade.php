
@extends('template.template')

<!-- awal section content -->
@section('content')

<!-- Modal -->

<div class="modal fade tambah" id='modalDialog'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah </h4>
      </div><br>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
    <br>
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
<a data-toggle="modal" class="open-obatDialog"  href="{{URL::route($name.'.create')}}" data-target='#modalDialog'><i class="icon-edit" style="font-size:13pt"></i></a>
					
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
alert('aa');
	$(document).on('hidden', '#modalDialog', function () {
      $('.modal-body').html("      loading..");
      $(this).removeData('modal');
    });

});
  
</script>

@stop



