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
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!-- <th style="width: 10px">#</th> -->
                      <th>Name</th>
                      <th>Description</th>
                      <th style="width: 40px">Status</th>
                      <th style="width: 20%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->path }}</td>
                        @if($d->status == 1)
                        <td><span class="badge badge-success">Active</span></td>
                        @else
                        <td><span class="badge badge-danger">Inactive</span></td>
                        @endif
                        <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ url()->current() }}/{{ $d->id}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
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
    $('#list').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endSection