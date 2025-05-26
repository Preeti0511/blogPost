<?php

namespace Tests\Unit;
use Tests\TestCase;


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class PostTest extends TestCase
{
      use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();

       $user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => Hash::make('password'),
    'role' => 'author',
]);

        $category = Category::create([
            'name' => 'Tech',
        ]);

        Post::create([
            'title' => 'Test Post',
            'content' => 'Test content here.',
            'image' => 'post.jpg',
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);
    }

    public function testPostHasImage()
    {
        $post = Post::first();
       
          $this->assertEquals('post.jpg', $post->image);
    }

    public function testUserHasRole()
    {
        $user = User::first();
        $this->assertEquals('author', $user->role);
    }
}
