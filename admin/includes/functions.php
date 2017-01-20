<?php

function selectQuestionDatabase($type)
{
    if($type == 'eng')
    {
        return 'english_question';
    } elseif($type == 'ben')
    {
        return 'bengali_question';
    }elseif($type == 'hin')
    {
        return 'hindi_question';
    }
    else{
        return false;
    }
}

//------------------------------------------------------------------------------------------//

function selectAnswerDatabase($type)
{
    if($type == 'eng')
    {
        return 'eng_choices';
    } elseif($type == 'ben')
    {
        return 'beng_choices';
    }elseif($type == 'hin')
    {
        return 'hin_choices';
    }
    else{
        return false;
    }
}

//---------------------------------------------------------------------------------------//

    function selectImageFolder($type)
    {
        if($type == 'eng')
        {
            return 'english_image';
        } elseif($type == 'ben')
        {
            return 'bengali_image';
        }elseif($type == 'hin')
        {
            return 'hindi_image';
        }
        else{
            return false;
        }
    }



//---------------------------------------------------------------------------------------//

function clean($var)
{
    global $mysqli;
    $var = $mysqli->real_escape_string($var);
    return $var;
}

