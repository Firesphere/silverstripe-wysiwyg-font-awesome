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
        // Check for modifiers
        foreach($modifiers as $key => $modifier) {
            if(array_key_exists($key, $arguments)) {
                // some modifiers don't take arguments
                if($modifier['arguments'] === true) {
                    $modifierList[] = 'fa-' . $modifier['code'] . $arguments[$key];
                } else {
                    $modifierList[] = 'fa-' . $modifier['code'];
                }
            }
        }
        $modifierList = implode(' ', $modifierList);
        if($icon = $arguments['icon']) {
            return "<i class='fa fa-$icon $modifierList' aria-hidden='true'></i>";
        }
    }

}