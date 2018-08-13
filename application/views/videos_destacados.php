<div class="row">
  
</div>

<script type="text/javascript">

 
    var player;
    $( document ).ready(function() {
   // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
         
    })    
 


 
  function doYT(){
       
         
        var etiqueta="";
        <?php 
         if($videos):
          $text1="";
         $text2="";
         foreach ($videos as $value){ 
          $text1=(html_entity_decode($value['des_larga']));
          $text2=nl2br(str_replace("<p>","",$text1));
        ?>
                //console.log('<? //echo $text2;?>');
                //var p=$("<p/>").html(<?php //echo $text2?>).text();
               // etiqueta='<div class="col-xs-12 col-sm-4"> <div class="video-responsive" id="video3"> </div> <h3><?php //echo $value['des_corta']?></h3><?php //echo $text2;?> </div>';
              //$("#videosdestacados").append(etiqueta);
               player = new YT.Player('video10', {
                  height: '250',
                  width: '280',
                  videoId: 'M7lc1UVf-VE',//'M7lc1UVf-VE',
                  events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                  }
                });
        <?      
        
          } 
          endif;   
        ?>
    }
    function onPlayerReady(event) {
        //event.target.playVideo();
      }
      var done = false;
     function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          //setTimeout(stopVideo, 6000);
          done = true;
          //windows.open=$("#videosdestacados")[0].src += "&autoplay=1";;
        }
      }
       function stopVideo() {
        player.stopVideo();
      }

    window.YT && doYT() || function(){
        var a=document.createElement("script");
        a.setAttribute("type","text/javascript");
        a.setAttribute("src","http://www.youtube.com/player_api");
        a.onload=doYT;
        a.onreadystatechange=function(){
            if (this.readyState=="complete"||this.readyState=="loaded") doYT()
        };
        (document.getElementsByTagName("head")[0]||document.documentElement).appendChild(a)
    }();
</script>