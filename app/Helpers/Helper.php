<?php

/**
*set any link as active by adding active class
*@param [url] $url current url
*@param string $output CSS class name 
*/

function set_active($uri, $output = 'm-menu__item--active')
{
 	if( is_array($uri) ) {
   		foreach ($uri as $u) {
     		if (Route::is($u)) {
       			return $output;
     		}
   		}
 	} else {
   		if (Route::is($uri)){
     		return $output;
   		}
 	}
}


function set_active_toolbar($uri, $output = 'm-menu__item--open')
{
 	if( is_array($uri) ) {
   		foreach ($uri as $u) {
     		if (Route::is($u)) {
       			return $output;
     		}
   		}
 	} else {
   		if (Route::is($uri)){
     		return $output;
   		}
 	}
}