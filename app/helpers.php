<?php

if ( ! function_exists('hasError'))
{
    /**
     * Return specific class name is a particular error exists.
     *
     * @param $name
     * @param $errors
     *
     * @return mixed
     */
    function hasError( $name, $errors )
    {
        return $errors->has($name) ? 'has-error' : '#';
    }
}