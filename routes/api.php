<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

require 'api/guest.php';
require 'api/authenticated.php';
