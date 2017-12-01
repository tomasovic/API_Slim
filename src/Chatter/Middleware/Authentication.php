<?php
namespace Chatter\Middleware;

use Chatter\Models\User;

class Authentication
{
    public function __invoke($request, $response, $next)
    {
        // Checking the header beacuse auth data is not placed in POST or GET
        // We are placing our auth data in the header. This way it cannot be cashed
        $auth = $request->getHeader('Authorization');

        // getting authorization
        $_apikey = $auth[0];

        // getting JUST the token from the auth string
        // +1 is empty space
        // This is the string from the header- Bearer d0763edaa9d9bd2a9516280e9044d885
        $apikey = substr($_apikey, strpos($_apikey, ' ') + 1);

        $user = new User();
        if (!$user->authenticate($apikey)) {
            $response->withStatus(401);

            return $response;
        }

        $response = $next($request, $response);

        return $response;
    }
}