<?php

// tests/AuthenticationTest.php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthenticationTest extends WebTestCase
{
   
    public function testSuccessfulAuthentication()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login'); 

        $form = $crawler->selectButton('Sign In')->form();
        $form['email'] = 'email@email.com'; 
        $form['password'] = 'parola'; 

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
    }
}
