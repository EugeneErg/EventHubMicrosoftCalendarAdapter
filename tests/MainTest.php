<?php

declare(strict_types=1);

namespace Tests;

use Microsoft\Graph\Core\Authentication\GraphPhpLeagueAuthenticationProvider;
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Kiota\Authentication\Oauth\AuthorizationCodeContext;
use Microsoft\Kiota\Authentication\Oauth\ClientCredentialContext;
use Microsoft\Kiota\Authentication\Oauth\OnBehalfOfContext;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function test(): void
    {
        $tokenRequestContext = new ClientCredentialContext(
            'f8cdef31-a31e-4b4a-93e4-5f571e91255a',
            '8c19ec7c-32e0-4dbd-b54e-76db70066c46',
            '195581d6-57e8-4f4b-8fb5-fe0ef435240b',//QKk8Q~OVPI-e~aJR3xdBko8hsZCnX.5wb14O9cSF',
        );

        //$scopes = ['User.Read', 'Mail.ReadWrite'];
        $graphServiceClient = new GraphServiceClient($tokenRequestContext);
        //$graphServiceClient = new GraphServiceClient($tokenRequestContext, $scopes);
        try {
            $request = $graphServiceClient->me()->calendar()->get()->wait();
        } catch (\Throwable $exception) {
            var_dump($exception);
        }

        var_dump($request);die;

        var_dump($tokenRequestContext);
    }

    public function test2()
    {
        $tokenRequestContext = new AuthorizationCodeContext(
            'f8cdef31-a31e-4b4a-93e4-5f571e91255a',
            '8c19ec7c-32e0-4dbd-b54e-76db70066c46',
            'd6a1f053-3469-492d-84bf-f514e72619f5',
            'authCode',
            'redirectUri'
        );
    }

    public function test3()
    {
        $tokenRequestContext = new OnBehalfOfContext(
            'tenantId',
            'clientId',
            'clientSecret',
            'assertion'
        );
    }
}