@extends('admin_layout.tablelayout')
@section('content')
{{$increment=1}}
 
  <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
                <h3 class="card-title">All categories</h3>
              </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Num.</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{$increment++}}</td>
                      <td>{{$category->category_name}}</td>
                      <td>
                        <a href={{url('/edit_category/'.$category->id)}} class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                        <a href={{url('/delete_category/'.$category->id)}} id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Num.</th>
                    <th>Category Name</th>
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
