
<?php
require('../views/adminPartials/bander.php');
require('../views/adminPartials/navbar.php');
require('../views/adminPartials/content_wrapper.php');
require('../views/adminPartials/aside.php');
$config = require('../config.php');
$db = new Database($config['database']);
?>


    <!-- Navbar -->

    <!-- Content Wrapper. Contains page content -->
  
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
          <?php 
            $cart = $db->query("select count(id) from product")->find();
            ?>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid  fa-product-hunt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Product</span>
                  <span class="info-box-number">
                    <?= $cart["count(id)"]?>
                    
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <?php 
                $today =  date('y/m/d');
                $soldout = $db->query("select sum(quantity) from orderitem, userorder where orderitem.userorder_Id=userorder.id AND userorder.status=1 AND userorder.orderDate=:date",['date' =>$today])->find();
                
                ?>
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-outdent"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Sold out</span>
                  <span class="info-box-number"><?= $soldout["sum(quantity)"]?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <?php 
            $sale = $db->query("select sum(total) from orderitem, userorder where orderitem.userorder_Id=userorder.id AND userorder.status=1 AND userorder.orderDate=:date",['date' =>$today])->find();
            ?>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Net Sales</span>
                  <span class="info-box-number">$<?= $sale["sum(total)"]?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <?php 
            $user = $db->query("select count(id) from user where isAdmin=0")->find();
            ?>
                <div class="info-box-content">
                  <span class="info-box-text">Customers</span>
                  <span class="info-box-number"><?= $user["count(id)"]?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">






              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->


              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Orders</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $orderId = $db->query('select * from userorder')->get();
                        for($i=0; $i<7; $i++)
                        { 
                            if(!isset($orderId[$i]))
                            {
                                break;
                            }
                        $item = $db->query("select p.name as name from orderitem ot,product p where ot.userorder_Id=:userorder_Id AND ot.product_Id=p.id",['userorder_Id'=>$orderId[$i]['id']])->get();
                        ?>
                        <tr>

                          <td><a href="pages/examples/invoice.html"></a><?= $orderId[$i]['id']?></td>
                          <td><?php 
                          $j=0;
                          while(true)
                          {
                            
                            echo $item[$j]['name'] ." ";

                            $j++;
                            if(!isset($item[$j]))
                            {
                                break;
                            }
                            echo "/";
                          }
                          ?>
                          </td>

                          
                          <td><?php if($orderId[$i]['status'] == 0)
                          {
                            ?>
                            <span class="badge badge-success">Pending</span> 
                            <?php
                          }else
                          {
                            ?>
                            <span class="badge badge-warning">Delievered</span> 
                            <?php
                          } ?></td>
                           
                          
                        </tr>
                        <?php
                        }?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="/orderTable" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->

              <!-- /.info-box -->

              <!-- PRODUCT LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Added Products</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">

                  <?php
                  $latest = $db->query("select * from product order by id desc")->get();
                  
                  for($i=0; $i<4; $i++)
    { 
        if(!isset($latest[$i]))
        {
            break;
        }
    ?>

                    <li class="item">
                      <div class="product-img">
                        <img src="<?php print "../".$latest[$i]['image']?>" alt="Product Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"><?= $latest[$i]['name']?>
                          <span class="badge badge-warning float-right">$<?= $latest[$i]['price']?></span></a>
                        <span class="product-description">
                        <?= $latest[$i]['review']?>
                        </span>
                      </div>
                    </li>


                    <?php 
    }
                    ?>
                   
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="/productTable" class="uppercase">View All Products</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>