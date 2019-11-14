    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <?php
       $show_mess = $this->session->flashdata('message');
    ?>
    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> banner</h4>
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
                        <form action="<?=base_url('add-banner')?>" method="post">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Add banner </h5>
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
                                        <label>Banner Title: *</label>
                                        <?=form_error('banner_title');?>
                                        <input type="text" class="form-control" placeholder="Banner Title" name="banner_title" value="<?=set_value('banner_title');?>">
                                    </div>
                                    <div class="form-group">
                                                <label>Banner Type: </label>
                                                <select name="type" class="form-control format-phone-number" id="type">
                                                    <option value="">Select Type</option>
                                                    <option value="1"><?=set_select('type', 1); ?>Box</option>
                                                    <option value="2"><?=set_select('type', 2); ?>Long vertical</option>
                                                    <option value="3"><?=set_select('type', 3); ?>Long Horizontal</option>
                                                </select>
                                            </div>
                                    <div class="form-group">
                                                <label>Parent Category : *</label>
                                                <?=form_error('parent_cat_id');?>
                                                <select name="parent_cat_id" id="parent_cat_id" class="form-control " onchange="parentCategory(this.value)">
                                                    <option value="">Select Category</option>
                                                    <?php
                                                        if(!empty($get_parent_cates)):
                                                            foreach ($get_parent_cates as $get_category):
                                                                echo '<option value="'.$get_category->id.'">'.set_select('parent_cat_id', $get_category->id).ucwords($get_category->name).'</option>';
                                                            endforeach;
                                                        endif;
                                                    ?>
                                                </select>
                                            </div>

                                        
                                        <div class="form-group">
                                                <label>Sub Category : </label>
                                                <select name="sub_category" class="form-control format-phone-number" id="sub_category">
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
    
                                    <div class="form-group">
                                        <label>Description: *</label>
                                        <?=form_error('description');?>
                                        <textarea name="description" id="description" class="form-control "><?=set_value('description');?></textarea>
                                      
                                    </div>

                                    <div class="form-group">
                                        <label>Tag</label>
                                        <input type="text" class="form-control" placeholder="Tag" name="tag" value="<?=set_value('tag');?>">
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
                                <form action="<?=base_url('add-banner');?>" method="post">
                                    <ul class="list-unstyled list-inline">
                                        <li style="width: 30%">
                                            <input type="text" name="category_name" class="form-control" placeholder="Name" value="<?=$banner_title?>">
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
                                    <th>Banner Title</th>
                                    <th>Details</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if( !empty($get_banners) ):
                                        
                                        $count = ( 1 + $this->uri->segment(2) );
                                        foreach( $get_banners as $get_menu ):

                                            $status   = "";
                                            $status_value=0;
                                            $type     = "";
                                            if( $get_menu->status == 1 ):
                                                $status = '<span class="label label-success">Active</span>';
                                            elseif( $get_menu->status == 0 ):
                                                $status = '<span class="label label-danger">Inactive</span>';
                                            endif;

                                            if($get_menu->type == 1 ):
                                                $type = 'Box';
                                            elseif( $get_menu->type == 2 ):
                                                $type = 'Long Vertical';
                                            elseif( $get_menu->type == 3 ):
                                                $type = 'Long Horizontal';
                                            endif;

                                            


                                            if( $get_menu->status == 1 ):
                                                $status_value = 0;
                                            elseif( $get_menu->status == 0 ):
                                                $status_value = 1;
                                            endif;

                                            $page_num   = 0;
                                            $url        = base_url('add-banner');
                                            if( $this->uri->segment(2) !="" ):
                                                $url        = base_url('add-banner/'.$this->uri->segment(2));
                                                $page_num   = $this->uri->segment(2);
                                            endif;

                                            ?>
                                            <tr>
                                                <td><?=$count;?></td>    
                                                <td><?=$get_menu->banner_title;?></td>    
                                                <td><?=$get_menu->banner_description;?></td> 
                                                <td><?=$type;?></td>  
                                                <td><?=$status;?></td>
                                                   
                                                <td><?=$get_menu->created_at;?></td>  
                                                <td>
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="<?=base_url('edit-banner/'.$get_menu->id);?>"><i class="icon-pencil7"></i> Edit</a></li>
                                                                <li><a href="javascript:void(0)" onclick="changeStatus(<?=$get_menu->id.",".$status_value.",".$page_num;?>)"><i class=" icon-file-check"></i> Change Status</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>  
                                            <?php
                                            $count++;
                                        endforeach;
                                    else:
                                        echo "<tr><td colspan='6' style='text-align:center;'>No Data Found!.</td></tr>";
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
        function editData( id, menu_name, slug, description, menu_icon ){

           
            var root_p      = '';
            var child       = '';
            var action      = '<?=base_url('update-menu-details');?>';
            var updateHTML  = '';

                updateHTML +=   '<form action="' + action + '" method="post" onsubmit="return checkEditData();">' +
                                    '<div class="panel-heading">'+
                                        '<h5 class="panel-title">Edit Menu </h5>'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                        '<label for="usr">Menu Name: *</label>' +
                                        '<input type="text" name="menu_name" id="menu_name" class="form-control" value="' + menu_name + '"  onkeyup="getSlug(this.value);">' +
                                    '</div>';
                       
                     updateHTML +='<div class="form-group">' +
                                        '<label for="usr">Menu Slug: </label>' +
                                        '<input type="text" name="slug" id="slug" class="form-control" value="' + slug + '">' +
                                    '</div>';

                    updateHTML +='<div class="form-group">' +
                                        '<label for="usr">Description: </label>' +
                                        '<input type="text" name="description" id="description" class="form-control" value="' + description + '">' +
                                    '</div>';

                    updateHTML +='<div class="form-group">' +
                                        '<label for="usr">menu icon: </label>' +
                                        '<input type="text" name="menu_icon" id="menu_icon" class="form-control" value="' + menu_icon + '">' +
                                    '</div>';


                       updateHTML +='<input type="hidden" name="menu_id" value="' + id + '">' +
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
                    window.location = base_url + 'update-banner-status/' + id + '/' + status+ '/' + page_num;
                }
            }
        });

        }
        function parentCategory(id){

            var QuHTML      = '';
            var parent_id   = id;
            var dataString  = { parent_id : parent_id };

            jQuery.ajax({
                type: 'POST',
                url: base_url + "get-has-category",
                data: dataString,  //data
                dataType: "json",
                async: false,
                success: function(data)
                {

                    QuHTML +='<option value="">Select Sub Category</option>';

                    if( data != null ){
                        for( i = 0; i < Object.keys(data).length; i++ ){
                        QuHTML +='<option value="' + data[i].id + '">' + data[i].name + '</option>';
                        }
                    }else{
                        QuHTML += '';
                    }
                        
                    $('#sub_category').html(QuHTML);

                }
            });
            }
        function getSlug(slug){

                var slug        = slug;
                var dataString  = { slug : slug };
                jQuery.ajax({
                    type: 'POST',
                    url: base_url + "get-slug-create",
                    data: dataString,  //data
                    dataType: "json",
                    async: false,
                    success: function(data)
                    {

                        $('#slug').val(data);

                    }
                });

                }
    </script>

<style type="text/css">
#add_customer .form-group > p {
    color: #ff0000;
}
</style>


