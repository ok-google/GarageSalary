function getAll(){
  $.ajax({
      url: "http://localhost:8000/Bulan/Get",
    
      method: 'GET',
    
      "dataType":"json",
      timeout: 50000,
      
      success: function(result){
          $('#MeTable').dataTable().fnClearTable();
          $('#MeTable').dataTable().fnDestroy();
          var no = 1;
          console.log(result);
          $.each(result, function(index){
              $('#MeTable').dataTable().fnAddData( [
                result[index]['Bulan'],
                result[index]['Tahun'],
                result[index]['TotalKerjaNonSabtu'],
                result[index]['TotalKerjaSabtu'],
                result[index]['TotalJamKerja']
              ]);
              no += 1;
          });
      }
  });
}

function insert(e){
        e.preventDefault();

        $.ajax({
            url: "http://localhost:8000/Bulan/Generate/" + $('#bulan').val() + "/" + $('#tahun').val(),
            method: 'GET',
            success: function(result){
                $('#input-modal').modal('hide');
                $('#bulan').val('');
                $('#tahun').val('');

                getAll();
                
            }
        });
    }


$( document ).ready(function(e){
  getAll();

  $('#btnTambah').click(function(){
      $('#input-modal').modal('show');
  });

  $('#btnSave').click(function(e){
      insert(e);
  });

  $('#btnCancel').click(function(){
     $('#bulan').val('');
     $('#tahun').val('');
  });
});