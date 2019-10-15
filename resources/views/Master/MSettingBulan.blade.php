@extends('Layout.app')
@section('title-content', 'Setting Bulan')
@section('content')
	
	
<div class="card mb-3">
    <div class="card-header">
    	<i class="fas fa-table"></i>
        Setting Bulan
        <button class="btn btn-primary" id="btnTambah" style="margin-left: 80%"> Generate </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
          	<table class="table table-bordered" id="MeTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Total Hari Kerja</th>
                    <th>Total Sabtu</th>
                    <th>Total Jam Kerja</th>
                  </tr>
                </thead>

                <tbody id="list-bulan">
				
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
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Bulan</label>
                        <div class="col-sm-10">
                            <input type="text" id="bulan" name="kode" class="form-control" placeholder="Bulan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" id="tahun" name="nama" class="form-control" placeholder="Tahun">
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
	

@endsection

@section('js')
    {{-- Rule Register --}}
    <script src="{{asset('ajax/AjaxMBulan.js')}}"></script>
@endsection