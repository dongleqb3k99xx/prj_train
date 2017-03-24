<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models as Models;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use App\Services\UserService;

/**
 * Description of TestController
 *
 * @author HR
 */
class TestController extends Controller {

    public function getTestRelationships() {
        define('CREATE_TEST_DATA', false);
        \Illuminate\Support\Facades\DB::transaction(function () {
            if (CREATE_TEST_DATA === true) {
                $user = new User;
                $user->name = 'test-user';
                $user->email = 'test@gmail.com';
                $user->password = '111';
                $user->role = 'author';
                $user->save();
                
                $post = new Post;
                $post->author_id = $user->id;
                $post->title = 'Test post';
                $post->body = 'Test post body';
                $post->slug = '#';
                $post->active = true;
                $post->save();
                
                
                $comment1 = new Comment;
                $comment1->on_post = $post->id;
                $comment1->from_user = $user->id;
                $comment1->body = 'Comment 1';
                $comment1->save();
                
                $comment2 = new Comment;
                $comment2->on_post = $post->id;
                $comment2->from_user = $user->id;
                $comment2->body = 'Comment 2';
                $comment2->save();
            }
        });
        
        $user_search = User::where(['name' => 'test-user'])->first();
        
        if (!$user_search) {
            return 'No User Found';
        }
        
        $user = new UserService($user_search);
        
        $user_posts = $user->getPosts();
        
        echo sprintf('Posts of user %s :<br>', $user->getName());
        foreach ($user_posts as $user_post) {
            $post_comments = $user_post->getComments();
           
            echo sprintf('- Post \'%s\' has %i comments :<br>', $user_post->getName(), count($post_comments));
            
            foreach ($post_comments as $post_comment) {
                $comment_user = $post_comment->getUser();
                
                if ($comment_user->exists()) {
                    echo sprintf('--- %s commented : %s<br>', $comment_user->getName(), $post_comment->getBody());
                }
            }
        }
    }

}
