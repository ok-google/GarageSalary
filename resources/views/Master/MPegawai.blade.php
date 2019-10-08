@extends('Layout.app')

@section('content')
    <div class="card mb-3">
      <div class="card-header">  
        <i class="fas fa-table"></i>
        Data Table Example
        <button class="btn btn-primary pull-right" id="btnTambah" style="margin-left:75%;">
          Tambah
        </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="MeTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

 <div class="modal fade" id="input-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="tipe">
  	    	<label>Nama</label>
  	    	<input class="form-control" id="nama" name="nama">
	  	  </div>
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input class="form-control" id="nama" name="nama">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
        <button type="button" id="btnCancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection