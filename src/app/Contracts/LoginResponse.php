<?php

namespace App\Contracts;

interface LoginResponse
{
    /**
     * Handle the response after a successful login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request);
}
