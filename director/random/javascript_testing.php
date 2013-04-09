<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
    function init() {
        // When API is ready...  
        /*
  gapi.hangout.onApiReady.add(
      function(resize){
      if (resize.isApiReady) {
          document.getElementById('conference_window')
            .height = 'gapi.hangout.layout.getHeight()+"px"';
             document.getElementById('conference_window')
            .width = 'gapi.hangout.layout.getWidth()+"px"';
            alert ("current height is:"+gapi.hangout.layout.getHeight()+"px";);
      }});*/
      
        gapi.hangout.onApiReady.add( function (resize) {
            if (resize.isApiReady) {
                var sys = gapi.hangout.layout;
                alert("current height is:"+sys.getHeight());
        
        
            }
        });
    }


    // Wait for gadget to load.                                                       
    gadgets.util.registerOnLoadHandler(init);
    //gadgets.util.registerOnLoadHandler(message);
</script>