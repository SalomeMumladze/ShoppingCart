@extends('admin_layout.layout')
@section('content')

  <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Update product</h3>
              </div>
              <form action="{{ url('/updateproduct') }}" method="POST" enctype="multipart/form-data" id="quickForm">
                {{csrf_field()}}
                <div class="card-body">
                  <input type="text" hidden name="id" class="form-control" id="exampleInputEmail1" placeholder="Enter product name" value={{$product->id}}>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product name</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter product name" value={{$product->product_name}}>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product price</label>
                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1" value={{$product->product_price}}>
                  </div>
                  <div class="form-group">
                    <label>Product category</label>
                    <select class="form-control select2" style="width: 100%" name='product_category'>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_name }}" {{ $category->category_name === $product->product_category ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                  <label for="exampleInputFile">Product image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="product_image" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                  <input type="submit" class="btn btn-success" value="update">
                </div>
              </form>
            </div>
            
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        
      </div>
    </section>
    
  </div>
  @endsection