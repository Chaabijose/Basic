<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category<b> </b>
            
            
        </h2>
    </x-slot>

    <div class="col-md-8">

    <div class="container">
        <div class="row">
           
                <div class="card-body">

                <form method="POST" action="{{ url('category/update/'.$categories->id)}}" >
                    @csrf 
                   
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Update Category Name </label>
    <input type="text" name="category_name" class="form-control" 
    id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$categories->category_name}}">

    @error('category_name')
    <span class=" text-danger">{{ $message }}</span> 
@enderror
    
  </div>
  
  <button type="submit" class="btn btn-primary">Update Category</button>
</form>
            </div>

            </div>       
    </div>

    
   
</x-app-layout>
