<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products - E-Commerce')]
class ProductsPage extends Component
{
    use WithPagination;

    #[Url()]
    public array $selected_categories = [];

    #[Url()]
    public array $selected_brands = [];

    #[Url()]
    public bool $featured = false;

    #[Url()]
    public bool $on_sale = false;

    #[Url()]
    public int $price_range = 3000;

    #[Url()]
    public string $sort = 'latest';

    private function applyFilters($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query
        ->when(!empty($this->selected_categories), function ($query) {
            $query->whereIn('category_id', $this->selected_categories);
        })
        ->when(!empty($this->selected_brands), function ($query) {
            $query->whereIn('brand_id', $this->selected_brands);
        })
        ->when($this->featured, function ($query) {
            $query->where('is_featured', 1);
        })
        ->when($this->on_sale, function ($query) {
            $query->where('on_sale', 1);
        })
        ->when($this->price_range, function ($query) {
            $query->whereBetween('price', [0, $this->price_range]);
        })->when($this->sort == 'latest', function ($query) {
            $query->latest();
        })->when($this->sort == 'price', function ($query) {
            $query->orderBy('price');
        });
    }

    private function prepareViewData(): array
    {
        $productQuery = $this->applyFilters(
            Product::query()
                ->where('is_active', 1)
                ->with(['brand', 'category']) // Eager load relationships
        );

        $brands = Cache::remember('active_brands', 3600, function () {
            return Brand::where('is_active', 1)->select(['id', 'name', 'slug'])->get();
        });
    
        $categories = Cache::remember('active_categories', 3600, function () {
            return Category::where('is_active', 1)->select(['id', 'name', 'slug'])->get();
        });
    
        return [
            'products' => $productQuery->simplePaginate(9),
            'brands' => $brands,
            'categories' => $categories,
        ];
    }

    // add product To cart
    public function addToCart($product_id){
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        LivewireAlert::title('Product added!')
        ->text('The Product has been successfully added to the cart!')
        ->position('bottom-end')
        ->timer(3000)
        ->toast()
        ->success()
        ->show();
    }


    public function render()
    {
        return view('livewire.products-page', $this->prepareViewData());
    }
}
