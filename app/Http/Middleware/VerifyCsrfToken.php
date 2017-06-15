<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/register',
        '/get-hospital',
        '/check-username',
        '/product/collect',
        '/api/user-head',
        '/login',
        '/product/join',
        '/forget',
        '/send-code',
        '/market/store',
        '/personal/pwd-edit',
        'agent/agent-sign',
        'personal/expertise',
         'personal/del-expertise',
        '/personal/info-edit'
    ];
}
