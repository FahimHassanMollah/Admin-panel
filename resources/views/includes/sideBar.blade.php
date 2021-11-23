 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ route('dashboard') }}" class="waves-effect">
                         <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                         <span>Dashboards</span>
                     </a>

                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bx-layout"></i>
                         <span>Settings</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="layouts-horizontal.html">Horizontal</a></li>
                         <li><a href="layouts-light-sidebar.html">Light Sidebar</a></li>
                         <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                         <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                         <li><a href="layouts-boxed.html">Boxed Width</a></li>
                         <li><a href="layouts-preloader.html">Preloader</a></li>
                         <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                     </ul>
                 </li>



                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bx-store"></i>
                         <span>Product Settings</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('category.index') }}">Manage Category</a></li>
                         <li><a href="{{ route('sub-category.index') }}">Manage Sub Category</a></li>
                         <li><a href="ecommerce-product-detail.html">Manage Brand</a></li>
                         <li><a href="ecommerce-product-detail.html">Manage Size</a></li>
                         <li><a href="ecommerce-product-detail.html">Manage Color</a></li>
                         <li><a href="ecommerce-product-detail.html">Manage Unit</a></li>

                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bx-bitcoin"></i>
                         <span>Product Manager</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="crypto-wallet.html">Add</a></li>
                         <li><a href="crypto-buy-sell.html">Manage Products</a></li>

                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bx-envelope"></i>
                         <span>Supplier</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="email-inbox.html">Manage Supplier</a></li>
                         <li><a href="email-read.html">Manage Supplier Payment</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bx-receipt"></i>
                         <span>Inventory</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="invoices-list.html">New Inventory</a></li>
                         <li><a href="invoices-detail.html">Manage Inventory</a></li>
                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bx-receipt"></i>
                         <span>Order</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="invoices-list.html">Manage Order</a></li>

                     </ul>
                 </li>





             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End -->
