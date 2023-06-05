<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('session.gc_maxlifetime', 60 * 20);
ini_set('session.cookie_lifetime', 60 * 20);
session_name('session_id');
session_start();
