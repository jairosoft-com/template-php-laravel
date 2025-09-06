<?php

test('the application returns a successful response and sees Hello World', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('Hello World');
});