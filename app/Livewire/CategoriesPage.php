<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

class CategoriesPage extends Component
{
    #[Title('Categories Page - E-Commerce')]

    public function render()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('livewire.categories-page',[
            'categories' => $categories
        ]);
    }
}
