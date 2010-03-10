<script type="text/javascript" src="<?php echo $vars['url']; ?>mod/worldview/vendors/flickr/js/cycle.js"></script>
<script>

    $.getJSON("<?php echo $vars['data']; ?>", function(data){
        $.each(data.items, function(i,item){
            $("<img/>").attr("src", item.media.m).appendTo("#images")
            .wrap("<a href='" + item.link + "'></a>");
    });
  
    $('#images').cycle({
        fx:     'fade',
        speed:    'slow',
        timeout:  0,
        next:   '#next',
        prev:   '#prev'
    });
  
});

</script>

<style type="text/css">
    #images { 
        height: 180px;
        width: 100%; 
        padding:0 0 0 80px; 
        margin:0 0 10px 0; 
        overflow: hidden;
     }
      #images img { 
          border:none;
      }
</style>

<!-- div where the images will display -->
<div id="title"></div>
<div id="images"></div>

<!-- next and prev nav -->
<div class="flickrNav" align="center">
    <a id="prev" href="#">&laquo; <?php echo elgg_echo('previous'); ?></a> <a id="next" href="#"><?php echo elgg_echo('next'); ?> &raquo;</a>
</div>