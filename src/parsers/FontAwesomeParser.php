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
     * @param array $code string of the code to parse
     * @param ShortcodeParser $parser Parser root user.
     * @param string $shortcode
     * @param array $extra
     *
     * @return String of parsed code.
     */
    public static function handle_shortcode($arguments, $code, $parser, $shortcode, $extra = array())
    {
        $modifierList = [];
        $modifiers = Config::inst()->get(self::class, 'modifiers');
        foreach($modifiers as $key => $modifier) {
            if(array_key_exists($key, $arguments)) {
                if(substr($modifier, -1) === '-') {
                    $modifierList[] = 'fa-' . $modifier . $arguments[$key];
                } else {
                    $modifierList[] = 'fa-' . $modifier;
                }
            }
        }
        $modifierList = implode(' ', $modifierList);
        if($icon = $arguments['icon']) {
            return "<i class='fa fa-$icon $modifierList' aria-hidden='true'></i>";
        }
    }

}