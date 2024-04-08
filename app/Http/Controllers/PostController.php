<?php

namespace App\Http\Controllers; // Giả sử đây là namespace của controller

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
// Thay thế bằng đường dẫn đến model Post của bạn

class PostController extends Controller {
    public function getAllPosts() {
        // Lựa chọn 1: Lấy tất cả bài viết
        // Sử dụng query builder để lấy tất cả các bài đăng
        $posts = DB::table('posts')->get();

        // Trả về các bài đăng đã lấy được dưới dạng phản hồi
        return response()->json(['posts' => $posts]);
    }
    public function getOnePost() {
        $post = DB::table('posts')->where('id', 10)->first();

        // Kiểm tra nếu không tìm thấy bài viết
        if (!$post) {
            return response()->json(['error' => 'Bài viết không tồn tại'], 404);
        }

        // Trả về bài viết
        return response()->json(['post' => $post]);
    }

    public function createPost() {
        $post = new Post();
        $post->title = 'New Post';
        $post->content = 'Content of the new post';
        $post->save();
    }

    public function getPost() {
        $post = Post::find(51);
        return $post;
    }

    public function updatePost() {
        $post = Post::find(51);
        $post->title = 'Updated Title';
        $post->content = 'Updated content of the post';
        $post->save();
    }

    public function deletePost() {
        $post = Post::find(51);
        $post->delete();
    }

    public function createPostORM()
{
    DB::table('posts')->insert([
        'title' => 'New Post',
        'content' => 'Content of the new post'
    ]);
}

public function getPostORM()
{
    $post = DB::table('posts')->where('id', 51)->first();
    return $post;
}

public function updatePostORM()
{
    DB::table('posts')
        ->where('id', 51)
        ->update([
            'title' => 'Updated Title',
            'content' => 'Updated content of the post'
        ]);
}   
public function deletePostORM()
{
    DB::table('posts')->where('id', 51)->delete();
}
}
