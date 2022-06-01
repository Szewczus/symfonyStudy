<?php

namespace App\Controller;

use PHPUnit\Framework\TestCase;

class InsuranceControllerTest extends TestCase
{

    public function testSaveInsurance()
    {
        $this->client = static::createClient();
        $this->client->request(
            'POST',
            '/api/v1/pages.json',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '[{"title":"title1","body":"body1"},{"title":"title2","body":"body2"}]'
        );
        $this->assertJsonResponse($this->client->getResponse(), 201, false);
    }
}
