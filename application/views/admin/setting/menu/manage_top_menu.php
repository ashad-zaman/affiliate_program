<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<h3 class="title" id="title0"><?php echo $page_title;?></h3>
<div class="container">

    <div class="row">
     
      <form action="<?=base_url('add-top-menu')?>" method="post">
            <div class="col-md-2"><h5>Select Menu:</h5> </div> 
            <div class="col-md-4"><select class="form-control" name="menu">
              <?php foreach($menuList as $key=>$item){ ?>
                <option value="<?=$item->id;?>"><?=$item->name;?></option>
                <?php } ?>
              </select>
           </div> 
            <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button> 
           
            </div>
          </form>

        
    </div>

    
    <div class="row">
      <div class="col-md-12">
          <div class="menu-container">
            <ul class="space first-space" id="sortable">
                <?php if(isset($get_categorys))foreach($get_categorys as $key=>$item){?>
                  <li class="route" id="<?=$item->id;?>" >
                    <h3 class="title" id="<?=$item->id;?>"><?=$item->name;?></h3>
                      <span class="ui-icon ui-icon-arrow-4-diag"></span>
                      <ul class="space" id="sortable">
                      </ul>
                  </li>

              <?php }?>
            </ul>
          </div>
        </div>
    </div>

</div>
<script type="text/javascript">
$(document).ready(function(){

calcWidth($('#title0'));

window.onresize = function(event) {
    console.log("window resized");

    //method to execute one time after a timer

    };

    //recursively calculate the Width all titles
    function calcWidth(obj){
        console.log('---- calcWidth -----');

        var titles = 
        $(obj).siblings('#sortable').children('.route').children('.title');

        $(titles).each(function(index, element){
        var pTitleWidth = parseInt($(obj).css('width'));
        var leftOffset = parseInt($(obj).siblings('#sortable').css('margin-left'));

        var newWidth = pTitleWidth - leftOffset;

        if ($(obj).attr('id') == 'title0'){
        console.log("called");

        newWidth = newWidth - 10;
        }

        $(element).css({
        'width': newWidth,
        })

        calcWidth(element);
        });

    }

$('#sortable').sortable({
    connectWith:'.space',
    
    // handle:'.title',
    // placeholder: ....,
    items:'li',
    cursor: 'move',
    tolerance:'intersect',
    forcePlaceholderSize: true,
    revert: true, 
    placeholder: 'state', 
    over:function(event,ui){
    },
    receive:function(event, ui){
        calcWidth($(this).siblings('.title'));
    },
    update: function (event, ui) {

               var dataArray=[];
                $('ul#sortable li').each(function(){
                 var value= $(this).attr('id');
                 dataArray.push(value);
                 console.log(value);
                });


                $.ajax({
                url: '<?=base_url('admin/saceOrder');?>',
                type: 'POST',
                data: {'order':dataArray},
                success: function (data) {
                    
                }

            });

            }
});

$('#sortable').disableSelection();

});
</script>
<style type="text/css">
.container{
  margin-top: 60px;
  margin-left: 60px;
  margin-right: 60px;
  padding-bottom: 10px;
  min-height: 500px;
  width:60%;
}
.menu-container {
  position: relative;
  margin-top: 60px;
  min-height: 500px;
  background: #eee;
  box-shadow: 0px 0px 10px 2px #bbb;
  width:100%;
}

.menu-container h3 {
  position: absolute;
  border: 0;
  margin: 0;
  padding: 0;
  padding-top: 14px;
  height: 44px;
  width: 400px;
  text-indent: 80px;
  background: #4af;
  border-radius: 2px;
  box-shadow: 0px 0px 0px 2px #29f;
  pointer-events: none;
  margin-left: 0px;
  width: 100%;
  background: white;
  box-shadow: 0px 2px 0px 1px #9bf;
}

.route {
  position: relative;
  list-style-type: none;
  border: 0;
  margin: 0;
  padding: 0;
  top: 0px;
  margin-top: 0px;
  max-height: 100% !important;
  width: 100%;
  background: #bcf;
  border-radius: 2px;
  z-index: -1;
}

.route span {
  position: absolute;
  top: 20px;
  left: 20px;
  -ms-transform: scale(2);
  /* IE 9 */

  -webkit-transform: scale(2);
  /* Chrome, Safari, Opera */

  transform: scale(2);
  z-index: 10px;
}

.route .title {
  position: absolute;
  border: 0;
  margin: 0;
  padding: 0;
  padding-top: 14px;
  height: 44px;
  width: 400px;
  text-indent: 80px;
  background: #4af;
  border-radius: 2px;
  box-shadow: 0px 0px 0px 2px #29f;
  pointer-events: none;
}

.first-title { margin-left: 10px; }

#sortable {
  position: relative;
  list-style-type: none;
  border: 0;
  margin: 0;
  padding: 0;
  margin-left: 70px;
  width: 60px;
  top: 68px;
  padding-bottom: 68px;
  height: 100%;
  z-index: 1;
}

.first-space { margin-left: 10px; }
</style>