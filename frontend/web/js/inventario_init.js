




var itemSelected=null;
var cont=0;


$(document).ready(function (){


  

    $(document).on('click','.procesar',function (){

      $('.tl').text('Confirmar Cierre de Inventario');
      $.get(

          $(this).data('url'),
          function (data) {
              $('.modal-body').html(data);
              $('#modal-inventario-init').modal();
          }
      );


      });





    $(document).on('click', '.add', (function() {

      return 0;
      if (itemSelected==null) {
           alert("Selecione un Articulo...");
        } else {
          //----- llamada via ajax ------
          $.ajax(
                {
                  url : 'index.php?r=proveduria%2Fprov-compras-dt%2Fadd-data',
                  type: "GET",
                  data : createDetalle(),
                  DataType:'JSON',
                })
                  .done(function(data) {
                    add(data);
                  })
                  .fail(function(data) {
                    alert( "error" );
                  })
                  .always(function(data) {
                    //alert( "complete" );
            });

      }

    }));

    $(document).on('click', '#activity-index-link', (function() {
        $('.tl').text('Nuevo Articulo');
        $.get(

            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal-inventario-init').modal();
            }
        );
    }));

    $('form#compra-dt-form').on('beforeSubmit', function (e){
        alert ('si');
    });







    function createDetalle(){
      var jObj={
          id_art:itemSelected,
          cnt_p:'10',
          cnt_r:'10'
      }

      return jObj;
    }

    function deleteRow(obj) {
            obj.parent().parent("tr:first").remove();
            cont--;
            reorderItems();
    }

    function agregar(){
      alert ("si");
    }

    function reorderItems(){
      var items=1;
      $("#tbl tbody tr").each(function(){
        $(this).find("td").eq(0).text(items);
        items++;
      })
    }

    function add(result){
      alert(result);
    }


    function ObjectJson(){
      //   Function para obtener las filas en json ---

    }
});
