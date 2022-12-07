@extends('admin.layout')

@section('content')

<div class="jumbotron container">

    <a class="btn btn-primary btn-lg" href="{{ route('admin.create')}}" role="button">Add Product  </a>

  </div>

  <!-- this is to display the messages in the functions when an operation has successfully done -->
  <div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
      @endif

  </div>

  <div class="container">
 <form type="get" action="{{ url('/search')}}">
    <input name="query" type="search" placeholder="Search for a product">
    <button type="submit" >Search</button>
</form>
</div>

  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Product price</th>
            <th scope="col" style="width: 400px">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($stores as $item)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }} IQD  </td>
                <td>

                    <div class="row">
                        <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('admin.edit',$item->id)}}"> Edit </a>

                        </div>
                        <div class="col-sm">
                            <a  class="btn btn-primary" href="{{ route('admin.show',$item->id)}}"> Show</a>

                        </div>

                       

                        <div class="col-sm">
                            <form action="{{ route('admin.destroy',$item->id)}}" method="POST"> <!-- in form because we don't have a delete page-->
                                @csrf <!-- protect from hacking -->
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete</button>
                                </form>
                        </div> 
                      </div>


                </td>
              </tr>
            @endforeach

        </tbody>
      </table>

     {!! $products->links() !!} <!-- it's for pagination -->
  </div>

@endsection