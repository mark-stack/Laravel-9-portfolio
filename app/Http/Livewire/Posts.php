<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class Posts extends Component
{
    public $title;
    public $slug;

    protected $rules = [
        'title' => 'required|max:100',
        'slug' => 'required|max:100'
    ];

    public function render()
    {
        $posts = Post::latest('id')->take(5)->get();

        return view('livewire.posts', compact('posts'));
    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->title);
    }

    public function storePost()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
        ]);

        $this->title = '';
        $this->slug = '';
    }
}
