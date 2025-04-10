<?php

class ExceptionPdo
{

    public static function translateError($error)
    {
        if (empty($error) || is_array($error))
            return 'Error Unknown';

        if (strpos($error, 'does not exist') !== false) :
            if (strpos($error, 'relation') !== false) :
                return 'Table not found';
            elseif (strpos($error, 'database') !== false) :
                return 'Database not found';
            endif;
        elseif (strpos($error, 'Unknown host') !== false) :
            return 'Host not found';
        elseif (strpos($error, 'syntax error at or near') !== false) :
            return 'Syntax error sql';
        elseif (strpos($error, 'authentication') !== false) :
            return 'Credentials fail';
        else :
            return 'Internal error';
        endif;
    }
}
