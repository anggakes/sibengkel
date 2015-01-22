var submit = 0;
$(document).ready(function()
{
	$("#submit").click(function()  // <----- kalo tombol save diklik
	{	
		
		if( $("#idk").val() == ''){  // <---- cek id kategorinyo ado dak, men dak katek dy add.  id ini hidden di view
			var link="kategoriSCAdd";
		}
		else if( $("#idk").val() !== ''){
			var link= "kategoriSCEdit";
		}

		$("#kategori").submit(function(e)
				{	var nama =  $("#nama").val(); // <--- set namo samo id walaupun id kosong
					var idk =  $("#idk").val();
					$("#status-simpan").html('&nbsp; Menyimpan...');  // <-- pemberitahuan bae kalo lg proses nyimpen
					$.ajax(
					{
						dataType : 'json',  // <---- tipe data nyo json
						url : link,  // <--- sudah di desfinisike di pucuk
						type: "POST", // <--- tipenyo post.. selain post biso jugo get
						data : {nama:nama, id:idk},  // <--- ini data yang dikirimke controller. ado data nama samo id, biar pas edit skalian bae tempatnyo
						success:function(data, textStatus, jqXHR) 
						{
							$("#status-simpan").html('<pre><code class="prettyprint">'+textStatus+'</code> &nbsp; | '+data.nama+'</pre>'); //  <--- kasih pemberitahuan lagi
							$('#kategori')[0].reset();   // <--- kosongi kolom nama
							loaddata();   // <--- ambil data yang la diinputke
						//	console.log(data);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$("#status-simpan").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
							// ini kalo ado something error
						}
					});
					e.preventDefault();	//STOP default action
					//e.unbind();
				});
	});  
	
$("#klik").click(function()  // <----- kalo tombol save diklik
	{	
		alert('diklik');
	});

	function aa(){alert();}
	function loaddata(){ // <--- ambil data
		
		$.ajax({
			url : "kategoriSC",  // <--- link akses ke controller
			dataType : 'json',  // <---- tipe datanyo json
			success:function(data, textStatus, jqXHR) 
						{
						var text='';  // <---  definisii variabel text untuk nyimpen data
							$("#status").html('<pre><code class="prettyprint">'+textStatus+'</code> &nbsp;</pre>');   //  <--- sekedar pemberitahuan
							for (var i = data.length - 1; i >= 0; i--) {
									// text += "id :" + data[i].id + " | tipe : " + data[i].nama +" [ <a href='#' class='edit' id='" + data[i].id +"' onclick='update(this)'>edit</a> | <a href='#' id='" + data[i].id +"' onclick='hapus(this);' class='hapus'>hapus</a> ]<br>";
									text += "id :" + data[i].id + " | tipe : " + data[i].nama +" [ <b id='edit' class='edit' >edit</b> | <a href='#' id='" + data[i].id +"' onclick='hapus(this);' class='hapus'>hapus</a> ]<br>";
									// ambil data skaligus buat link untuk edit samo delete.
									// data ini awalnyo dalam bentuk json, trus dipecah lagi 
									// variabel data itu variabel yg nampung keluaran dari controller
							};							
							$('#grid').html(text); // <--- tarok data yg disimpen dlm variabel text  tadi ke dalem id grid di view
					},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$("#status").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
						}
				
		});
	}
	loaddata();  // <--- ambil data dulu untuk yg pertamo sekali pas halaman baru dibuka
	setInterval(loaddata,10000);  // <--- ambil data setiap 10000 ms

$('.teamSelector').click(function() { 
    alert();
}).css("cursor", "pointer");
	
});  

	function hapus(e){
		if(confirm('Did u really wanna delete this?')){ // <--- konfirmasi nak ngapus nian apo idak
			$("#status-simpan").html('&nbsp; Menghapus...');  // <--- cuma ngasi tau bae
					$.ajax(
					{
						dataType : 'json',
						url : 'kategoriSCDelete',
						type: "POST",
						data : {id:e.id},  // <--- data yang dikirim ke controller cuma id bae
						success:function(data, textStatus, jqXHR) 
						{
							$("#status-simpan").html('<pre><code class="prettyprint">'+textStatus+'</code> &nbsp; | '+data.id+'</pre>');
						//	loaddata();   <--- ini dak biso jalan gara gara diluar document ready
						//	console.log(data);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$("#status-simpan").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
						}
					});
		}
	}

	function update(e){
		if(confirm('Did u really wanna update this?')){
			$('#idk').val(e.id);  // <--- set id di view, e itu dikirim dari link dipucuk...
			$.ajax(
					{
						url : 'kategoriSCSearch',  // <--- nak nyari data sesuai id itu
						type: "POST",
						data : {id:e.id},
						success:function(data, textStatus, jqXHR) 
						{
							$('#nama').val(data); // <----- ketemu! langsung masuki data ke kolom nama
							$('#nama').focus();  // <---- set kursor ke kolom nama
						//	console.log(data);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$("#status-simpan").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
						}
					});
		}
	}