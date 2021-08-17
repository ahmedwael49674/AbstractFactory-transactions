<?php

namespace App\Exceptions;

use Exception;

class InvalidSourceException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return response()->json(["source" => 'Invalid given source'], 422);
    }
}
