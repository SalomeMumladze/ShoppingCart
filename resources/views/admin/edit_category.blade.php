@extends('admin_layout.layout')
@section('content')

  <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">edit category</small></h3>
              </div>
              <form action="{{url('/updatecategory')}}" method="GET" class="form-horizontal">
                {{csrf_field()}}
                <div class="card-body">
                  <input type="hidden" name="id" value="{{ $category->id }}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category name</label>
                    <input type="text" name='category_name' value={{$category->category_name}} class="form-control" id="exampleInputEmail1" placeholder="Enter category">
                  </div>
                </div>
                
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Save" >
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection