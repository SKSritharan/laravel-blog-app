<?php

namespace App\Livewire\Post;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\NewCommentNotification;
use Livewire\Component;
use WireUi\Traits\Actions;

class SinglePost extends Component
{
    use Actions;

    public $post, $post_id, $body, $user_id;

    public function mount($id)
    {
        $this->post_id = $id;
        $this->post = Post::with('comments.user', 'author')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.post.single-post');
    }

    public function store()
    {
        if (!auth()->check()) {
            // User is not logged in, redirect to the login page
            return redirect()->route('login');
        }

        $this->user_id = auth()->user()->id;
        $this->validate([
            'body' => 'required',
        ]);

        $comment = Comment::create([
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,
            'body' => $this->body,
        ]);

        // Notify the post owner about the new comment
        $this->post->author->notify(new NewCommentNotification($comment));

        $this->reset(['body']); // Clear the input field after submission

        $this->post = Post::with('comments.user')->findOrFail($this->post_id); // Refresh the post data

        $this->notification()->success(
            $title = 'Comment posted.',
            $description = 'Your comment was posted successfully.'
        );

        $this->redirectRoute('single-post', ['id' => $this->post_id]);
    }

    public function deleteComment($commentId)
    {
        if (!auth()->check()) {
            // User is not logged in, redirect to the login page
            return redirect()->route('login');
        }

        $comment = Comment::find($commentId);

        // Check if the logged-in user is the owner of the comment or the post
        if (auth()->user()->id == $comment->user_id || auth()->user()->id == $this->post->user_id) {
            $comment->delete();

            $this->post = Post::with('comments.user')->findOrFail($this->post_id); // Refresh the post data

            $this->notification()->success(
                $title = 'Comment deleted.',
                $description = 'Your comment was deleted successfully.'
            );
        } else {
            // User is not authorized to delete this comment
            $this->notification()->error(
                $title = 'Unauthorized action.',
                $description = 'You are not authorized to delete this comment.'
            );
        }

        $this->redirectRoute('single-post', ['id' => $this->post_id]);
    }
}
