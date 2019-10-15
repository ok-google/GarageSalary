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
      if($('#tipe1').val() == "Masuk"){
        if(timeToSeconds($('#Jam').val() + ':00') > timeToSeconds('08:15:00')){
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
        $('#tipe').val('Lembur');
        
        $('#input-modal-opsi .modal-title').text('Lembur');
        

        $('#input-modal-opsi').modal('show');     
    });

    $('#btnSave').click(function(e){
        
        tipe = $('#tipe').val();
        if (tipe == "insert"){
            insert(e);
        }

        if (tipe == "update"){
            update(e);
        }

        clearModal();

    });

    $('#btnCancel').click(function(){
        clearModal();
    });
});