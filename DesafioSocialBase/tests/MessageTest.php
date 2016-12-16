<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MessageTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @param int $length
     * @return string
     */
    private function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    /** @test */
    public function testGetAllMessages()
    {
        $response = $this->call('GET', '/api/message');
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function testPublishMessage()
    {
        $param = ['message' => 'teste', 'user_id' => '1'];
        $response = $this->call('POST', '/api/message/publish', $param);
        $this->assertEquals(201, $response->status());
    }

    /** @test */
    public function testRequiredMessageParameter()
    {
        $response = $this->call('POST', '/api/message/publish');
        $this->assertEquals(422, $response->status());
    }

    /** @test */
    public function testInvalidParameters()
    {
        $params = ['message1' => 'teste', 'message123' => 'teste2', 'user_id' => '1'];
        $response = $this->call('POST', '/api/message/publish', $params);
        $this->assertEquals(422, $response->status());
    }

    /** @test */
    public function testWrongParameter()
    {
        $param = ['messageX' => 'teste', 'user_id' => '1'];
        $response = $this->call('POST', '/api/message/publish', $param);
        $this->assertEquals(422, $response->status());
    }

    /** @test */
    public function publishMessageWith140Characters()
    {
        $message = $this->generateRandomString(140);
        $param = ['message' => $message, 'user_id' => '1'];
        $response = $this->call('POST', '/api/message/publish', $param);
        $this->assertEquals(201, $response->status());
    }

    /** @test */
    public function publishMessageWithMoreThan140Characters()
    {
        $message = $this->generateRandomString(141);
        $param = ['message' => $message, 'user_id' => '1'];
        $response = $this->call('POST', '/api/message/publish', $param);
        $this->assertEquals(422, $response->status());
    }

    /** @test */
    public function testNotFoundHttpException404()
    {
        $message = $this->generateRandomString(10);
        $param = ['message' => $message, 'user_id' => '1'];
        $response = $this->call('POST', '/api/message/publishX', $param);
        $this->assertEquals(404, $response->status());
    }

    /** @test */
    public function testMethodNotAllowedHttpException405()
    {
        $message = $this->generateRandomString(10);
        $param = ['message' => $message, 'user_id' => '1'];
        $response = $this->call('GET', '/api/message/publish', $param);
        $this->assertEquals(405, $response->status());
    }
}
