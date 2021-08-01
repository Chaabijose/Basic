<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories<b> </b>
            
            
        </h2>
    </x-slot>

    <div class="py-12">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                    @endif
                <div class="card-header">
                All Category
                </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">user</th>
      <th scope="col">Category_name</th>
      <th scope="col"> Created At</th>
      <th scope="col"> Action</th>
    </tr>
  </thead>
  <tbody>
   
     @foreach ($categories as $categorie)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$categorie->user->name}}</td>
      <td>{{$categorie->category_name}}</td>
      <td>{{Carbon\Carbon::parse($categorie->created_at)->diffforHumans()}}</td>
      <td>
        <a href="{{ url('category/edit/'.$categorie->id) }}" class="btn btn-info">Edit</a>
        <a href="{{url('softdelete/category/'.$categorie->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
     @endforeach   
</table>

{{ $categories->links()}}

        </div>
        </div>

        <div class="col-md-4">
                <div class="card">
                <div class="card-header">
                Add Category
                </div>

                <div class="card-body">

                <form method="POST" action="{{ route('store.category') }}" >
                    @csrf 
                    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name </label>
    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    @error('category_name')
    <span class=" text-danger">{{ $message }}</span>
@enderror
    
  </div>
  
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>



            </div>

            </div>       
           
            </div>

            <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
             
                <div class="card-header">
                Trush List 
                </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">user_id</th>
      <th scope="col">Category_name</th>
      <th scope="col"> Created At</th>
      <th scope="col"> Action</th>
    </tr>
  </thead>
  <tbody>
   
     @foreach ($trachCat as $categorie)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$categorie->user->name}}</td>
      <td>{{$categorie->category_name}}</td>
      <td>{{Carbon\Carbon::parse($categorie->created_at)->diffforHumans()}}</td>
      
    </tr>
     @endforeach  
     
       
     </tbody> 
</table>

{{ $trachCat->links()}}

        </div>
        </div>

        <div class="col-md-4">
                <div class="card">
</div>

          
   
</x-app-layout>
