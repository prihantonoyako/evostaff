@extends('layouts.dashboard')

@section('pageStyle')
<!-- DataTables -->
<link rel="stylesheet" href="<?= asset('assets/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
@endSection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <!-- Default box -->
      {{-- <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Nicole Pearson</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= asset('assets/admin-lte/dist/img/user1-128x128.jpg') ?>" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}    
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
                  <a class="btn btn-primary btn-sm float-right" href="{{ url()->current() }}/create">
                      <i class="fas fa-plus"></i>
                  </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="employees-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <!-- <th style="width: 10px">#</th> -->
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Department</th>
                      <th style="width: 40px">Status</th>
                      <th style="width: 20%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{ $d->first_name }}</td>
                        <td>{{ $d->last_name }}</td>
                        @if($d->department)
                        <td>{{ $d->department->name }}</td>
                        @else
                        <td>N/A</td>
                        @endif
                        @if($d->status == 1)
                        <td><span class="badge badge-success">Active</span></td>
                        @elseif($d->status == 2)
                        <td><span class="badge badge-success">Onboarding</span></td>
                        @elseif($d->status == 3)
                        <td><span class="badge badge-success">Offboarding</span></td>
                        @else
                        <td><span class="badge badge-success">Inactive</span></td>
                        @endif
                        <td class="project-actions text-right">
                          {{-- <a class="btn btn-primary btn-sm" href="{{ url()->current() }}/{{ $d->id}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> --}}
                          <a class="btn btn-info btn-sm" href="{{ url()->current() }}/update/{{ $d->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $data->links('layouts.pagination') }}
              </div>
            </div>
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>
@endsection

@section('pageScript')
<script src="<?= asset('assets/admin-lte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script>
  $(function () {
    $('#employees-table').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endSection