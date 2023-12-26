<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Notifications\NewPostNotification;
use App\Notifications\PostUpdateNotification;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions, WithFileUploads;
    public $user_id, $post_id, $title, $content, $img_url;
    public $isModalOpen = false;

    public $search = '';

    public function mount(){
        $this->user_id = auth()->user()->id;
    }

    public function render()
    {
        $posts = Post::search($this->search)->paginate(10);
        return view('livewire.post.index', compact('posts'));
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->post_id = null;
        $this->title = '';
        $this->content = '';
        $this->img_url=null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'img_url' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $this->img_url->store('posts', 'public');

        $post = Post::updateOrCreate(['id' => $this->post_id], [
            'user_id' => $this->user_id,
            'title' => $this->title,
            'content' => $this->content,
            'img_url' => $imagePath,
        ]);

        // Check if the post was recently created
        if ($post->wasRecentlyCreated) {
            // Notify the post owner about the new Post
            $post->author->notify(new NewPostNotification($post));
        } else {
            // Notify the post owner about the updated Post
            $post->author->notify(new PostUpdateNotification($post));
        }

        $this->notification()->success(
            $title = $this->post_id ? 'Post updated.' : 'Post created.',
            $description = $this->post_id ? 'Post updated successfully.' : 'Post created successfully.'
        );

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->img_url = $post->img_url;

        dd($this->img_url);

        $this->openModalPopover();
    }

    public function deleteConfirm($id)
    {
        $this->dialog()->confirm([
            'title' => 'Are you sure?',
            'description' => 'Do you want to delete this post?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Yes, Delete',
                'method' => 'delete',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function cancel()
    {
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        $this->notification()->success(
            $title = 'Post deleted.',
            $description = 'Post deleted successfully.'
        );
    }
}
