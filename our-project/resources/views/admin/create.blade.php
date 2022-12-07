@extends('admin.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Add a Store</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('products.store')}}" method="POST"> <!-- send name, price and detail to the store function -->
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" class="form-control"  placeholder="product name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  Price</label>
            <input type="text" name="price" class="form-control"  placeholder="product price">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Category</label>
            <input type="text" name="category" class="form-control"  placeholder="product category">
          </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control" name="description"   rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Image</label>
            <br>
            <input type="file" name="avatar"accept="image/png, image/jpeg">
          </div>

       
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>



    </form>
</div>





@endsection