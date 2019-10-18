@extends('Layout.app')
@section('title-content', 'Absensi')
@section('content')
	
	
<div class="card mb-3">
    <div class="card-header">
    	<i class="fas fa-table"></i>
        Absensi
        <button class="btn btn-success" id="btnMasuk" style="margin-left: 55%"> Masuk </button>
        <button class="btn btn-info" id="btnIjin" > Ijin </button>
        <button class="btn btn-Danger" id="btnSakit" > Sakit </button>
        <button class="btn btn-primary" id="btnPulang" > Pulang </button>
        <button class="btn btn-warning" id="btnLembur" > Lembur </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
          	<table class="table table-bordered" id="MeTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Ijin</th>
                    <th>Sakit</th>
                    <th>Terlambat</th>
                    <th>Lembur</th>
                  </tr>
                </thead>

                <tbody id="list-absensi">
				
	        	</tbody>

        	</table>
        </div>
	</div>
</div>

<div class="modal fade in" id="input-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<h4 class="modal-title">Generate Bulan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearModal()">
                	<span aria-hidden="true">×</span></button>
            </div>
        <div class="modal-body">
            <form id="form" class="form-horizontal">
                <input type="hidden" name="tipe1" id="tipe1">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Jam Masuk</label>
                        <div class="col-sm-10">
                            <input placeholder="Selected time" type="text" id="Jam" class="form-control timepicker">
                        </div>
                    </div>

                    <div class="alert alert-info" id="pesan">
                      <strong>Info!</strong> <div id="textPesan"> </div>
                    </div>

                    <div class="form-group" id="inputJatah">
                        <label class="col-sm-6 control-label">Alasan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Jatah">
                                <option value="-"> --- Pilih Satu --- </option>
                                <option value="Terlambat">Terlambat</option>
                                <option value="Ijin">Ijin</option>
                                <option value="sakit">Sakit</option>
                            </select>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnCancel" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
            <button type="button" id="btnSave" class="btn btn-primary">Save</button>
        </div>
        </div>
    </div>
</div>	    


<div class="modal fade in" id="input-modal-opsi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ijin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearModal()">
                    <span aria-hidden="true">×</span></button>
            </div>
        <div class="modal-body">
            <form id="form" class="form-horizontal">
                <input type="hidden" name="tipe2" id="tipe2">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Jam Mulai</label>
                        <div class="col-sm-10">
                            <input placeholder="Selected time" type="text" id="JamMulai" class="form-control timepicker">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Jam Selesai</label>
                        <div class="col-sm-10">
                            <input placeholder="Selected time" type="text" id="JamSelesai" class="form-control timepicker">
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnCancelLain" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
            <button type="button" id="btnSaveLain" class="btn btn-primary">Save</button>
        </div>
        </div>
    </div>
</div>      
	

@endsection

@section('js')
    {{-- Rule Register --}}
    <script src="{{asset('ajax/AjaxTAbsensi.js')}}"></script>
@endsection