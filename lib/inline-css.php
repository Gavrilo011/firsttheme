<?php 
$accent_colour = sanitize_hex_color( get_theme_mod('_themename_accent_colour', '#20ddae') );
$inline_style = "
    a {
        color: {$accent_colour};
    }

    :focus {
        outline: 2px solid {$accent_colour};
    }

    .c-post.sticky {
        border-left: 5px solid {$accent_colour};
    }

    button, input[type=submit],
    .header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a {
        background-color: {$accent_colour};
    }
";

?>