<?php

/*Template Name: Contact Page */

get_header(); ?>
<script>
$(document).ready(function(){    
        $('#submit').click(function(event) {
           event.preventDefault();            
           if (validator()) {
            $('#success_mail').show(); 
            $.post("/wp-content/themes/KadmonBrin/ajax/send_mail.php", $("#full_contact_form").serialize());
           }
        });
    });
</script>   
<?php 
    if ( have_posts() ) while ( have_posts() ) : the_post(); 
?>  
<div id="container">
    <div id="content" class="mediumpadding">
            <div id="inner_left">
                <div id="page_title">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
            <div id="inner_right" style="width:800px;">
                <span class="contact-title" style=" font-size: 38px; font-family: Neuron; font-weight: bold;">WE'D <span style=" color: #9d8677;"><img id="heartimg" src="/wp-content/themes/KadmonBrin/images/heart.png" />&nbsp;</span>TO CHAT <span style="font-weight:normal">03-9210606</span></span>
                <form id="full_contact_form" method="post" action="">
                    <input id="name" name="name" type="text" value="NAME" onfocus="this.value='';" onfocusout="if (this.value=='') this.value='NAME';">
                    <div id="msg-error-name" class="msg-error" style="display: none;">Please enter your name</div>
                    <input id="phone" name="phone" type="text" value="PHONE" onfocus="this.value='';" onfocusout="if (this.value=='') this.value='PHONE';">
                    <input id="email" name="email" type="text" value="E-MAIL" onfocus="this.value='';" onfocusout="if (this.value=='') this.value='E-MAIL';">
                    <div id="msg-error-email" class="msg-error" style="display: none;">Please enter valid email address</div>
                    <textarea id="message" name="message" rows="4" title="MESSAGE" onfocus="this.value='';" onfocusout="if (this.value=='') this.value='MESSAGE';">MESSAGE</textarea>
                    <input id="submit" type="submit" name="submit" value="SEND">
                    <div id="success_mail" style="margin:5px 0">We got your message. Thank you!</div>
                 </form>    
                    <div id="contact_email" onclick='document.location.href = "mailto:marketing@kadmon-brin.co.il";'>marketing@kadmon-brin.co.il </div>
            </div>
    </div>
</div>
 <?php endwhile; ?>
 
 <?php
	get_footer();
 ?>
