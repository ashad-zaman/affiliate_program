<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/pickers/daterangepicker.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/pickers/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/pickers/pickadate/picker.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/plugins/pickers/pickadate/picker.date.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/pages/picker_date.js');?>"></script>


<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Product</span> List</h4>

<!-- Input formatter -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Product List</h5>
    </div>

    <div class="panel-body">

        <div class="row">
            
            <div class="col-md-12">

                <form action="<?=base_url('product-list');?>" method="post">

                    <ul class="list-unstyled list-inline">
                        <li><input type="text" name="title" value="<?=$title;?>" class="form-control" placeholder="Title"></li>
                        <li><input type="text" name="slug" value="<?=$slug;?>" class="form-control" placeholder="Slug"></li>
                        <li><input type="text" name="product_url" value="<?=$product_url;?>" class="form-control" placeholder="Product url"></li>
                        <li>
                            <select name="product_cate" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                    if(!empty($get_categorys)):
                                        foreach ($get_categorys as $get_category):
                                            if( $parent_cat_id == $get_category->id ):
                                                echo '<option value="'.$get_category->id.'" selected>'.$get_category->name.'</option>';
                                            else:
                                                echo '<option value="'.$get_category->id.'">'.$get_category->name.'</option>';
                                            endif;
                                        endforeach;
                                    endif;
                                ?>
                            </select>
                        </li>
                        <li>
                            <select name="store" class="form-control">
                                <option value="">Select Store</option>
                                <option value="1" <?=$is_store == '1' ? 'selected' : '';?>>Amazon</option>
                                <option value="2" <?=$is_store == '2' ? 'selected' : '';?>>ebay</option>
                                <option value="3" <?=$is_store == '3' ? 'selected' : '';?>>Ali baba</option>
                                <option value="4" <?=$is_store == '4' ? 'selected' : '';?>>Ali express</option>
                            </select>
                        </li>
                        <li>
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1" <?=$status == '1' ? 'selected' : '';?>>ACTIVE</option>
                                <option value="0" <?=$status == '0' ? 'selected' : '';?>>INACTIVE</option>
                            </select>
                        </li>
                        <li><input type="text" name="date" value="" class="form-control pickadate-selectors" placeholder="Date"></li>
                        <li><input type="submit" name="submit" id="submit" class="btn btn-success" value="Search"></li>
                    </ul>

                </form>
                    
            </div>

        </div>

        <div class="row">
        
            <div class="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Store</th>
                            <th>Proudct url</th>
                            <th>Image</th>
                            <th>Product Category</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            if( !empty($get_product_lists) ):
                                $count = ( 1 + $this->uri->segment(2) );
                                foreach($get_product_lists as $get_product_list):

                                    $status_value   = 1;
                                    $status         = '<span class="label label-danger">Inactive</span>';
                                    if( $get_product_list->status == 1 ):
                                        $status = '<span class="label label-success">Active</span>';
                                        $status_value = 0;
                                    endif;

                                    $page_num   = 0;
                                    if( $this->uri->segment(2) !="" ):
                                        $page_num = $this->uri->segment(2);
                                    endif;

                                    $image_url = "";
                                    if( $get_product_list->image_url !="" ):
                                        $image_url = '<img src="'.$get_product_list->image_url.'" width="60" heigh="60"/>';
                                    endif;

                                    $product_url = '';
                                    if( $get_product_list->product_url !="" ):
                                        $product_url = '<a href="'.$get_product_list->product_url.'" target="_blank">link</a>';
                                    endif;

                                    $is_store = '';
                                    if( $get_product_list->is_store == 1 ):
                                        $is_store = '<i class="fab fa-amazon"></i>';
                                    elseif( $get_product_list->is_store == 2 ):
                                        $is_store = '<i class="fab fa-ebay"></i>';
                                    elseif( $get_product_list->is_store == 3 ):
                                        $is_store = 'ali baba';
                                    elseif( $get_product_list->is_store == 4 ):
                                        $is_store = 'ali express';
                                    endif;

                                    $cat_status = "";
                                    if( $get_product_list->parent_cat_id !="" && $get_product_list->child_cat_id == 0 ):
                                        $cat_status = '<span class="label label-success">'.common::getSpecificInfoNav([ 'id' => $get_product_list->parent_cat_id  ]).'</span>';
                                    elseif( $get_product_list->parent_cat_id !="" &&  $get_product_list->child_cat_id !=0 ):    
                                        $cat_status = '<span class="label label-success">'.common::getSpecificInfoNav([ 'id' => $get_product_list->parent_cat_id  ]).'</span>&nbsp<span class="label label-danger">'.common::getSpecificInfoNav([ 'id' => $get_product_list->child_cat_id  ]).'</span>&nbsp<span class="label label-success">Child</span>';
                                    endif;

                                ?>
                                <tr>
                                    <td><?=$count;?></td>
                                    <td><?=$get_product_list->title;?></td>
                                    <td><?=$get_product_list->slug;?></td>
                                    <td><?=$get_product_list->price;?></td>
                                    <td><?=$is_store;?></td>
                                    <td><?=$product_url;?></td>
                                    <td><?=$image_url;?></td>
                                    <td><?=$cat_status;?></td>
                                    <td><?=$status;?></td>
                                    <td><?=$get_product_list->created_at;?></td>
                                    <td class="table-open-dropdown">
                                      
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="javascript:void(0)" onclick="getDetails(<?=$get_product_list->id;?>);"><i class="icon-file-text2"></i> Details</a></li>
                                                    <li><a href="<?=base_url('edit-product/'.$get_product_list->id);?>"><i class="icon-pencil7"></i> Edit</a></li>
                                                    <li><a href="javascript:void(0)" onclick="changeStatus(<?=$get_product_list->id.",".$status_value.",".$page_num;?>)"><i class="icon-file-check"></i> Change Status</a></li>

                                                    <li><a href="javascript:void(0)" onclick="productDelete(<?=$get_product_list->id.",".$page_num;?>)"><i class="far fa-trash-alt"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>

                                    </td>
                                </tr>
                                <?php
                                    $count++;
                                endforeach;
                            endif;
                        ?>
                    </tbody>
                </table>

                <div class="data-table-toolbar pagination-top">
                    <ul class="pagination">
                        <?php
                        foreach ( $links as $link ):
                            echo "<li>". $link."</li>";
                        endforeach;
                        ?>
                    </ul>
                </div>

            </div>
                
        </div>
    </div>
