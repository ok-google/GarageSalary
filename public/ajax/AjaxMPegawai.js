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
          $('#btnTambah').click(function(){
              $('#tipe').val('insert');
              if($('#tipe').val() == "insert"){
                  $('#input-modal .modal-title').text('Tambah Pegawai');
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


$( document ).ready(function(e){
    var tipe;

    getAll();

    $('#btnTambah').click(function(){
        $('#tipe').val('insert');
        if($('#tipe').val() == "insert"){
            $('#input-modal .modal-title').text('Tambah Pegawai');
        }

        
        $('#input-modal').modal('show');     
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