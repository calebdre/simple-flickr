<?php
require "flickr.php";

$f = new Flickr('your key');

$user = $f->get('people.findByUsername', array('username' => 'rebba'));

die(var_dump(($user));
