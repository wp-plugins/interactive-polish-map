jQuery(document).ready(function(){

 var new_map='<span class="map"><span class="s1"></span><span class="s2"></span><span class="s3"></span><span class="s4"></span><span class="s5"></span><span class="s6"></span><span class="s7"></span><span class="s8"></span><span class="s9"></span></span>';
 var new_bg=jQuery("<span>");
 new_bg.addClass("bg");
 jQuery("#w li a").append(new_map);
 jQuery("#w li a").append(new_bg);

});