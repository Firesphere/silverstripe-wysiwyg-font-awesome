<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10-May-17
 * Time: 17:08
 */
class FontAwesomeParser
{
    public static function get_shortcodes()
    {
        return ['fa'];
    }

    /**
     * @param string $arguments array with the type
     *
     * @return String of parsed code.
     */
    public static function handle_shortcode($arguments)
    {
        $modifierList = [];
        $modifiers = Config::inst()->get(self::class, 'modifiers');
        $returnString = '';
        // Check for modifiers
        foreach ($arguments as $key => $modifier) {
            if (array_key_exists($key, $modifiers)) {
                // some modifiers don't take arguments
                if ($modifiers[$key]['arguments'] === true) {
                    $modifierList[] = sprintf('fa-' . $modifiers[$key]['code'], $arguments[$key]);
                } else {
                    $modifierList[] = 'fa-' . $modifiers[$key]['code'];
                }
                $returnString .= ' ' . $key . '=' . $modifier;
            }
        }
        $modifierList = implode(' ', $modifierList);
        if ($icon = $arguments['icon']) {

            return "<i class='fa fa-$icon $modifierList' aria-hidden='true'></i>";
        }

        return '[fa' . $returnString . ']';
    }

}