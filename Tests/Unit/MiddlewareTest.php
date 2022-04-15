<?php

namespace Dizaji\ToDo\Tests;

use Dizaji\ToDo\Http\Middlewares\CheckLogin;
use Dizaji\ToDo\Lable;
use Dizaji\ToDo\Task;
use Dizaji\ToDo\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use PHPUnit\Framework\Assert;

//use PHPUnit\Framework\Assert;
//use PHPUnit\Framework\TestCase;
//use Webmozart\Assert\Assert;

class MiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_middleware_should_abort_when_token_is_wrong()
    {
        $user = new User();
        $user->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ";
        $user->save();
        $request = new Request();
        $request->merge(["token" => "88eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ"]);
        $middleware = (new CheckLogin());
        try {
            $middleware->handle($request, function () {
            });
        } catch (\Symfony\Component\HttpKernel\Exception\HttpException $e) {
            $this->assertEquals(
                401,
                $e->getStatusCode(),
                sprintf("Expected an HTTP status of %d but got %d.", 401, $e->getStatusCode())
            );
        }

    }

    /** @test */
    function a_middleware_should_pass_request_when_token_is_correct()
    {
        $user = new User();
        $user->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ";
        $user->save();
        $request = new Request();
        $request->merge(["token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ"]);
        (new CheckLogin())->handle($request, function ($request) {
            $this->assertEquals("eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ"
                , $request->token);
        });

    }

}
