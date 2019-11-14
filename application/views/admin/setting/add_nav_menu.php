    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <?php

       $show_mess = $this->session->flashdata('message');

    ?>

    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> Category</h4>

    <!-- Page container -->

    <div class="page-container" id="add_customer">



        <!-- Page content -->

        <div class="page-content">



            <!-- Main content -->

            <div class="content-wrapper">



                <!-- Vertical form options -->

                <div class="row">



                    <div class="col-md-6">



                        <!-- Basic layout-->

                        <form action="<?=base_url('set-root-category')?>" method="post">

                            <div class="panel panel-flat">

                                <div class="panel-heading">

                                    <h5 class="panel-title">Add Parent Category </h5>

                                    <?php

                                        if( !empty($show_mess) ):

                                            if( $show_mess['status'] == '1' ):

                                                echo Alert::success($show_mess['text']);

                                            elseif( $show_mess['status'] == '0' ):

                                                echo Alert::danger($show_mess['text']);

                                            endif;

                                        endif;

                                    ?>

                                </div>



                                <div class="panel-body">



                                    <div class="form-group">

                                        <label>Category Name: *</label>

                                        <?=form_error('category_name');?>

                                        <input type="text" class="form-control" placeholder="Category Name" name="category_name" value="<?=set_value('category_name');?>">

                                    </div>



                                    <div class="form-group">

                                        <label>Parent Category:</label>

                                        <select class="form-control" name="parent_category">

                                            <option value="">Select Parent Category</option>

                                            <?php

                                                if( !empty($get_parent_cates) ):

                                                    foreach ($get_parent_cates as $get_parent_cate):

                                                        echo '<option value="'.$get_parent_cate->id.'">'.$get_parent_cate->name.'</option>';

                                                    endforeach;

                                                endif;

                                            ?>

                                        </select>

                                    </div>



                                    <div class="form-group">

                                        <label>Category Position: *</label>

                                        <?=form_error('category_position');?>

                                        <select class="form-control" name="category_position">

                                            <option value="1" <?=set_select('category_position', 1);?>>Top Menu Bar</option>

                                            <option value="2" <?=set_select('category_position', 2);?>>Side Menu Bar</option>

                                        </select>

                                    </div>



                                     <div class="form-group">

                                        <label>Meta Keyword: </label>

                                        <input type="text" class="form-control format-phone-number" name="meta_keyword" placeholder="Meta Keyword" id="meta_keyword" value="<?=set_value('meta_keyword');?>">

                                    </div>  

                                    <div class="form-group">

                                        <label>Meta Description:</label>

                                        <input type="text" class="form-control format-phone-number" name="meta_description" placeholder="Meta Description" id="meta_description" value="<?=set_value('meta_description');?>">

                                    </div>  



                                    <div class="form-group">

                                    <label>category icon</label>

                                    <input type="text" class="form-control" placeholder="Category Icon" name="category_icon" value="<?=set_value('category_icon');?>">

                                    </div>


                                    <div class="text-right">

                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>

                                    </div>



                                </div>

                            </div>

                        </form>

                        <!-- /basic layout -->



                    </div>



                </div>

                <!-- /vertical form options -->



                <div class="row panel panel-flat">



                    <div class="panel-heading">



                        <div class="row">

            

                            <div class="col-md-6">



                                <form action="<?=base_url('add-product-category');?>" method="post">



                                    <ul class="list-unstyled list-inline">

                                        <li style="width: 30%">

                                            <input type="text" name="category_name" class="form-control" placeholder="Name" value="<?=$category_name?>">

                                        </li>

                                        <li><input type="submit" name="submit" id="submit" class="btn btn-success" value="Search"></li>

                                    </ul>



                                </form>

                                    

                            </div>



                        </div>



                        <table class="table table-bordered">

                            <thead>

                                <tr>

                                    <th>#SL</th>

                                    <th>Name</th>

                                    <th>Slug</th>

                                    <th>Category Status</th>

                                    <th>Category position</th>

                                    <th>Status</th>

                                    <th>Date</th>

                                    <th>Actions</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                    if( !empty($get_categorys) ):

                                        $count = ( 1 + $this->uri->segment(2) );

                                        foreach( $get_categorys as $get_cust_category ):



                                            $status     = "";



                                            if( $get_cust_category->status == 1 ):

                                                $status = '<span class="label label-success">Active</span>';

                                            elseif( $get_cust_category->status == 0 ):

                                                $status = '<span class="label label-danger">Inactive</span>';

                                            endif;



                                            if( $get_cust_category->status == 1 ):

                                                $status_value = 0;

                                            elseif( $get_cust_category->status == 0 ):

                                                $status_value = 1;

                                            endif;



                                            $page_num   = 0;

                                            $url        = base_url('add-nav-menu');

                                            if( $this->uri->segment(2) !="" ):

                                                $url        = base_url('add-nav-menu/'.$this->uri->segment(2));

                                                $page_num   = $this->uri->segment(2);

                                            endif;



                                            if( $get_cust_category->cat_parent_id == 0 ):

                                                $cat_status = '<span class="label label-success">Parent</span>';

                                            elseif( $get_cust_category->cat_parent_id > 0 ):    

                                                $cat_status = '<span class="label label-success">'.common::getSpecificInfoNav([ 'id' => $get_cust_category->cat_parent_id  ]).'</span>&nbsp<span class="label label-danger">'.common::getSpecificInfoNav([ 'id' => $get_cust_category->id  ]).'</span>&nbsp<span class="label label-success">Child</span>';

                                            endif;



                                            if( $get_cust_category->is_position == '1' ):

                                                $is_position = '<span class="label label-success">Top Nav Bar</span>';

                                            elseif( $get_cust_category->is_position == '2' ):

                                                $is_position = '<span class="label label-success">Side Nav Bar</span>';

                                            endif;



                                            ?>

                                            <tr>

                                                <td><?=$count;?></td>    

                                                <td><?=$get_cust_category->name;?></td>    

                                                <td><?=$get_cust_category->slug;?></td>    

                                                <td><?=$cat_status;?></td>    

                                                <td><?=$is_position;?></td>    

                                                <td><?=$status;?></td>  

                                                <td><?=$get_cust_category->created_at;?></td>  

                                                <td>

                                                    <ul class="icons-list">

                                                        <li class="dropdown">

                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                                                <i class="icon-menu9"></i>

                                                            </a>



                                                            <ul class="dropdown-menu dropdown-menu-right">

                                                                <li><a href="javascript:void(0)" onclick="editData(<?=$get_cust_category->id.",'".$get_cust_category->name."','".$get_cust_category->is_position."','".$get_cust_category->cat_icon."','".$get_cust_category->cat_parent_id."','".$url."','".$get_cust_category->meta_keyword."','".$get_cust_category->meta_description."'"?>);"><i class="icon-pencil7"></i> Edit</a></li>

                                                                <li><a href="javascript:void(0)" onclick="changeStatus(<?=$get_cust_category->id.",".$status_value.",".$page_num;?>)"><i class=" icon-file-check"></i> Change Status</a></li>

                                                                <li><a href="javascript:void(0)" onclick="deleteNav(<?=$get_cust_category->id.",".$page_num;?>)"><i class="far fa-trash-alt"></i> Delete</a></li>

                                                            </ul>

                                                        </li>

                                                    </ul>

                                                </td>

                                            </tr>  

                                            <?php

                                            $count++;

                                        endforeach;

                                    else:

                                        echo "<tr><td colspan='6'>No Data Found!.</td></tr>";

                                    endif;

                                ?>

                            </tbody>

                        </table>



                        <div class="data-table-toolbar pagination-top">

                            <ul class="pagination">

                                <?php

                                if( !empty($links) ):

                                    foreach( $links as $link ):

                                        echo "<li>". $link."</li>";

                                    endforeach;

                                endif;

                                ?>

                            </ul>

                        </div>



                    </div>

                        

                </div>



            </div>

            <!-- /main content -->



        </div>

        <!-- /page content -->



    </div>

    <!-- /page container -->





    <!-- Begin: Modal 3 -->

    <div id="myLiveNote" class="modal fade" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title" id="modal_caption"></h4>

                </div>

                <div class="modal-body">

                    <div>

                        <div id="live_note">

                            <span id="error_message"></span>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </div>



        </div>

    </div>

    <!-- End:Modal 3 -->



    <script type="text/javascript">



        var base_url = '<?=base_url()?>';

        function editData( id, name, is_position, cat_icon, cat_parent_id, url,meta_keyword,meta_description ){



            var parent_cat  = '<?=$get_parent_cates_j;?>';

                parent_cat  = JSON.parse(parent_cat);

            var root_p      = '';

            var child       = '';

            var action      = '<?=base_url('update-cat-details');?>';

            var updateHTML  = '';



                if( is_position == '1' ){

                    root_p = 'selected';                          

                }else if( is_position == '2' ){

                    child  = 'selected';

                }



                updateHTML +=   '<form action="' + action + '" method="post" onsubmit="return checkEditData();">' +

                                    '<div class="form-group">' +

                                        '<label for="usr">Category Name: *</label>' +

                                        '<input type="text" name="cat_name" id="cat_name" class="form-control" value="' + name + '">' +

                                    '</div>';

                       updateHTML +='<div class="form-group">'+

                                        '<label>Parent Category:</label>'+

                                        '<select class="form-control" name="parent_category">'+

                                            '<option value="">Select Parent Category</option>';

                                        

                                            for ( var i = 0; i < parent_cat.length; i++) {



                                                if( cat_parent_id == parent_cat[i].id ){

                                                    updateHTML +='<option value="'+parent_cat[i].id+'" selected>'+parent_cat[i].name+'</option>';

                                                }else{

                                                    updateHTML +='<option value="'+parent_cat[i].id+'">'+parent_cat[i].name+'</option>';

                                                }

                                            }    



                          updateHTML +='</select>'+

                                    '</div>';

                       updateHTML +='<div class="form-group">' +

                                        '<label for="usr">Category Position: *</label>' +

                                        '<select name="category_position" class="form-control">'+

                                            '<option value="1" '+root_p+'>Top Menu Bar</option>'+

                                            '<option value="2" '+child+' >Side Menu Bar</option>'+

                                        '</select>'+

                                    '</div>';

                       updateHTML +='<div class="form-group">' +

                                        '<label for="usr">Category icon: </label>' +

                                        '<input type="text" name="cat_icon" id="cat_icon" class="form-control" value="' + cat_icon + '">' +

                                    '</div>';



                        updateHTML +='<div class="form-group">' +

                                                        '<label>Meta Keyword: </label>' +

                                                        '<input type="text" class="form-control format-phone-number" name="meta_keyword" placeholder="Meta Keyword" id="meta_keyword" value="'+meta_keyword+'">'+

                                                    '</div>';  

                        updateHTML +='<div class="form-group">' +

                                            '<label>Meta Description:</label>' +

                                            '<input type="text" class="form-control format-phone-number" name="meta_description" placeholder="Meta Description" id="meta_description" value="'+meta_description+'">'+

                                        '</div>' ;  

                       updateHTML +='<input type="hidden" name="cat_id" value="' + id + '">' +

                                    '<input type="hidden" name="url" value="' + url + '">' +

                                    '<input type="submit" name="submit" id="submit" value="submit" class="btn btn-success">' +

                                '</form>';



            $('#live_note').html(updateHTML);

            $('#modal_caption').html('Update Data');

            $('#myLiveNote').modal('show');



        }



        function checkEditData(){

            

            var name = $("#cat_name").val();



            if( name == "" ){

                $('#cat_name').css("border", "1px solid red");

                return false;

            }else{

                return true;

            }



        }



        function changeStatus( id, status, page_num ){



          bootbox.confirm({

            message: "Do you want to change status?",

            buttons: {

                confirm: {

                    label: 'Yes',

                    className: 'btn-success'

                },

                cancel: {

                    label: 'No',

                    className: 'btn-danger'

                }

            },

            callback: function (result) {

                if( result == true ){

                    window.location = base_url + 'update-cat-status/' + id + '/' + status+ '/' + page_num;

                }

            }

        });



        }



        function deleteNav( id,  page_num ){



            bootbox.confirm({

                message: "Do you want to delete product?",

                buttons: {

                    confirm: {

                        label: 'Yes',

                        className: 'btn-success'

                    },

                    cancel: {

                        label: 'No',

                        className: 'btn-danger'

                    }

                },

                callback: function (result) {

                    if( result == true ){

                        window.location = base_url + 'delete-nav/' + id + '/' + page_num;

                    }

                }

            });



        } 



    </script>



<style type="text/css">

#add_customer .form-group > p {

    color: #ff0000;

}

</style>





