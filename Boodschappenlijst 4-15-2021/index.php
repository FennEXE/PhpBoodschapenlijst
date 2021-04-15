<?php

require 'vendor/autoload.php';
router::load('routes.php')
	->direct(request::uri(), request::method());



