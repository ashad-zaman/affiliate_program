
                <?php

                $box_long_horizontal=array_merge($get_horizontal_long_banner,$get_box_banners);
                shuffle($box_long_horizontal);
                    if($box_long_horizontal)
                    {
                      $boxbanner1="";
                      $boxbanner2="";
                      $boxbanner3="";
                      $boxbanner4="";
                      $numberofads=1;
                      
                      foreach($box_long_horizontal as $key=>$horizontal_long_banner)
                      {
                        if(isset($product_name))
                        {
                          if($key>2)
                            break;
                        }else
                        {
                          if(count($get_product_lists)>0)
                          {
                            $numberofads=intval(count($get_product_lists)/4);
                            if(count($get_product_lists)>0&&count($get_product_lists)<4)
                            $numberofads=1;
                          }
                          if($key==$numberofads)
                              break;  
                        }

                       
                        ?>
                        <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
             
             <div class="sidebar-widget-body outer-top-xs">
               <div class="tag-list"> 
               
                   <?=$horizontal_long_banner->banner_description;?>
                </div>
                <!-- /.tag-list --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 

              <?php
                              

                        
                  }
                      
              }
                    
             ?>