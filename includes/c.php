<?php

    /****************************************/
    /* Portal Web de Surcarga Curier        */
    /* Desarrollado por IT Labs             */
    /* www.it-labs.com.ve                   */
    /* info@it-labs.com.ve                  */
    /* Abril de 2013                        */
    /****************************************/

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

    function menu($path){
        echo "<!-- #dl-menu.dl-menuwrapper start --> \n"
            ."<div id=\"dl-menu\" class=\"dl-menuwrapper\"> \n"
            ."<button class=\"dl-trigger\">Open Menu</button> \n"
            ."<ul class=\"dl-menu\"> \n"
            ."<li> \n"
            ."<a href=\"".$path."index.html\">Home</a> \n"
            ."<ul class=\"dl-submenu\"> \n"
            ."<li><a href=\"".$path."index.html\">Home default</a></li> \n"
            ."<li><a href=\"".$path."home02.html\">Home business 02</a></li> \n"
            ."<li><a href=\"".$path."home03.html\">Home business 03</a></li> \n"
            ."</ul> \n"
            ."</li> \n"

            ."<li> \n"
            ."<a href=\"".$path."index.html\">Headers</a> \n"
            ."<ul class=\"dl-submenu\"> \n"
            ."<li><a href=\"".$path."index.html\">Header default</a></li> \n"
            ."<li><a href=\"".$path."header02.html\">Header style 02</a></li> \n"
            ."<li><a href=\"".$path."header03.html\">Header style 03</a></li> \n"
            ."<li><a href=\"".$path."header04.html\">Header style 04</a></li> \n"
            ."<li><a href=\"".$path."header05.html\">Header style 05</a></li> \n"
            ."</ul> \n"
            ."</li> \n"

            ."<li> \n"
            ."<a href=\"".$path."about.html\">Pages</a> \n"
            ."<ul class=\"dl-submenu\"> \n"
            ."<li><a href=\"".$path."about.html\">About us</a></li> \n"
            ."<li><a href=\"".$path."about02.html\">About us style 02</a></li> \n"
            ."<li><a href=\"".$path."aboutme.html\">About me</a></li> \n"
            ."<li><a href=\"".$path."pagetitle02.html\">About me page title 02</a></li> \n"
            ."<li><a href=\"".$path."pagetitle03.html\">About me page title 03</a></li> \n"
            ."<li><a href=\"".$path."team.html\">Team members</a></li> \n"
            ."<li><a href=\"".$path."hiring.html\">We are hiring</a></li> \n"
            ."<li><a href=\"".$path."services.html\">Our services</a></li> \n"
            ."<li><a href=\"".$path."services02.html\">Services style 02</a></li> \n"
            ."<li><a href=\"".$path."pricing.html\">Pricing tables</a></li> \n"
            ."<li><a href=\"".$path."sidebarleft.html\">Page sidebar left</a></li> \n"
            ."<li><a href=\"".$path."sidebarright.html\">Page sidebar right</a></li> \n"
            ."</ul> \n"
            ."</li> \n"

            ."<li> \n"
            ."<a href=\"".$path."portfolio3.html\">Portfolio</a> \n"
            ."<ul class=\"dl-submenu\"> \n"
            ."<li><a href=\"".$path."portfolio2.html\">Portfolio 2 columns</a></li> \n"
            ."<li><a href=\"".$path."portfolio3.html\">Portfolio 3 columns</a></li> \n"
            ."<li><a href=\"".$path."portfolio4.html\">Portfolio 4 columns</a></li> \n"
            ."<li><a href=\"".$path."portfoliofull.html\">Portfolio full layout</a></li> \n"
            ."<li><a href=\"".$path."portfoliosingle.html\">Portfolio single</a></li> \n"
            ."<li><a href=\"".$path."portfoliosingle02.html\">Portfolio single 02</a></li> \n"
            ."</ul> \n"
            ."</li> \n"

            ."<li> \n"
            ."<a href=\"".$path."blog2.html\">Blog</a> \n"
            ."<ul class=\"dl-submenu\"> \n"
            ."<li><a href=\"".$path."blog.html\">Blog small image</a></li> \n"
            ."<li><a href=\"".$path."blog2.html\">Blog big image</a></li> \n"
            ."<li><a href=\"".$path."blog3.html\">Blog full no sidebar</a></li> \n"
            ."<li><a href=\"".$path."blogmasonry.html\">Blog masonry</a></li> \n"
            ."<li><a href=\"".$path."blogmasonry02.html\">Blog masonry no sidebar</a></li> \n"
            ."<li><a href=\"".$path."blogsingle.html\">Blog single</a></li> \n"
            ."<li><a href=\"".$path."blogsingle02.html\">Blog single full width</a></li> \n"
            ."</ul> \n"
            ."</li> \n"

            ."<li> \n"
            ."<a href=\"".$path."team.html#\">Features</a> \n"
            ."<ul class=\"dl-submenu\"> \n"
            ."<li><a href=\"".$path."tabs.html\">Tabs</a></li> \n"
            ."<li><a href=\"".$path."buttons.html\">Buttons</a></li> \n"
            ."<li><a href=\"".$path."accordions.html\">Accordions</a></li> \n"
            ."<li><a href=\"".$path."informationboxes.html\">Information boxes</a></li> \n"
            ."<li><a href=\"".$path."testimonials.html\">Testimonials</a></li> \n"
            ."<li><a href=\"".$path."lists.html\">Lists</a></li> \n"
            ."<li><a href=\"".$path."notes.html\">Notes</a></li> \n"
            ."<li><a href=\"".$path."columnsandsections.html\">Columns and sections</a></li> \n"
            ."<li><a href=\"".$path."dropcaps.html\">Dropcaps & highlighters</a></li> \n"
            ."<li><a href=\"".$path."socialicons.html\">Social icons</a></li> \n"
            ."<li><a href=\"".$path."socialphotostreams.html\">Social photo streams</a></li> \n"
            ."</ul> \n"
            ."</li> \n"

            ."<li><a href=\"".$path."contact.html\">Contact</a></li> \n"
            ."</ul><!-- .dl-menu end --> \n"
            ."</div><!-- #dl-menu.dl-menuwrapper end --> \n";
    }

?>