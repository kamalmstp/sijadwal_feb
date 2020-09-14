@extends('_layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12 mb-12">
      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Organisasi Mahasiswa</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('tambahmahasiswa')}}" class="btn btn-success">New</a>
        <hr>
        @if(Session::has('flash_message'))
            <div class="row">   
            <div class="col-lg-12">     
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
            </div>
        @endif 

        <div class="row">
            <div class="col-lg-12">              
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>  
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: #000;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Organisasi</th>
                    <th>Operation</th>
                </tr>                           
                </thead>
                <tbody>
                    <?php $no=0; ?>
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$mhs->organisasi}}</td>
                        <td>
                            <div class="row">
                            &nbsp;&nbsp;<a class="fa fa-edit" href="{{ route('editmahasiswa', $mhs->id)}}" style="color: #000;">&nbsp;Edit</a>&nbsp;&nbsp;

                            {!! Form::open(['method' => 'DELETE', 'route' => ['deletemahasiswa', $mhs->id] ]) !!}
                            <button type="submit" onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Data Ini?')"
                             style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer;
                              overflow: hidden; padding: 0px; ">
                              <i class="fa fa-trash" ></i> <span style="color: #000; font-weight: bold;">Delete</span></button>
                            {!! Form::close() !!}   
                            </div>                                  
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection
