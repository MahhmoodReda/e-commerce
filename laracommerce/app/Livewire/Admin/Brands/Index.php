<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brands;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$slug,$brand_id;

    #validate data
    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:100|unique:brands,name',
            'slug'=>'required|string',
        ];
    }

    #reset inputs after submit
    public function resetInput()
    {
        $this->name= null;
        $this->slug= null;
        $this->brand_id = null;
    }
############################################## Store Method
    #store data
    public function storeBrand()
    {
        $validatedData = $this->validate();
        $validatedData['slug'] = Str::slug($this->slug);
        Brands::create($validatedData);
        session()->flash('success','Brand created successfully');
        #event to close the modal
        $this->dispatch('close-modal');
        #reset inputs
        $this->resetInput();
    }
############################################## Edit + Update Methods
    #edit data
    public function editBrand(int $id)
    {
        $this->brand_id = $id;
        $brands=Brands::findOrFail($id);
        $this->name = $brands->name;
        $this->slug = $brands->slug;
    }

    #update data
    public function updateBrand()
    {
        $validatedData = $this->validate();
        $validatedData['slug'] = Str::slug($this->slug);
        Brands::findOrFail($this->brand_id)->update($validatedData);
        session()->flash('success','Brand updated successfully');
        #event to close the modal
        $this->dispatch('close-modal');
        #reset inputs
        $this->resetInput();
    }

############################################## Delete + Destroy methods
    #Delete brand
    public function deleteBrand(int $id)
    {
        $this->brand_id = $id;
    }

    #destroy brand
    public function destroyBrand()
    {
        Brands::findOrFail($this->brand_id)->delete();
        session()->flash('success','Brand deleted successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }


    public function render()
    {
        $brands=Brands::orderBy('id','asc')->paginate(3);
        return view('livewire.admin.brands.index',['brands'=>$brands]);
    }
}