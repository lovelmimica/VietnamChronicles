window.onload = function(){
    
    function populatePostcardModal(id){
        localStorage.setItem("activePostcardId", id);
        
        const postcardArrayStr = localStorage.getItem("postcardArray");
        const postcardArray = JSON.parse(postcardArrayStr);
        
        const activePostcard = postcardArray.find(element => element.id == id);
        
        const postcardPartsArray = activePostcard.parts.split('.');
        const title = activePostcard.title;
        const content = activePostcard.content.replace(/<[^>]+>/g, '');
        const imageUrl = activePostcard.imageUrl;
        
        jQuery(".postcard-modal .postcard-title").text(title);
        jQuery(".postcard-modal img").attr("src", imageUrl);
        jQuery(".postcard-modal .modal-postcard-content").text(content);
        jQuery(".postcard-modal .modal-postcard-parts").empty();
        postcardPartsArray.forEach(element => {
            if(element.length > 2) jQuery(".postcard-modal .modal-postcard-parts").append('<li>' + element + '</li>');
        });
    }

    jQuery(".postcard-card").on("click", function(){
        let postcardArrayStr = localStorage.getItem("postcardArray");
        let postcardArray = JSON.parse(postcardArrayStr); 
        
        var id = jQuery(this).attr("data-postcard-id");
        
        populatePostcardModal(id);
        jQuery(".div-block-31").css("display", "flex");
        jQuery(".div-block-31 .postcard-modal").addClass('w3-animate-top');
    });
    
    jQuery(".postcard-modal .postcard-topbar .close-icon").on('click', () => {
        jQuery(".div-block-31").css("display", "none");
    });
    
    jQuery(".postcard-modal .postcard-navigation.right-arrow").on("click", () => {
        const currentId = localStorage.getItem("activePostcardId");
        const postcardArrayStr = localStorage.getItem("postcardArray");
        const postcardArray = JSON.parse(postcardArrayStr);
        
        let index = postcardArray.findIndex(element => element.id == currentId);
        
        index == (postcardArray.length - 1) ? index = 0 : index++;
        
        const nextId = postcardArray[index].id;
        
        populatePostcardModal(nextId);
        
    });
    
    jQuery(".postcard-modal .postcard-navigation.left-arrow").on("click", () => {
       const currentId = localStorage.getItem("activePostcardId");
       const postcardArrayStr = localStorage.getItem("postcardArray");
       const postcardArray = JSON.parse(postcardArrayStr);
        
       let index = postcardArray.findIndex(element => element.id == currentId);
        
       index == 0 ? index = (postcardArray.length - 1) : index--;
        
       const previousId = postcardArray[index].id;
        
       populatePostcardModal(previousId);
    });
    
    //try to use promises in form submiting
    jQuery('.search-icon').on('click', () => {
        jQuery('#search_form').submit();
    });
    
    jQuery(".do-search-posts").on("click", function(){
        jQuery(".form-search-posts").ajaxSubmit();
    });

    jQuery(".join-newsletter").on("click", function(){
        input_email = jQuery("#email-form #name-2").val();
        if(input_email.includes("@")){
            jQuery("#email-form").ajaxSubmit();
            jQuery("#email-form")[0].reset();

            jQuery(".footer-form-success").css("display", "block");
            jQuery(".footer-form-fail").css("display", "none");
        }else{
            jQuery(".footer-form-fail").css("display", "block");
            jQuery(".footer-form-success").css("display", "none");
        }
    });

    jQuery(".form-subscription").on("click", function(){
        input_email = jQuery("#email").val();
        if(input_email.includes("@")){
            jQuery("#email-form-2").ajaxSubmit();
            jQuery("#email-form-2")[0].reset();

            jQuery(".newsletter-form-success").css("display", "block");
            jQuery(".newsletter-form-fail").css("display", "none");
        }else{
            jQuery(".newsletter-form-fail").css("display", "block");
            jQuery(".newsletter-form-success").css("display", "none");
        }       
    });

    jQuery(".comment-form-submit").on('click', function(){
        input_email = jQuery("#email-3").val();

        if(input_email.includes("@")){
            jQuery("#comment-form").ajaxSubmit();
            jQuery("#comment-form")[0].reset();

            jQuery(".comment-form-success").css("display", "block");
            jQuery(".comment-form-fail").css("display", "none");
        }else{
            jQuery(".comment-form-fail").css("display", "block");
            jQuery(".comment-form-success").css("display", "none");
        }
    });

    jQuery(".contact-us-submit").on("click", function(){
 
        input_email = jQuery("#contact_us_email").val();
        console.log("klik 2");

        if(input_email.includes("@")){
            jQuery("#contact-us-form").ajaxSubmit();
            jQuery("#contact-us-form")[0].reset();

            jQuery(".contact-us-success").css("display", "block");
            jQuery(".contact-us-fail").css("display", "none");
        }else{
            jQuery(".contact-us-fail").css("display", "block");
            jQuery(".contact-us-success").css("display", "none");
        }
    });

    search_results = new Array();

    function present_results(search_results, query){
        console.log(search_results[0]);
        jQuery(".search_result_container").empty();
        for(i = 0; i < search_results.length; i++){
            jQuery(".search_result_container").append(`<div class="cetered-vertical w-col w-col-4 search_results_item">
            <div class="archive-post-card p-10 search_result_post_card">
              <a href="${search_results[i].permalink}">
                <img src="${search_results[i].featured_image}" width="300" alt="Featured image" class="link-image">
                <h4 class="link-heading">${search_results[i].title}</h4>
              </a>
              <hr>
              <p>${search_results[i].excerpt}</p>
              <a href="${search_results[i].permalink}" class="link-read-more">Read more &gt;</a>
            </div>`);
        }
        jQuery(".search_results_heading").text("Search resutlts for: " + query);            
     }

    if(document.title == "» Search Results"){
        urlParams = new this.URLSearchParams(window.location.search);
        query = urlParams.get('query');

        jQuery.ajax({
            url: "https://vietnamchronicles.com/wp-json/vnc/v1/search-posts?query=" + query,       
        }).done(function(res){
            search_results = res;
            present_results(search_results, query);
        });
    } 
    jQuery('#input_search_query').on('input', function(){
        let query = jQuery(this).val();
        if( query.length >= 2 ) {

            jQuery.ajax({
                url: "https://vietnamchronicles.com/wp-json/vnc/v1/search-posts?query=" + query,       
            }).done(function(res){
                search_results = res;
                present_results(search_results, query);
            });
        }
    });

    if(document.title == "Vietnam Chronicles"){
        jQuery(".main_slider_left").on("click", function(){
            console.log("Main slider goes left");
            //TODO
          });
  
          jQuery(".main_slider_right").on("click", function(){
            console.log("Main slider goes right");
            //TODO
          });
  
          jQuery(".ig_slider_left").on("click", function(){
            console.log("IG slider goes left");
            ig_image_urls.push(ig_image_urls.shift());
            jQuery(".link-instagram-1").animate({opacity: 0});
            jQuery(".link-instagram-2").animate({opacity: 0});
            jQuery(".link-instagram-3").animate({opacity: 0});

            setTimeout(()=>{
                jQuery(".link-instagram-1").attr("src", ig_image_urls[5]);
                jQuery(".link-instagram-2").attr("src", ig_image_urls[6]);
                jQuery(".link-instagram-3").attr("src", ig_image_urls[7]);
    
                jQuery(".link-instagram-1").animate({opacity: 1});
                jQuery(".link-instagram-2").animate({opacity: 1});
                jQuery(".link-instagram-3").animate({opacity: 1});
                }, 500
            );
            });
  
          jQuery(".ig_slider_right").on("click", function(){
            console.log("IG slider goes right");
            ig_image_urls.unshift(ig_image_urls.pop());
            jQuery(".link-instagram-1").animate({opacity: 0});
            jQuery(".link-instagram-2").animate({opacity: 0});
            jQuery(".link-instagram-3").animate({opacity: 0});

            setTimeout(()=>{
                jQuery(".link-instagram-1").attr("src", ig_image_urls[5]);
                jQuery(".link-instagram-2").attr("src", ig_image_urls[6]);
                jQuery(".link-instagram-3").attr("src", ig_image_urls[7]);
    
                jQuery(".link-instagram-1").animate({opacity: 1});
                jQuery(".link-instagram-2").animate({opacity: 1});
                jQuery(".link-instagram-3").animate({opacity: 1});
                }, 500
            );
          });

          /*let slider_counter = 3001;
          let slider_images = ['https://vietnamchronicles.com/wp-content/themes/vietnam_chronicles/images/slider_00.jpg', 'https://vietnamchronicles.com/wp-content/themes/vietnam_chronicles/images/slider_01.jpg', 'https://vietnamchronicles.com/wp-content/themes/vietnam_chronicles/images/slider_02.jpg'];
          
          function sliderLeft(){
            let current_image = slider_counter % 3;
            slider_counter++;
            let new_image =  "<img class='w3-animate-right slider_image' src=" + slider_images[current_image] + " />";


            jQuery('.slider_prim-img').removeClass('w3-animate-left');
            jQuery('.slider_second-img').removeClass('w3-animate-left');

            jQuery('.slider_prim-img').addClass('w3-animate-right');
            jQuery('.slider_second-img').addClass('w3-animate-right');

            jQuery('.slider_image').remove();
            jQuery('.slider_image-wrapper').append(new_image);
          }

          function sliderRight(){
            let current_image = slider_counter % 3;
            slider_counter--;
            let new_image =  "<img class='w3-animate-right slider_image' src=" + slider_images[current_image] + " />";

            jQuery('.slider_prim-img').removeClass('w3-animate-right');
            jQuery('.slider_second-img').removeClass('w3-animate-right');

            jQuery('.slider_prim-img').addClass('w3-animate-left');
            jQuery('.slider_second-img').addClass('w3-animate-left');

            jQuery('.slider_image').remove();
            jQuery('.slider_image-wrapper').append(new_image);
          }

          jQuery('.slider-arrow.left').on('click', () => {
            sliderLeft();
          });

          jQuery('.slider-arrow.right').on('click', () => {
            sliderRight();
          });

          this.setInterval(function(){
              console.log("Changing main slider image");
                sliderLeft();
          }, 3000);*/
    }

    if(jQuery("meta[name='single'").attr("content")){
        jQuery(window).scroll(function(){
            if(jQuery(window).scrollTop() > 300) {
                jQuery(".div-to-top").css("opacity", 100);
            }else{
                jQuery(".div-to-top").css("opacity", 0);
            }
        });
    }

    jQuery(".vnc-navigtion-btn").on("click", function(){
        jQuery(".navigation-menu").toggle();
    });

    function closeAllSubmenus(){
        if( jQuery(".vnc-navigtion-btn").hasClass("w--open") ){
            jQuery(".navigation-menu").hide();
        };

        jQuery(".navigation-submenu-countries").css("display", "none");
        jQuery(".navigation-submenu-vietnam").css("display", "none");
        jQuery(".navigation-subsubmenu-destinations").css("display", "none");
    }

    jQuery("body").on("click", closeAllSubmenus);

    jQuery(".expandable-item-countries").hover( function(){
        let offsetLeft = jQuery(".expandable-item-countries").offset();
        jQuery(".navigation-submenu").css('left', offsetLeft.left);
        let offsetTop = jQuery('.header').height();
        jQuery(".navigation-submenu").css('top', offsetTop);
        console.log(offsetTop);
        jQuery(".navigation-submenu-countries").css("display", "flex");
        //jQuery(".navigation-submenu").slideDown();
    });

    jQuery(".expandable-item-vietnam").hover(function(){
        jQuery(".navigation-submenu-vietnam").css("display", "flex");
    });

    jQuery(".expandable-item-destinations").hover(function(){
        jQuery(".navigation-subsubmenu-destinations").css("display", "flex");
    });

    var timeout = null;

    jQuery(this.document).on('mousemove', function(){
        if(jQuery('.header_wrapper:hover').length == 0 && jQuery('.navigation-submenu:hover').length == 0){ 
            closeAllSubmenus();
        }

    });

    jQuery(".expand-mobile-menu-vietnam").on('click', function(){
        jQuery(".menu-subitem").toggleClass("hidden");
        jQuery(".menu-subsubitem").addClass("hidden");
    });

    jQuery(".expand-mobile-menu-vietnam-dest").on('click', function(){
        jQuery(".menu-subsubitem").toggleClass("hidden");
    });

    jQuery(".header_item-menu_icon").on('click', function(){
        jQuery(".mobile-navigation-menu").toggleClass("hidden");
        jQuery(".menu-subitem").addClass("hidden");
        jQuery(".menu-subsubitem").addClass("hidden");
    });

    jQuery('.button_expand-content').on('click', () => {
        jQuery('.button_expand-content').toggleClass('fa-plus');
        jQuery('.button_expand-content').toggleClass('fa-minus');

        jQuery('.table_of_contents-body').slideToggle();
    });
    
    jQuery('a.reply-button-wrapper').on('click', e => {
       let selectedId = jQuery(e.currentTarget).data("id");
       jQuery("#comment_parent").val(selectedId);
    });
}