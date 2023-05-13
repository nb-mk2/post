<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />

<table class="table table-striped table-bordered" data-page-length="2" id="tbl-buys">
  <thead>
    <tr>
      <th>
        <input type="checkbox" />
      </th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
      <?php
      function formatMoney($number, $fractional=false) {
          if ($fractional) {
            $number = sprintf('%.2f', $number);
          }
          while (true) {
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
            if ($replaced != $number) {
              $number = $replaced;
            } else {
              break;
            }
          }
          return $number;
        }
        include('../connect.php');
        $result = $db->prepare("SELECT *, price * qty as total FROM products ORDER BY product_id DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){
        $total=$row['total'];
        $availableqty=$row['qty'];
        
        echo '<tr class="record">';
        
      ?>
    
      <td><?php echo $row['product_code']; ?></td>


      <td>$<?php
      $pprice=$row['price'];
      echo formatMoney($pprice, true);
      ?></td>
      <td><a rel="facebox" title="Click para editar materiales" href="editproduct.php?id=<?php echo $row['product_id']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
      <a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click para eliminar materiales"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
      </tr>
      <?php
        }
      ?>
  </tbody>
</table>
<!--<label>Total</label>
<input type="text" id="total" class="form-control" readonly value="0.0" />-->
<br>
<button id="btnObtener">Obtener</button>

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


});
</script>