</div>
<!-- /input formatter -->

<style type="text/css">
    #add_customer .form-group > p {
        color: #ff0000;
    }
</style>


<script>

    var base_url = '<?=base_url()?>';
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
                    window.location = base_url + 'update-product-status/' + id + '/' + status + '/' + page_num;
                }
            }
        });

    }

    function getDetails( id ){

        var detailHTML  = '';
        var dataString  = { id : id };

        jQuery.ajax({
            type: 'POST',
            url: base_url + "get-product-details",
            data: dataString,  //data
            dataType: "json",
            async: false,
            success: function(data)
            {

                console.log(data);
                var product_url = '';
                if( data.product_url !="" ){
                    product_url = '<a href="'+data.product_url+'" target="_blank">link</a>';
                }

                var image_url = '';
                if( data.image_url !="" ){
                    image_url = '<img src="'+data.image_url+'" width="60" heigh="60"/>';
                }

                var is_store = '';
                if( data.is_store == 1 ){
                    is_store = '<i class="fab fa-amazon"></i>';
                }else if( data.is_store == 2 ){
                    is_store = '<i class="fab fa-ebay"></i>';
                }else if( data.is_store == 3 ){
                    is_store = 'ali baba';
                }else if( data.is_store == 4 ){
                    is_store = 'ali express';
                }

                var status       = '<span class="label label-danger">Inactive</span>';
                if( data.status == 1 ){
                    status = '<span class="label label-success">Active</span>';
                }

                detailHTML +='<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">ID</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.id+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Title</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.title+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Slug</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.slug+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Price</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.price+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Dis. Price</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.discount_price+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Percentage</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.discount_percentage+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Product url</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+product_url+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Image</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+image_url+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Store</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+is_store+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Status</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+status+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Description</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.description+'</label>'+
                                '</div>'+
                              '</div>'+
                              '<div class="form-group custom-group clearfix">'+
                                '<label class="control-label col-sm-2 details-modal-box">Created at</label>'+
                                '<div class="col-sm-10">'+
                                  '<label class="form-control custome-form"> : '+data.created_at+'</label>'+
                                '</div>'+
                              '</div>';

                $('#myCommonTitle').html('Product Details');
                $('#myCommonBody').html(detailHTML);
                $('#myCommonModal').modal('show');
            }
        });

        }

        
    function productDelete( id,  page_num ){

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
                    window.location = base_url + 'delete-product/' + id + '/' + page_num;
                }
            }
        });

    }    
</script>