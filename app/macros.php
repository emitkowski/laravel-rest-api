<?php

Form::macro('btnLink', function($btnText, $route, $btnAttributes = array(), $anchorAttributes = array(), $btnType = 'button')
{

    $type = array('type' => $btnType);
    $btnAttributes = array_merge($btnAttributes, $type);

    $href  = URL::to($route);

    $output = '<a href="'. $href .'"';

    if (!empty($anchorAttributes))
    {
        foreach ($anchorAttributes as $key => $value)
        {
            $output .= " $key=\"{$value}\"";
        }
    }

    $output .= '>'. Form::button($btnText, $btnAttributes) .'</a>';

    return $output;
});