<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    public function testArticlesAreCreatedCorrectly()
    {
    	$payload = [
    		'title' => 'Lorem',
    		'body' => 'Ipsum'
    	];

    	$this->json('POST', '/api/articles', $payload)
    		->assertStatus(201)
    		->assertJsonStructure([
    			'data' => [
    				'title',
    				'body'
    			]
    		]);
    }

    public function testArticlesAreListedCorrectly()
    {
    	$response = $this->json('GET', '/api/articles', [])
    		->assertStatus(200)
    		->assertJsonStructure([
    			'data' => [
    				'*' => [
    					'title',
    					'body'
    				]
    			]
    		]);
    }
}
