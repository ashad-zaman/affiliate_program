



    <?php



       $show_mess = $this->session->flashdata('message');



    ?>



    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> Product</h4>



    <!-- Page container -->



    <div class="page-container" id="add_customer">







        <!-- Page content -->



        <div class="page-content">







            <!-- Main content -->



            <div class="content-wrapper">







                <!-- Vertical form options -->



                <div class="row">







                    <div class="col-md-12">







                        <!-- Basic layout-->



                        <form action="<?=base_url('add-product')?>" method="post" onsubmit="return addProduct();">



                            <div class="panel panel-flat">



                                <div class="panel-heading">



                                    <h5 class="panel-title">Add Product</h5>



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



                                    <div class="row">



                                        <div class="col-md-4">







                                            <div class="form-group">



                                                <label>Parent Category : *</label>



                                                <?=form_error('parent_cat_id');?>



                                                <select name="parent_cat_id" id="parent_cat_id" class="form-control format-phone-number" onchange="parentCategory(this.value)">



                                                    <option value="">Select Category</option>



                                                    <?php



                                                        if(!empty($get_categorys)):



                                                            foreach ($get_categorys as $get_category):



                                                                echo '<option value="'.$get_category->id.'">'.ucwords($get_category->name).'</option>';



                                                            endforeach;



                                                        endif;



                                                    ?>



                                                </select>



                                            </div>







                                            <div class="form-group">



                                                <label>Slug: *</label>



                                                <?=form_error('slug');?>



                                                <input type="text" class="form-control" name="slug" placeholder="slug" id="slug" value="<?=set_value('slug');?>">



                                            </div>







                                             <div class="form-group">



                                                <label>Discount Percentage: </label>



                                                <input type="text" class="form-control format-phone-number" name="discount_percentage" placeholder="Discount Percentage" id="discount_percentage" value="<?=set_value('discount_percentage');?>">



                                            </div>



                                            <div class="form-group">



                                                <label>Video URL: </label>



                                                <input type="text" class="form-control format-phone-number" name="video_url" placeholder="Video URL" id="video_url" value="<?=set_value('video_url');?>">



                                            </div>







                                        </div>







                                        <div class="col-md-4">







                                            <div class="form-group">



                                                <label>Sub Category : </label>



                                                <select name="sub_category" class="form-control format-phone-number" id="sub_category">



                                                    <option value="">Select Sub Category</option>



                                                </select>



                                            </div>







                                            <div class="form-group">



                                                <label>price: *</label>



                                                <?=form_error('price');?>



                                                <input type="text" class="form-control format-phone-number" name="price" placeholder="Price" id="price" value="<?=set_value('price');?>">



                                            </div>







                                             <div class="form-group">



                                                <label>Image URL: *</label>



                                                <?=form_error('image_url');?>



                                                <input type="text" class="form-control " name="image_url" placeholder="Image URL" id="image_url" value="<?=set_value('image_url');?>">



                                            </div>

                                            <div class="form-group">

                                                <label>Brand: *</label>

                                                <?=form_error('brand');?>

                                                <input type="text" class="form-control " name="brand" placeholder="Brand Name" id="brand" value="<?=set_value('brand');?>">

                                            </div>

                                            





                                        </div>







                                        <div class="col-md-4">







                                            <div class="form-group">



                                                <label>Title: *</label>



                                                <?=form_error('title');?>



                                                <input type="text" class="form-control " name="title" placeholder="Title" id="title" value="<?=set_value('title');?>"  onchange="getSlug(this.value);">



                                            </div>







                                            <div class="form-group">



                                                <label>Discount price: </label>



                                                <input type="text" class="form-control format-phone-number" name="discount_price" placeholder="Discount Price" id="discount_price" value="<?=set_value('discount_price');?>">



                                            </div>







                                           <div class="form-group">



                                                <label>Product URL: *</label>



                                                <?=form_error('product_url');?>



                                                <input type="text" class="form-control " name="product_url" placeholder="Product URL" id="product_url" value="<?=set_value('product_url');?>">



                                            </div>



                                            <div class="form-group col-md-3">



                                                <label>Is Prime?</label>



                                                <?=form_error('is_prime');?>



                                                <input type="checkbox" class="form-control" style="width:40%" name="is_prime"  id="is_prime" value="<?=set_value('is_prime');?>">



                                            </div>

                                            <div class="form-group col-md-3">



                                                <label>Is Deal?</label>



                                                <?=form_error('is_deal');?>



                                                <input type="checkbox" class="form-control" style="width:40%" name="is_deal"  id="is_deal" value="<?=set_value('is_deal');?>">



                                            </div>

                                            <div class="form-group col-md-4">



                                                    <label>Is Best Seller?</label>



                                                    <?=form_error('is_best_seller');?>



                                                    <input type="checkbox" class="form-control" style="width:40%" name="is_best_seller"  id="is_best_seller" value="<?=set_value('is_best_seller');?>">



                                                </div>



                                        </div>







                                        <div class="row">



                                            <div class="col-md-12">



                                                <div class="form-group col-md-4">



                                                    <label>Tag: </label>



                                                    <input type="text" class="form-control format-phone-number" name="tag" placeholder="Tag" id="tag" value="<?=set_value('tag');?>">



                                                </div>   



                                                 <div class="form-group  col-md-4">



                                                    <label>Store: *</label>



                                                    <select name="store" id="store" class="form-control">



                                                        <option value="">Select Store</option>



                                                        <option value="1" selected>Amazon</option>



                                                        <option value="2">ebay</option>



                                                        <option value="3">Ali Baba</option>



                                                        <option value="4">Ali Express</option>



                                                    </select>



                                                </div>   



                                               



                                                



                                                <div class="form-group col-md-1">



                                                    <label>Is Top Rated?</label>

                                                    <?=form_error('is_top_rated');?>

                                                    <input type="checkbox" class="form-control" style="width:40%" name="is_top_rated"  id="is_top_rated" value="<?=set_value('is_top_rated');?>">



                                                </div>



                                                <div class="form-group col-md-1">

                                                    <label>Is Hot?</label>

                                                    <?=form_error('is_hot');?>

                                                    <input type="checkbox" class="form-control" style="width:40%" name="is_hot"  id="is_hot" value="<?=set_value('is_hot');?>">

                                                    

                                                </div>

                                                <div class="form-group col-md-1">

                                                    <label>Is Gift?</label>

                                                    <?=form_error('is_gift');?>

                                                    <input type="checkbox" class="form-control" style="width:40%" name="is_gift"  id="is_gift" value="<?=set_value('is_gift');?>">



                                                </div>

                                            </div>



                                        </div>



                                        <div class="row">



                                        <div class="col-md-12">



                                            <div class="form-group col-md-4">



                                                <label>Rating: *</label>



                                                    <select name="rating" id="rating" class="form-control">



                                                    <option value="">Select Rating</option>



                                                    <option value=".5"  >.5</option>



                                                    <option value="1" >1</option>



                                                    <option value="1.5" >1.5</option>



                                                    <option value="2" >2</option>



                                                    <option value="2.5" >2.5</option>



                                                    <option value="3" >3</option>



                                                    <option value="3.5">3.5</option>



                                                    <option value="4" >4</option>



                                                    <option value="4.5" >4.5</option>



                                                    <option value="5" >5</option>



                                                    </select>



                                            </div>   



                                            <div class="form-group col-md-4">



                                                <label>Review Label: </label>



                                                <?=form_error('review_label');?>



                                                <input type="text" class="form-control " name="review_label" placeholder="Review Label" id="review_label" value="<?=set_value('review_label');?>">



                                            </div>  



                                            <div class="form-group col-md-4">



                                                <label>Review URL: </label>



                                                <?=form_error('review_url');?>



                                                <input type="text" class="form-control " name="review_url" placeholder="Review URL" id="review_url" value="<?=set_value('review_url');?>">



                                            </div>                        



                                        </div>

                                     </div>



                                    <div class="row">



                                    <div class="col-md-12">



                                        

                                        <div class="form-group col-md-6">



                                            <label>Question Answered Label:</label>



                                            <?=form_error('question_answered_label');?>



                                            <input type="text" class="form-control " name="question_answered_label" placeholder="Question Answered Label" id="question_answered_label" value="<?=set_value('question_answered_label');?>">



                                        </div>  



                                        <div class="form-group col-md-6">



                                            <label>Question Answered URL: </label>



                                            <?=form_error('question_answered_url');?>



                                            <input type="text" class="form-control " name="question_answered_url" placeholder="Question Answered URL" id="question_answered_url" value="<?=set_value('question_answered_url');?>">



                                        </div>                        



                                    </div>

                                    </div>





                                        <div class="row">



                                                <div class="col-md-12">



                                                    <div class="form-group col-md-6">



                                                        <label>Meta Keyword: </label>



                                                        <input type="text" class="form-control format-phone-number" name="meta_keyword" placeholder="Meta Keyword" id="meta_keyword" value="<?=set_value('meta_keyword');?>">



                                                    </div>   



                                                    <div class="form-group  col-md-6">



                                                        <label>Meta Description: *</label>



                                                        <input type="text" class="form-control format-phone-number" name="meta_description" placeholder="Meta Description" id="meta_description" value="<?=set_value('meta_description');?>">



                                                    </div>   





                                                </div>



                                        </div>



                                        <div class="col-md-12">



                                            <div class="form-group">



                                                <label>Description: </label>



                                                <textarea name="description" id="description" class="form-control format-phone-number"><?=set_value('description');?></textarea>



                                            </div>



                                        </div>







                                        <div class="col-md-4">



                                            <img src="<?=base_url('assets/admin/images/blank_book.jpg');?>" alt="" class="book_image_view center-block" id="amazonImageView" style="width: 24%;margin:0;border: 1px solid #a7a3a3;">



                                        </div>







                                        







                                    </div>



                                </div>







                            </div>



                        



                        <!-- /basic layout -->







                        <!-- Input formatter -->



                        <div class="panel panel-flat">







                            <div class="panel-body">



                                <div class="row text-center">



                                    <a type="submit" class="btn btn-danger"><i class="icon-arrow-left16 position-right"> Back To Dashboard</i></a>



                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>



                                </div>



                            </div>



                        </div>



                        <!-- /input formatter -->



                        </form>







                    </div>







                </div>



                <!-- /vertical form options -->







            </div>



            <!-- /main content -->







        </div>



        <!-- /page content -->







    </div>



    <!-- /page container -->











