<?php
require('../views/adminPartials/bander.php');
require('../views/adminPartials/navbar.php');
require('../views/adminPartials/content_wrapper.php');
require('../views/adminPartials/aside.php');

$config = require('../config.php');

$db = new Database($config['database']);

?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title pt-2">Order Pending Table</h3>

          </div>



          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>address</th>
                  <th>Order Date</th>
                  <th>Mobile</th>
                  <th>Note</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>

                <?php
                $order = $db->query('select * from userorder where status=0')->get();
                $i = 0;

                while (true) {
                  if (!isset($order[$i])) {
                    break;
                  }
                ?>

                  <tr>
                    <td class="align-middle text-center"><?= $order[$i]['id'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['name'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['address'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['orderDate'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['mobile'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['note'] ?></td>
                    <?php

                    $item = $db->query("select p.name as name,ot.quantity,ot.total as total from orderitem ot,product p where ot.userorder_Id=:userorder_Id AND ot.product_Id=p.id", ['userorder_Id' => $order[$i]['id']])->get();

                    ?>
                    <td class="align-middle text-center"><?php
                                                          $j = 0;
                                                          while (true) {

                                                            echo $item[$j]['name'] . "\n";

                                                            $j++;
                                                            if (!isset($item[$j])) {
                                                              break;
                                                            }
                                                            echo "/";
                                                          }
                                                          ?>
                    </td>

                    <td class="align-middle text-center"><?php
                                                          $j = 0;
                                                          while (true) {

                                                            echo $item[$j]['quantity'] . " ";

                                                            $j++;
                                                            if (!isset($item[$j])) {
                                                              break;
                                                            }
                                                            echo "/";
                                                          }
                                                          ?>
                    </td>

                    <td class="align-middle text-center"><?php
                                                         
                                                         $j = 0;
                                                         $total=0;
                                                         while (true) {
                                                          $total+=$item[$j]['total'];

                                                            $j++;
                                                            if (!isset($item[$j])) {
                                                              break;
                                                            }
                                                          }
                                                          echo $total;
                                                          ?></td>

                    <td class="align-middle text-center"> 
                      <span class="badge badge-success">Pending</span>

                     
                    </td>

                    <td class="align-middle text-center"> 
                      

                    <form action="/orderTable" method="POST">
                        <input type="hidden" name="id" value="<?= $order[$i]['id'] ?>">
                        <button class="btn btn-danger text-light mt-2 mb-2">Deliver</button>
                      </form>
                     
                    </td>





                  </tr>

                <?php

                  $i++;

                }
               

                ?>


              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

<!-- <h3 class="mx-3">Delivered Table</h3> -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title pt-2">Order Delivered Table</h3>

          </div>



          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>address</th>
                  <th>Order Date</th>
                  <th>Mobile</th>
                  <th>Note</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Status</th>

                </tr>
              </thead>
              <tbody>

                <?php
                $order = $db->query('select * from userorder where status=1')->get();
                $i = 0;

                while (true) {
                  if (!isset($order[$i])) {
                    break;
                  }
                ?>

                  <tr>
                    <td class="align-middle text-center"><?= $order[$i]['id'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['name'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['address'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['orderDate'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['mobile'] ?></td>
                    <td class="align-middle text-center"><?= $order[$i]['note'] ?></td>
                    <?php

                    $item = $db->query("select p.name as name,ot.quantity,sum(ot.total) as total from orderitem ot,product p where ot.userorder_Id=:userorder_Id AND ot.product_Id=p.id", ['userorder_Id' => $order[$i]['id']])->get();

                    ?>
                    <td class="align-middle text-center"><?php
                                                          $j = 0;
                                                          while (true) {

                                                            echo $item[$j]['name'] . " ";

                                                            $j++;
                                                            if (!isset($item[$j])) {
                                                              break;
                                                            }
                                                            echo "/";
                                                          }
                                                          ?>
                    </td>

                    <td class="align-middle text-center"><?php
                                                          $j = 0;
                                                          while (true) {

                                                            echo $item[$j]['quantity'] . " ";

                                                            $j++;
                                                            if (!isset($item[$j])) {
                                                              break;
                                                            }
                                                            echo "/";
                                                          }
                                                          ?>
                    </td>

                    <td class="align-middle text-center"><?php
                                                         

                                                            echo $item[0]['total'] . " ";

                                
                                                          ?></td>

                    <td class="align-middle text-center"> 
                      <span class="badge badge-warning">Delivered</span>

                     
                    </td>




                  </tr>

                <?php

                  $i++;
                }

                ?>


              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>