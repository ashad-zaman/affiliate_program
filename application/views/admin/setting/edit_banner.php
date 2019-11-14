    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <?php

       $show_mess = $this->session->flashdata('message');

    ?>

    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit</span> banner</h4>

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

                        <form action="<?=base_url('update-banner-details')?>" method="post">

                        <input type="hidden" name="id" id="id" value="<?=$get_banner_details->id?>">

                            <div class="panel panel-flat">

                                <div class="panel-heading">

                                    <h5 class="panel-title">Update banner </h5>

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

                                        <input type="text" class="form-control" placeholder="Banner Title" name="banner_title" value="<?=set_value('banner_title') !="" ? set_value('banner_title') : $get_banner_details->banner_title;?>">

                                    </div>

                                    <div class="form-group">

                                                <label>Banner Type: </label>

                                                <select name="type" class="form-control format-phone-number" id="type">

                                                    <option value="">Select Type</option>

                                                    <option value="1" <?=$get_banner_details->type == '1' ? 'selected' : "";?> >Box</option>

                                                    <option value="2" <?=$get_banner_details->type == '1' ? 'selected' : "";?> >Long vertical</option>

                                                    <option value="3" <?=$get_banner_details->type == '1' ? 'selected' : "";?> >Long Horizontal</option>

                                                </select>

                                            </div>

                                    <div class="form-group">

                                                <label>Parent Category : *</label>

                                                <?=form_error('parent_cat_id');?>

                                                <select name="parent_cat_id" id="parent_cat_id" class="form-control " onchange="parentCategory(this.value)">

                                                    <option value="">Select Category</option>

                                                    <?php

                                                        if(!empty($get_categorys)):

                                                            foreach ($get_categorys as $get_category):

                                                                if(  $get_category->id == $get_banner_details->parent_cat_id ):

                                                                    echo '<option value="'.$get_category->id.'" selected>'.ucwords($get_category->name).'</option>';

                                                                else:

                                                                    echo '<option value="'.$get_category->id.'">'.ucwords($get_category->name).'</option>';

                                                                endif;

                                                            endforeach;

                                                        endif;

                                                    ?>

                                                </select>

                                            </div>



                                        

                                        <div class="form-group">

                                                <label>Sub Category : </label>

                                                <select name="sub_category" class="form-control format-phone-number" id="sub_category">

                                                    <option value="">Select Sub Category</option>

                                                    <?php

                                                        if(!empty($get_has_categorys)):

                                                            foreach ($get_has_categorys as $get_has_category):

                                                                if(  $get_banner_details->child_cat_id == $get_has_category->id ):

                                                                    echo '<option value="'.$get_has_category->id.'" selected>'.ucwords($get_has_category->name).'</option>';

                                                                else:

                                                                    echo '<option value="'.$get_has_category->id.'">'.ucwords($get_has_category->name).'</option>';

                                                                endif;

                                                            endforeach;

                                                        endif;

                                                    ?>

                                                </select>

                                            </div>

    

                                    <div class="form-group">

                                        <label>Description: *</label>

                                        <?=form_error('description');?>

                                        <textarea name="description" id="description" class="form-control "><?=set_value('description') !="" ? set_value('description') : $get_banner_details->banner_description;?></textarea>

                                      

                                    </div>



                                    <div class="form-group">

                                        <label>Tag</label>

                                        <input type="text" class="form-control" placeholder="Tag" name="tag" value="<?=set_value('tag') !="" ? set_value('tag') : $get_banner_details->tag;?>">

                                    </div>

                                    <div class="text-right">

                                        <a href="<?=base_url('banner-manager');?>" class="btn btn-danger"><i class="icon-arrow-left16 position-right"> Back To Banner Manager</i></a>

                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>

                                    </div>



                                </div>

                            </div>

                        </form>

                        <!-- /basic layout -->



                    </div>



                </div>

                <!-- /vertical form options -->





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

                    window.location = base_url + 'update-menu-status/' + id + '/' + status+ '/' + page_num;

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





