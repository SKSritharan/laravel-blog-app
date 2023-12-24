<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    public function render()
    {
        $posts = Post::search($this->search)->paginate(10);
        return view('livewire.post.index', compact('posts'));
    }
}
