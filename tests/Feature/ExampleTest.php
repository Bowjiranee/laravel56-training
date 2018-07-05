<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    
    //https://laravel.com/docs/5.6/http-tests#available-assertions
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //httpTest
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function testLoginSuccess()
    {
        $credential = [
            'email' => 'kongarn@gmail.com',
            'password' => '11111111'
        ];

        $response = $this->post('/login',$credential);

        $response->assertRedirect('/member');
        $this->assertAuthenticated($guard = null);
    }
    
    public function testLoginFail()
    {
        $credential = [
            'email' => 'user@ad.com',
            'password' => 'incorrectpass'
        ];

        $response = $this->post('/login',$credential);
        
        $response->assertRedirect('/loginform');
        $this->assertGuest($guard = null);
    }
    
    public function testLoginFormPage()
    {
        $response = $this->get('/loginform');
        
        $response->assertSeeText("required");
    }
    
    public function testViewHasDataKey()
    {
        $response = $this->get('/view');
        
        $response->assertViewHas("key1");
    }
    
    public function testViewHasDataKeyAndValue()
    {
        $response = $this->get('/view');
        
        $response->assertViewHas("key1",'value1');
    }
    
    public function testViewHasDataKeyAndValueArray()
    {
        $response = $this->get('/view');
        
        $response->assertViewHas("key2",array ('key2.1' => 'value2.1', 'key2.2' => 'value2.2'));
    }
    
    public function testViewMissingDataKey()
    {
        $response = $this->get('/view');
        
        $response->assertViewMissing("key3");
    }
    
}
