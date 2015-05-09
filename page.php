<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  get_header();
  ?>
<script>
$(document).ready(function(){
    init_slider();
    init_slick_contact();
});
</script>
<div id="bg0" class="bg"></div>
<div id="bg" class="bg">
    <?php
            $images = get_post_galleries_images( get_the_ID() );
            foreach ($images[0] as $img) {
                    echo '<img src="'.$img.'" />';
            }
    ?>
</div>
<div id="footer_container">
    <div id="navigation"></div>
    <div id="slick_contact">
        <div id="slick_contact_title"><span style="font-weight:bold">GET TIPS</span></div>
        <div id="sick_contact_content">
            <form id="slick_contact_form" method="post" action="" onsubmit="return false;">
                                <input id="name" name="name" type="text" value="NAME" onfocus="this.value='';" onfocusout="if (this.value=='') this.value='NAME';">
                                <div id="msg-error-name" class="msg-error" style="display: none;">Please enter your name</div>
                                <input id="email" name="email" type="text" value="E-MAIL" onfocus="this.value='';" onfocusout="if (this.value=='') this.value='E-MAIL';">
                                <div id="msg-error-email" class="msg-error" style="display: none;">Please enter valid email address</div>
                                <input id="message" name="message" value="NEWSLETTER" style="display: none;"></input>
                                <input id="submit" type="submit" name="submit" value="SEND">
                            </form>  
            <div id="success_mail">You are subscribed now. Thank you!</div>
        </div>
    </div>
</div>

<?php
  get_footer();
?>