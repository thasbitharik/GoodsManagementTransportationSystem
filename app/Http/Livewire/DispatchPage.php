<?php

namespace App\Http\Livewire;
use App\Models\Size;
use App\Models\DeliveryType;
use App\Models\Category;
use App\Models\SubCategory;
use Request;
use Livewire\Component;

class DispatchPage extends Component
{
    public $size_list = [];
    public $delivery_list = [];
    public $category_list = [];
    public $subcategory_list = [];



    public function fetchData()
    {
        $this->category_list = Category::get();
        $this->subcategory_list = SubCategory::get();
        $this->size_list = Size::get();
        $this->delivery_list = deliveryType::get();

        // dd($this->size_list);
    }
    public function render()
    {
        $this->fetchData();
        return view('livewire.dispatch-page')->layout('layouts.front_master');
    }
}
