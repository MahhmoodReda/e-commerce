<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $category_id;


    public function render()
    {
        $categories = Category::orderBy('id','asc')->paginate(4);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }


    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }


    public function destroyCategory()
    {
        $category = Category::findOrFail($this->category_id);
        if($category->image)
        {
            Storage::delete($category->image);
        }
        $category->delete();
        session()->flash('success','Category deleted successfully');
        #event close the modal in livewire/index
        $this->dispatch('close-modal');
    }
}
