
 <!-- Search Modal Start-->

 <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-none d-block d-sm-none">    
            <!-- Container wrapper -->
            <div class="container px-lg-0 custom-create">
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse  search-modal-box" id="searchcontent">
                  <!-- Left links -->
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto search-modal-box-ul">
                                <li class="">
                                <div class="d-flex">
                                <div class="search-modal-input-conatiner">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                 <input class="search-input-modall" type="text" placeholder="Search For Global Products">
                             </div>
                        <div class="close-icon-box">
                        <button class="navbar-toggler ps-0 pt-0 close-icon-btn" type="button" data-mdb-toggle="collapse" data-mdb-target="#searchcontent"
                        aria-controls="searchcontent" aria-expanded="false" aria-label="Toggle navigation"  >
                     <div id="nav-icon2">
                      <i class="fa fa-times" aria-hidden="true" style="color:#92999dfa"></i>
                </div>
               </button>
               </div>
             </div>
            </li>
           </ul>   
           <div class="search-tag-main-conatiner">
               <div class="search-tags-box ">
                <p>Popular Searches</p>
                <a href="{{ url('/category/featured') }}" class="search-tags-buttons">Featured Products</a>
                <a href="{{ url('/category/trending') }}" class="search-tags-buttons">Trending Products</a>
                <a href="{{ url('/category/bestseller') }}" class="search-tags-buttons">Best Seller</a>
                <a href="{{ url('/product-category/accessories') }}" class="search-tags-buttons">Accessories</a>
                <a href="{{ url('/product-category/decor') }}" class="search-tags-buttons">Decor</a>
                <a href="{{ url('/product-category/tabletop-bar') }}" class="search-tags-buttons">Tabletop Bar</a>
                </div>
             </div>
             <div class="container get-searchpds87 search-list-section">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto input-searchrs">
                
            </ul>
             </div>
            </div>
            </div>
          
       
         </nav>

  <!-- Search Modal End-->