<style type="text/css">



    #add_customer .form-group > p {



        color: #ff0000;



    }



</style>







<script type="text/javascript">







    var base_url = '<?=base_url()?>';







    // Book image url handler



    $('#image_url').on('focusout', function () {



        if( $(this).val() != '' ) {



            $('#amazonImageView').attr('src', $(this).val());



        }



        else {



            $('#amazonImageView').attr('src', base_url + 'assets/admin/images/blank_book.jpg');



        }



    });







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







    function addProduct(){







        var parent_cat_id   = $('#parent_cat_id').val();



        var title           = $('#title').val();



        var slug            = $('#slug').val();



        var price           = $('#price').val();



        var image_url       = $('#image_url').val();



        var product_url     = $('#product_url').val();



        var store           = $('#store').val();



        



        if( parent_cat_id == "" ){



            $('#parent_cat_id').addClass("error-border");



            return false;



        }else if( title == "" ){



            $('#title').addClass("error-border");



            return false;



        }else if( slug == "" ){



            $('#slug').addClass("error-border");



            return false;



        }else if( price == "" ){



            $('#price').addClass("error-border");



            return false;



        }else if( image_url == "" ){



            $('#image_url').addClass("error-border");



            return false;



        }else if( product_url == "" ){



            $('#product_url').addClass("error-border");



            return false;



        }else if( store == "" ){



            $('#store').addClass("error-border");



            return false;



        }else{



            return true;



        }



        



    }







</script>







