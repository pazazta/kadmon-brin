var slides_time = 5000;
var curr_img = 1; 

/* image rotator */
function change_img(slide_num){
  if (slide_num===undefined) slide_num = curr_img%$('#bg img').length;
     $('#bg').animate({opacity: 0}, 700 , function(){
         $(this).css('background-image','url(' + $('#bg img')[slide_num].src +')');
         $(this).css('opacity',1);
    });
  $('#navigation img').attr('src','wp-content/themes/KadmonBrin/images/nav.png');
  $('#navigation img:nth-child('+(slide_num+1)+')').attr('src','/wp-content/themes/KadmonBrin/images/nav_hover.png');
  $('#bg0').css('background-image','url(' + $('#bg img')[slide_num].src +')');
  curr_img++;
}   

function init_slider()
{
    if ($('#bg').length>0) {
        /** Slider **/
        $('#bg').css('background-image','url(' + $('#bg img')[0].src +')');
        for(j=0; j < $('#bg img').length; j++){
            var new_nav = $('<img src="/wp-content/themes/KadmonBrin/images/nav.png" alt="nav" />');
            $('#navigation').append(new_nav);
        }
        $('#navigation img:nth-child(1)').attr('src','/wp-content/themes/KadmonBrin/images/nav_hover.png');

        $('#navigation img').click( 
            function() {
                clearInterval(window.slider_interval);
                $('#navigation img').attr('src','/wp-content/themes/KadmonBrin/images/nav.png');
                $(this).attr('src','/wp-content/themes/KadmonBrin/images/nav_hover.png');
                change_img($(this).index());
                curr_img = $(this).index()+1;
                window.slider_interval = setInterval(change_img, slides_time);
            }
        );    
        window.slider_interval = setInterval(change_img, slides_time);
    }
}

function init_slick_contact()
{
    if ($('#slick_contact').length>0) {
        window.is_writting = false;
        var cur_height = $('#sick_contact_content').height();
        $('#sick_contact_content').css('margin-bottom',-cur_height);
        $('#slick_contact_title').hover(function() {
                if (parseInt($('#sick_contact_content').css('margin-bottom'))<0) {
                     $('#sick_contact_content').animate({'margin-bottom': 0},'slow');
                     setTimeout(function() {if (!window.is_writting) $('#sick_contact_content').animate({'margin-bottom': -cur_height},'slow');},2500);
                }
        });
        $('#submit').click(function() {
           if (validator()) {
            $("#slick_contact_form").hide(); 
            $('#success_mail').show(); 
            $.post("/wp-content/themes/KadmonBrin/ajax/send_mail.php", $("#slick_contact_form").serialize(),  function() {
            });
           }
        });
        $('#slick_contact_form').click(function() {
            window.is_writting = true;
        });
    }
}

function validator() 
{
        var valid = true;
        var err_fname = document.getElementById("msg-error-name");
        var err_email = document.getElementById("msg-error-email");
        //validate name
        if (document.getElementById("name").value==="NAME") {
                valid = false;
                err_fname.style.display="block";
        }
        else 
                err_fname.style.display="none";

        //validate email
        if (!document.getElementById("email").value.match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/)) {
                valid = false;
                err_email.style.display="block";				
        }
        else 
                err_email.style.display="none";		

        return valid;
}

function init_testemonials()
{   
    set_arrows_opacity();
    $('.arrow:eq(1)').click(function() {
        $element_width = parseInt($('.testemonial').css('margin-right'))+$('.testemonial').outerWidth();
        if(parseInt($('#testemonials').css('margin-left')) > -(($('.testemonial').length-($('#testemonials_wrapper').width()/$element_width))*$element_width) +$element_width)
            $('#testemonials').animate({'margin-left':"-="+$element_width},set_arrows_opacity);
    });
    
    $('.arrow:eq(0)').click(function() {
        $element_width = parseInt($('.testemonial').css('margin-right'))+$('.testemonial').outerWidth();
        if(parseInt($('#testemonials').css('margin-left')) < -1)
            $('#testemonials').animate({'margin-left':"+="+$element_width},set_arrows_opacity);
    });
}

function set_arrows_opacity()
{
    $element_width = parseInt($('.testemonial').css('margin-right'))+$('.testemonial').outerWidth();
    if(parseInt($('#testemonials').css('margin-left')) > -(($('.testemonial').length-($('#testemonials_wrapper').width()/$element_width))*$element_width) +$element_width)
         $('.arrow:eq(1)').css('opacity','1');
     else
         $('.arrow:eq(1)').css('opacity','0.5');
     
     if(parseInt($('#testemonials').css('margin-left')) < -1)
         $('.arrow:eq(0)').css('opacity','1');
     else
         $('.arrow:eq(0)').css('opacity','0.5');
     
}

