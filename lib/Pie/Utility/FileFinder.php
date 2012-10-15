<?php

class FileFinder {
    
    public static function fileExists( $path )
    {
        return is_file($path);
    }
    
    public static function tryIncludeFile( $path )
    {
        $done = true;
        if( FileFinder::fileExists( $path ) )
        {
            require_once $path;
        }else{
            $done = false;
        }
        return $done;
    }
    
    
}
