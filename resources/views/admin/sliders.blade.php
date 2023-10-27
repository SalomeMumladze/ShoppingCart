
@extends('admin_layout.layout')
@section('content')
<div class="content-wrapper">
  
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sliders</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sliders</li>
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
              <h3 class="card-title">All Sliders</h3>
            </div>
            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Num.</th>
                  <th>Picture</th>
                  <th>Description one</th>
                  <th>Description Two</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <img src="backend/dist/img/user2-160x160.jpg" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                  </td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>5</td>
                  <td>
                    <a href="#" class="btn btn-warning">Activate</a>
                    <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="#" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <img src="backend/dist/img/user2-160x160.jpg" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                  </td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>5</td>
                  <td>
                    <a href="#" class="btn btn-success">Unactivate</a>
                    <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="#" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Num.</th>
                  <th>Picture</th>
                  <th>Description one</th>
                  <th>Description Two</th>
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

