@extends('admin_layout.tablelayout')
@section('content')
  <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Products</h3>
              </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Num.</th>
                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>
                        <img src="/storage/product_images/{{$product->product_image}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                      </td>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->product_category}}</td>
                      <td>{{$product->product_price}}</td>
                      <td>
                        @if($product->status==1)
                        <a href={{url('/Unactivate_product/'.$product->id)}} class="btn btn-success">Unactivate</a>
                        @else
                        <a href={{url('/activate_product/'.$product->id)}} class="btn btn-warning">Activate</a>
                        @endif
                        <a href={{url('/edit_product/'.$product->id)}}  class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                        <a href={{url('/deleteproduct/'.$product->id)}} id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Num.</th>
                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </section>
    
  </div>
  @endsection
