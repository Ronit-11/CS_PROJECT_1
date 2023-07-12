<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProductModal extends Component
{
    use WithPagination;
    public $showingProduct = false;
    public $selectedProduct, $sortedProducts;

    protected $listeners = [
        'hideMe' => 'hideProduct',
        'categoryUpdated'
    ];

    public int $quantity;
    public string $description;
    public $name;

    /*public function mount($CategorizedProducts){
            $this->CategorizedProducts = $CategorizedProducts;
        dd($this->CategorizedProducts);

    }*/
    public int $currentCatId = 0;

    public function categoryUpdated($id){

        if($id == 0) {
            $this->sortedProducts = null;
            $this->name = null;
            $this->render();

        }else{
            $this->name = Category::query()->where('id', '=', [$id])->get()->pluck('categoryName');
            $this->sortedProducts = Product::query()->where('category_id', '=', [$id])->inRandomOrder()->get();
            $this->currentCatId = $id;
            /*dd($this->name[0]);*/
            $this->render();
        }
    }
    public function render()
    {
        /*$_SESSION()*/
        if($this->sortedProducts == null){
            return view('livewire.show-product-modal', ['sProducts' => Product::query()->inRandomOrder()->get()/*query()->paginate(10)*/]);
        }else{

            return view('livewire.show-product-modal', ['sProducts' => $this->sortedProducts, 'catName' => $this->name[0]]);
        }
    }

    public function showProduct(int $id){
        $this->selectedProduct = "";
        $getproduct = Product::query()->where('id','=',[$id])->get();
        $this->selectedProduct = $getproduct[0];
        $this->showingProduct = true;
    }
    public function addToCart(){
        /*$this->selectedProduct->id  use this for adding to cart*/
        $cartItems = 2;
        $this->emit('cartNo', $cartItems);
        $this->hideModal();
    }

    public function hideModal(){
        $this->showingProduct = false;
    }
}
