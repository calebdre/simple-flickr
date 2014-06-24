<?php
require "flickr.php";

$f = new Flickr('your key');

$user = $f->get('people.findByUsername', array('username' => 'rebba'));

print_r($user);