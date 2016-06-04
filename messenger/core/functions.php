<?php

if ( ! function_exists( 'wp_remote_post' ) )
{
	function wp_remote_post($url, $args = array()) 
	{
		if ( ! empty( $args['body'] ) )
			return FacebookHttp::post($url, $args['body']);

		return FacebookHttp::post($url);
	}
}

if ( ! function_exists( 'wp_remote_get' ) )
{
	function wp_remote_get($url, $args = array()) 
	{
		return FacebookHttp::get($url);
	}
}

if ( ! function_exists( 'dd' ) )
{
	function dd($object)
	{
		echo '<pre>';
		print_r($object);
		exit;
	}
}

if ( ! function_exists( 'do_action' ) )
{
	function do_action( $event )
	{
		// Do nothing
	}
}

if ( ! function_exists( 'add_action' ) )
{
	function add_action( $event, $callback )
	{
		// Do nothing
	}
}

