
@extends('admin_layout.tablelayout')
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
                @foreach($sliders as $slider)
                  <tr>
                    <td>{{$slider->id}}</td>
                    <td>
                      <img src="storage/slider_images/{{$slider->slider_image}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                    </td>
                    <td>{{$slider->description1}}</td>
                    <td>{{$slider->description2}}</td>
                    <td>
                      @if($slider->status==1)
                      <a href={{url('/Unactivate_slider/'.$slider->id)}} class="btn btn-success">Unactivate</a>
                      @else
                      <a href={{url('/activate_slider/'.$slider->id)}} class="btn btn-warning">Activate</a>
                      @endif
                      <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                      <a href="#" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
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

