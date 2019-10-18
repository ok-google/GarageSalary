function getAll(){
  $.ajax({
      url: "http://localhost:8000/pegawai/fetch",
    
      method: 'GET',
    
      "dataType":"json",
      timeout: 50000,
      
      success: function(result){
          $('#MeTable').dataTable().fnClearTable();
          $('#MeTable').dataTable().fnDestroy();
          var no = 1;
          console.log(result);
          $.each(result, function(index){
              var id = result[index]['IdMPegawai'];

              $('#MeTable').dataTable().fnAddData( [
                result[index]['NmMPegawai'],
                result[index]['Email'],
                result[index]['NoTelp'],
                '<button class="btn btn-info btnUpdate" data-id="'+id+'">' +
                '<i class="fa fa-pencil"></i>' +
                '</button>' +
                '<button class="btn btn-danger btnDelete" data-id="'+id+'">' +
                '<i class="fa fa-trash"></i>' +
                '</button>'
              ]);
              no += 1;
          });

          //event insert
          $('#btnMasuk').click(function(){
              $('#tipe').val('masuk');
              if($('#tipe').val() == "insert"){
                  $('#input-modal .modal-title').text('Masuk');
              }

              $('#aktif').attr('checked', true);

              $('#input-modal').modal('show');
              
          });

         //event update
          $('#MeTable').delegate('.btnUpdate', 'click', function(){
              var id = $.trim($( this ).attr('data-id'));
              
              getById(id);
              
              $('#tipe').val('update');
              if($('#tipe').val() == "update"){
                  $('#input-modal .modal-title').text('Update Pegawai');
              }

              $('#input-modal').modal('show');
          });

         //action delete
          $('#MeTable').delegate('.btnDelete', 'click', function(e){
              var id = $.trim($( this ).attr('data-id'));
              
              deleteData(e, id);
          });  
      }
  });
}

function InsertHistory(e){
    e.preventDefault();

    var SelisihJam, JamMulai, JamSelesai;

    JamMulai = timeToSeconds($('#JamMulai').val() + ':00') / 100;
    JamSelesai = timeToSeconds($('#JamSelesai').val() + ':00') / 100;

    if ($('#tipe2').val() != "Lembur"){
        SelisihJam = Math.floor((JamSelesai - JamMulai) / 1800);
        SelisihJam = SelisihJam * 30;
    } else {
        SelisihJam = Math.floor((JamSelesai - JamMulai) / 900) + 1;
        SelisihJam = SelisihJam * 15;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    

    $.ajax({
        url: "http://localhost:8000/History/Insert",
        method: 'POST',
        data : {
          _token: $("input[name=_token]").val(),
          IdMPegawai : 1,
          Tanggal : '2019-02-01',
          JamMulai : $('#JamMulai').val(),
          JamSelesai : $('#JamSelesai').val(),
          Selisih : SelisihJam,
          Jenis : $('#tipe2').val()
        },
        success: function(result){
          console.log('History Tersimpan');
        }
    });
}

function clearModal(){
  
}

function timeToSeconds(time) {
    time = time.split(/:/);
    return time[0] * 3600 + time[1] * 60 + time[2];
}


$( document ).ready(function(e){
    var tipe;

   // getAll();

   $('#Jam').timepicker({
      minuteStep: 1,
      // template: 'modal',
      // appendWidgetTo: 'body',
      // showSeconds: true,
      showMeridian: false,
      defaultTime: false
   });

   $('#JamMulai').timepicker({
      minuteStep: 1,
      // template: 'modal',
      // appendWidgetTo: 'body',
      // showSeconds: true,
      showMeridian: false,
      defaultTime: false
   });

   $('#JamSelesai').timepicker({
      minuteStep: 1,
      // template: 'modal',
      // appendWidgetTo: 'body',
      // showSeconds: true,
      showMeridian: false,
      defaultTime: false
   });

   $('#Jam').change(function(){
      var time, menit;

      if($('#tipe1').val() == "Masuk"){
        if(timeToSeconds($('#Jam').val() + ':00') > timeToSeconds('08:15:00')){
          time = timeToSeconds($('#Jam').val() + ':00');

          time = time / 100;

          time = Math.floor((time - 29700) / 1800) + 1;

          menit = time * 30;
          time = menit / 60;

          $('#textPesan').text("Masukan alasan anda terlambat " + time + " jam ( " + menit + " menit )");
          $('#pesan').show();
          $('#inputJatah').show();
        } else {
          $('#pesan').hide();
          $('#inputJatah').hide();
        }
      }
   });

    $('#btnMasuk').click(function(){
        $('#tipe1').val('Masuk');
        
        $('#input-modal .modal-title').text('Masuk');
        
        
        $('#pesan').hide();
        $('#inputJatah').hide();

        $('#input-modal').modal('show');     
    });

    $('#btnPulang').click(function(){
        $('#tipe1').val('Pulang');
        
        $('#input-modal-opsi .modal-title').text('Pulang');
        
        $('#pesan').hide();
        $('#inputJatah').hide();

        $('#input-modal').modal('show');     
    });

    $('#btnIjin').click(function(){
        $('#tipe2').val('Ijin');
        
        $('#input-modal-opsi .modal-title').text('Ijin');

        $('#input-modal-opsi').modal('show');     
    });

    $('#btnSakit').click(function(){
        $('#tipe2').val('Sakit');
        
        $('#input-modal-opsi .modal-title').text('Sakit');

        $('#input-modal-opsi').modal('show');     
    });

    $('#btnLembur').click(function(){
        $('#tipe2').val('Lembur');
        
        $('#input-modal-opsi .modal-title').text('Lembur');
        

        $('#input-modal-opsi').modal('show');     
    });

    $('#btnSave').click(function(e){
        if($('#Jatah').val() != "-"){

          $('#JamMulai').val("08:15");
          $('#JamSelesai').val($('#Jam').val());
          $('#tipe2').val($('#Jatah').val());

          InsertHistory(e);
        }
    });

    $('#btnSaveLain').click(function(e){
        InsertHistory(e);
    });

    $('#btnCancel').click(function(){
        clearModal();
    });
});