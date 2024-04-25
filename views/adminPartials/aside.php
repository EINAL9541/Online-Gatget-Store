<aside class="main-sidebar sidebar-dark-primary elevation-4">
       
       <nav class="mt-2">
        
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="/admin/dashbord" class="nav-link <?php if($page =="admin")
                 { echo "active";}
                  ?>">
                 
                   <p>Dashboard</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/admin/productTable" class="nav-link <?php if($page =="product")
                 { echo "active";}
                  ?>">
                 
                   <p>Product Table</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/admin/productBrand" class="nav-link <?php if($page =="productBrand")
                 { echo "active";}
                  ?>">
                 
                   <p>Brand</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="/admin/productCategory" class="nav-link <?php if($page =="productCategory")
                 { echo "active";}
                  ?>">
                 
                   <p>Category</p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="/admin/orderTable" class="nav-link <?php if($page =="orderTable")
                 { echo "active";}
                  ?>">
                 
                   <p>Order</p>
                 </a>
               </li>
             </ul>
         
        
       </nav>
       <!-- /.sidebar-menu -->
   
     <!-- /.sidebar -->
   </aside>