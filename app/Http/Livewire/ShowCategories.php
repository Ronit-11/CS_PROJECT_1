<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShowCategories extends Component
{
    public array $test = [];
    /*public $test2 = 'one';*/

    public function render()
    {
        return view('livewire.show-categories');
    }

    public $prev = 0;

    public $listeners = [

    ];
    public function selectcategory($id){
        /*if($id = 0){
            $sproducts= Product::query()->inRandomOrder()->get();
        }else{
            $sproducts = Product::query()->where('category_id', '=', [$id])->get();
        }*/
        if(!($this->prev ==$id)){
            $this->prev = $id;
            /*dd($this->prev);*/
            $this->emit('categoryUpdated', $id);
        }

        /*$this->test2 = 'test';*/



    }
}