function load_proj_images(proj)
{
    var imgs = proj.find('.img_template');
    imgs.each(function() {
       if ($(this).find('img').length ===0)
           $(this).prepend('<img src="'+$(this).data('src')+'" />');
    });
}

function load_first_images()
{
    var imgs = $('.proj .img_template:first-child');
    imgs.each(function() {
       if ($(this).find('img').length ===0)
           $(this).prepend('<img src="'+$(this).data('src')+'" />');
    });    
}

function load_proj_bg()
{
	var img = $('.active_proj img').attr('src');
	$('#bg').css('background-image','url(' + img +')');
}

function unbind_thumbs_events()
{
    $('#arrow_down').unbind();
    $('#arrow_up').unbind();
    $('#project_thumbs ul').unbind();
}

function bind_thumbs_events()
{
    $('#project_thumbs ul').on('mousewheel', function(event) {
        if (event.deltaY>0) {
            animate_thumbs("up",100);
        } else if (event.deltaY<0) {
            animate_thumbs("down",100);
        }
    });

    $('#arrow_down').bind('click', function() {
        animate_thumbs("down",300);
    });

    $('#arrow_up').bind('click', function() {
        animate_thumbs("up",300);
    });
}

function animate_thumbs(direction,speed)
{
    var target = -($('#project_thumbs ul').outerHeight()-$('#project_thumbs').height());
    var thumb_height = $('#project_thumbs li').height();
    unbind_thumbs_events();
    if (direction=="up") {
        if (parseInt($('#project_thumbs ul').css('margin-top')) + $('#project_thumbs li').height() <= 0) {
            $('#project_thumbs ul').animate({'margin-top': '+='+thumb_height+'px'},speed,'linear', bind_thumbs_events);
        } else {
            bind_thumbs_events();
        }
    } else {
        if (parseInt($('#project_thumbs ul').css('margin-top')) - $('#project_thumbs li').height() >= target) {
            $('#project_thumbs ul').animate({'margin-top': '-='+thumb_height+'px'},speed,'linear', bind_thumbs_events);
        } else {
            bind_thumbs_events();
        }
    }
}

function init_portfolio() 
{
    $('.proj:first').addClass('active_proj');
    $('.proj .img_template:first-child').addClass('active');
    load_first_images();
	load_proj_bg();
	
	if (!window.isMobile) {
		load_proj_images($('.active_proj'));
		update_img_counter();

		$('#next_img').click(next_project_img);
		$('#prev_img').click(prev_project_img);

        bind_thumbs_events();

		$('#project_thumbs li').click(function() {
		   $('.active_proj').removeClass('active_proj');
		   $selected_proj = $('.proj:eq('+$(this).index()+')');
		   $selected_proj.addClass('active_proj');
		   load_proj_images($selected_proj);
		   update_img_counter();
		});
		$('#next_proj').click(function() {
			 var $next = ($('.active_proj').next().length > 0) ? $('.active_proj').next() : $('.proj:first');
			 load_proj_images($next);
			 $('.active_proj').removeClass('active_proj');
			 $next.addClass('active_proj');
			 update_img_counter();
		});
		
		$('#prev_proj').click(function() {
			 var $prev = ($('.active_proj').prev().length > 0) ? $('.active_proj').prev() : $('.proj:last');
			 load_proj_images($prev);
			 $('.active_proj').removeClass('active_proj');
			 $prev.addClass('active_proj');
			 update_img_counter();
		});
	}
    
	
	$('#bg_proj_right').click(function() {
		var $next = ($('.active_proj').next().length > 0) ? $('.active_proj').next() : $('.proj:first');
		$('.active_proj').removeClass('active_proj');
		$next.addClass('active_proj');
		load_proj_bg();
	});	
	
	$('#bg_proj_left').click(function() {
		var $prev = ($('.active_proj').prev().length > 0) ? $('.active_proj').prev() : $('.proj:last');
		$('.active_proj').removeClass('active_proj');
		$prev.addClass('active_proj');		
		load_proj_bg();
	});
}

function next_project_img(){
      var $active = $('#images_area .active_proj .active');
      var $next = ($active.next().length > 0) ? $active.next() : $('#images_area .active_proj .img_template:first');
      $next.css('z-index',2);//move the next image up the pile
      $active.fadeOut(700,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $next.css('z-index',3).addClass('active');//make the next image the top one
          update_img_counter();
      });
}

function prev_project_img(){
      var $active = $('#images_area .active_proj .active');
      var $prev = ($active.prev().length > 0) ? $active.prev() : $('#images_area .active_proj .img_template:last');
      $prev.css('z-index',2);//move the next image up the pile
      $active.fadeOut(700,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $prev.css('z-index',3).addClass('active');//make the next image the top one
          update_img_counter();
      });
}

function update_img_counter() {
    $('#img_counter').text(($('#images_area .active_proj .active').index()+1)+"/"+$('.active_proj div').length);
}