<?php
session_start();
include('../connect.php');
$a = $_POST['code'];

$d = $_POST['price'];

// query
$sql = "INSERT INTO products (product_code,price) VALUES (:a,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':d'=>$d));
header("location: products.php");


?>

<script type="text/javascript">
	$(document).ready(function() {
  function crearTabla(datos) {
    let $dt = $('#tbl-buys');
    let dt = $dt.DataTable({
      data: datos,
      order: false,
      columns: [{
          render: function(data, type, full, meta) {
            // ACA controlamos la propiedad para des/marcar el input
            return "<input type='checkbox'" + (full.checked ? ' checked' : '') + "/>";
          },
          orderable: false
        },
        {
          data: 'Producto',
          orderable: false
        },
        {
          data: 'Cantidad',
          orderable: false
        },
        {
          data: 'Precio',
          orderable: false
        },
      ]
    });
    let $total = $('#total');

    // Cuando hacen click en el checkbox del thead
    $dt.on('change', 'thead input', function(evt) {
      let checked = this.checked;
      let total = 0;
      let data = [];

      dt.data().each(function(info) {
        // ACA cambiamos el valor de la propiedad
        info.checked = checked;
        // ACA accedemos a las propiedades del objeto
        if (info.checked) total += info.Precio;
        data.push(info);
      });

      dt.clear()
        .rows.add(data)
        .draw();
      $total.val(total);
    });

    // Cuando hacen click en los checkbox del tbody
    $dt.on('change', 'tbody input', function() {
      let info = dt.row($(this).closest('tr')).data();
      let total = parseFloat($total.val());
      // ACA accedemos a las propiedades del objeto
      info.checked = this.checked;
      let price = info.Precio;
      total += info.checked ? price : price * -1;
      $total.val(total);
    });
  }
  
  // ACA suscribimos un listener
  $('#btnObtener').on('click', function() {
    let dt = $('#tbl-buys').DataTable();
    let checkeds = dt.data().toArray().filter((data) => data.checked);
    console.log(checkeds);
  });

  crearTabla([{
      "Producto": "Leche",
      "Cantidad": 50,
      "Precio": 3.20
    },
    {
      "Producto": "Azucar",
      "Cantidad": 40,
      "Precio": 2.20
    },
    {
      "Producto": "Gaseosa",
      "Cantidad": 14,
      "Precio": 6.50
    }
  ]);
});
	
</script>