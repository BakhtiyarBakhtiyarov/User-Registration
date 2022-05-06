<?php 

function input($text)
    {
        $text = htmlspecialchars($text);
        $text = trim($text);
        $text = stripslashes($text);

        return $text;
    }