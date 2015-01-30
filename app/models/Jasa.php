<?php

class Jasa extends Eloquent {

	protected $table = 'jasa';

	public $timestamps = true;

	public $newAttribute = 'new attribute';

    public function url()
    {
        return 'http:://www.domain.com/post/' . $this->nama;
    }
}
