<!-- index -->
{{HTML::style("assets/datatables/jquery.dataTables.css")}}

{{HTML::script("assets/jquery-2.0.3.min.js")}}
{{HTML::script("assets/datatables/jquery.dataTables.js")}}
{{ Datatable::table()
    ->addColumn($showColoumn)       // these are the column headings to be shown
    ->setUrl(route($name.'.datatables'))   // this is the route where data will be retrieved
    ->render() }}









