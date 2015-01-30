<?php 

/*
|-----------------------------------------------
| Application Binding
|-----------------------------------------------
|
| Ini adalah halaman untuk melakukan binding
| pada repository dan inteface
|	
*/

// Kategori Suku Cadang
App::bind(
      'Repositories\KategoriSukuCadangInterface',
      'Repositories\KategoriSukuCadangEloquent'
    );

// Suku Cadang 
App::bind(
      'Repositories\SukuCadangInterface',
      'Repositories\SukuCadangEloquent'
    );


