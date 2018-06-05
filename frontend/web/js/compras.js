


var itemSelected=null;
var cont=0;


$(document).ready(function (){


    $('.detalle').hide();
    $('.id_art').hide();

    $(document).on("click",".delete",function (){
      deleteRow($(this));
    });



    $(document).on('click', '.add', (function() {

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
                $('#md-compras').modal();
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
      cont=cont+1;
      var row=   '<tr id=' + cont + '></td>  <td class="center">'
                   + cont +
                   '</td><td style="display:none">'+result.id_art+
                   '</td><td>'+result.ref+
                   '</td><td>'+result.descripcion+
                   '</td><td class="center">'+result.cnt_p+
                   '</td><td class="center">'+result.cnt_r+
                   '</td><td><button class= "btn btn-xs btn-danger delete" ><i class="ace-icon fa fa-trash-o bigger-120"></i></button ></td></tr>';
      $(".table").append(row);
    }


    function ObjectJson(){
      //   Function para obtener las filas en json ---

    }
});
