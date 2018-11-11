<?php
/**
 * Created by PhpStorm.
 * User: mahdy
 * Date: 11/11/18
 * Time: 5:12 PM
 */

namespace App\Http\Middleware;

use Closure;
use Auth0\SDK\JWTVerifier;
use Auth0\SDK\Helpers\Cache\FileSystemCacheHandler;

class Auth0Middleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Auth0\SDK\Exception\CoreException
     */
    public function handle($request, Closure $next)
    {
        if (!$request->hasHeader('Authorization')) {
            return response()->json('Authorization Header not found', 401);
        }

        $token = $request->bearerToken();

        if ($request->header('Authorization') == null || $token == null) {
            return response()->json('No token provided', 401);
        }

        $this->retrieveAndValidateToken($token);

        return $next($request);
    }

    public function retrieveAndValidateToken($token)
    {
        try {
            $verifier = new JWTVerifier([
                'supported_algs'=>['RS256'],
                'valid_audiences' => ['https://authorsapi.com'],
                'authorized_iss' => ['https://authors-api.auth0.com/'],
                'cache' => new FileSystemCacheHandler() // This parameter is optional. By default no cache is used to fetch the JSON Web Keys.
            ]);

            $decoded = $verifier->verifyAndDecode($token);
        } catch (\Auth0\SDK\Exception\CoreException $e) {
            throw $e;
        };
    }

}