<?php

use Core\Session;

require view('session/login.view.php', ['error' => Session::get('error')]);
