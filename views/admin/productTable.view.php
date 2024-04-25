
    <?php
 require('../views/adminPartials/bander.php');
 require('../views/adminPartials/navbar.php');
 require('../views/adminPartials/content_wrapper.php');
 require('../views/adminPartials/aside.php');
    ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title pt-2">Product Table</h3>

                  <div class="float-right">
                    <a type="submit" href="/admin/insert" class="btn btn-primary text-light ">Insert</a>
                  </div>
                </div>



                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Release Date</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                      $config = require('../config.php');
                      $db = new Database($config['database']);
                      $note = $db->query("SELECT p.id,p.name,p.price,p.releaseDate,p.image,p.quantity,b.name as brandName,c.name as categoryName  FROM brand b, category c, product p WHERE p.brand_Id=b.id AND p.category_Id=c.id;")->get();
                      $i = 0;
                      while (true) {
                        if (!isset($note[$i])) {
                          break;
                        }
                      ?>

                        <tr>
                          <td class="align-middle text-center"><?= $note[$i]['id'] ?></td>
                          <td class="align-middle text-center"><?= $note[$i]['name'] ?></td>
                          <td class="align-middle text-center"><?= $note[$i]['price'] ?></td>
                          <td class="align-middle text-center"><?= $note[$i]['releaseDate'] ?></td>
                          <td class="align-middle text-center"><img src="<?php print "../".$note[$i]['image'] ?>" class="img-fluid w-100 rounded-top" style="width:100px;
                         height:100px;" alt=""></td>
                          <td class="align-middle text-center"><?= $note[$i]['quantity'] ?></td>
                          <td class="align-middle text-center"><?= $note[$i]['brandName'] ?></td>
                          <td class="align-middle text-center"><?= $note[$i]['categoryName'] ?></td>
                          <td class="align-middle text-center">


                            <form action="/admin/insertDetail" method="POST">
                              
                              <input type="hidden" name="id" value="<?= $note[$i]['id'] ?>">
                              <button type="submit" class="btn btn-primary text-light mx-auto mt-4 mb-2">Edit</button>
                           </form>
                              <form action="/admin/insert" method="POST">
                                <input type="hidden" name="method" value="delete">
                                <input type="hidden" name="id" value="<?= $note[$i]['id'] ?>">
                                <button class="btn btn-danger text-light mx-auto mt-4 mb-2">Delete</button>
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