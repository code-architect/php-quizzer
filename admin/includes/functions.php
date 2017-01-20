<?php

// select database based on $_GET
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

// select answer database based on $_GET
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

// select image folder based on $_GET
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

// select display name based on $_GET
function selectName($type)
{
    if($type == 'eng')
    {
        return 'English Questions';
    } elseif($type == 'ben')
    {
        return 'Bengali Questions';
    }elseif($type == 'hin')
    {
        return 'Hindi Questions';
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

//---------------------------------------------------------------------------------------//

function fetch_questions($question_database)
{
    global $mysqli;
    $query = "SELECT * FROM ".$question_database;
    $results = $mysqli->query($query);
    $returnValue = $results->fetch_all(MYSQLI_ASSOC);
    return $returnValue;
}
