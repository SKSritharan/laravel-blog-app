<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class PublicView extends Component
{
    public $search = '';

    public function render()
    {
        $posts = Post::with('comments', 'author')->search($this->search)->paginate(10);
        return view('livewire.post.public-view', compact('posts'));
    }
}
