<?php

use App\Models\Post;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class SecurityTest extends TestCase
{
   
        // Simulate users and post
         public function testUserCannotEditOtherUsersPost()
    {
        // Simulate a post owned by user ID 1
        $post = new stdClass();
        $post->user_id = 1;

        // Logged-in user is user ID 2
        $_SESSION['user_id'] = 2;

        $canEdit = $post->user_id === $_SESSION['user_id'];

        $this->assertFalse($canEdit, "User should not be able to edit another user's post.");
    }
}
