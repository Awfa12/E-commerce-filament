<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products - E-Commerce')]
class ProductsPage extends Component
{
    use WithPagination;

    #[Url()]
    public $selected_categories = [];

    #[Url()]
    public $selected_brands = [];

    #[Url()]
    public $featured;

    #[Url()]
    public $on_sale;

    #[Url()]
    public $price_range = 3000;

    public function render()
    {
        $procuteQuery = Product::query()->where('is_active', 1);

        if(!empty($this->selected_categories)){
            $procuteQuery->whereIn('category_id', $this->selected_categories);
        }

        if(!empty($this->selected_brands)){
            $procuteQuery->whereIn('brand_id', $this->selected_brands);
        }

        if($this->featured){
            $procuteQuery->where('is_featured', 1);
        }

        if($this->on_sale){
            $procuteQuery->where('on_sale', 1);
        }

        if($this->price_range){
            $procuteQuery->whereBetween('price', [0, $this->price_range]);
        }

        return view('livewire.products-page',[
            'products' => $procuteQuery->paginate(9),
            'brands' => Brand::where('is_active',1)->get(['id','name','slug']),
            'categories' => Category::where('is_active',1)->get(['id','name','slug']),
        ]);
    }
}
