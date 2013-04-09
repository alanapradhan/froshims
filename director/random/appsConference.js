/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function message(){
var height = window.innerHeight;
var width = window.innerWidth;
alert(height +','+ width );
}

function initIframe(){
var h = window.innerHeight;
var w = window.innerWidth;
                
                document.write('<input type="button" name="test" value="Resize Iframe" onclick="resizeIframe()"><div id ="appsIframe" align="center"><iframe id="conference_window" src="http://www.appsuccess.org/" width="'+ w +'px" height="'+h+'px"></iframe><div>');
}

function resizeIframe(){
                var h = window.innerHeight;
                var w = window.innerWidth;
                //var element = document.getElementById("appsIframe");
                
               //element.parentNode.removeChild(element);
                
                document.write('<div id ="cheese" align="center"><iframe id="conference_window" src="http://www.appsuccess.org/" width="'+ w +'px" height="'+h+'px"></iframe><div>');
                  document.write('<p>Hi Alana</p>');
                //alert('Resize:'+h+' , '+w);
               
}

function init() {
  // When API is ready...  
 
  gapi.hangout.onApiReady.add( function (eventObj) {
            if (eventObj.isApiReady) {
                
                initIframe();
               
                
        
        
            }
        });
    }


// Wait for gadget to load.                                                       
gadgets.util.registerOnLoadHandler(init);
window.onresize(resizeIframe);

$(window).resize(function() {
    var w = $(this).width()+'px';
    var h = $(this).height()+'px';
$('#appsIframe').attr('width',w);
$('#appsIframe').attr('height',h);
alert('h:'+h+'w:'+w);
});

function startCoBrowse(){
  var portal = $('portalInput').val();
  var w = $(this).width()+'px';
    var h = $(this).height()+'px';
$('body').append('<iframe id="appsIframe" src="http://channel.me/'+portal+'" width="'+ w +'px" height="'+h+'px"></iframe>');
};