<?php

use Symfony\Component\Panther\PantherTestCase;

class RegistrationTest extends PantherTestCase
{
    public function testRegistration()
    {
        $client = self::createPantherClient();
        $crawler = $client->request('GET', '/register'); 

        $form = $crawler->selectButton('Register')->form();
        $form['email'] = 'user@example.com'; 
        $form['plainPassword'] = 'Guzun'; 

        $client->submit($form);

        $this->assertSelectorTextContains('div.flash-message', 'Registration successful.');
    }
}
