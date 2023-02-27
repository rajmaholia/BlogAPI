<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>');
session_destroy();
redirect(reverse(LOGOUT_REDIRECT_URL));
?>