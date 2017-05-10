<?php
ShortcodeParser::get('default')->register(
    'fa',
    [FontAwesomeParser::class, 'handle_shortcode']
);