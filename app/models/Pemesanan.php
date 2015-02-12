<?php


class Pemesanan extends Eloquent {
	public $timestamps = true;
	protected $fillable = ["nama,tgl,no_faktur,total"];
	protected $table = "pemesanan";
	protected $guarded = ['id'];

	public $name = "Pemesanan";
	
	/* relation */
}
