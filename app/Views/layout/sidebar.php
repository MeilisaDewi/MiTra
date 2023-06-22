<div id="layoutSidenav">
    
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="/">
                                <div class="sb-nav-link-icon text-primary"><i class="fas fa-home"style="font-size:24px;"></i></div>
                                Home 
                            </a> 

                            <?php if(has_permission('users')):?>
                              <a class="nav-link" href="/users">
                              <div class ="sb-nav-link-icon text-primary"><i class ="fas fa-fingerprint"style="font-size:24px;"></i></div>
                              User
                              </a>
                                             
                            </a>
                            <?php endif; ?> 
                         
                            <a class="nav-link" href="/logout">
                                <div class="sb-nav-link-icon text-primary"><i class="fas fa-exclamation-triangle"style="font-size:24px;"></i></div>
                                Log Out
                            </a> 
                            </div>

                </nav>
                
            </div>
