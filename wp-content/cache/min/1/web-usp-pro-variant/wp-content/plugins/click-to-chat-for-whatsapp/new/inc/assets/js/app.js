!function(f){f(function(){var a=window.location.href,o=void 0!==document.title?document.title:"",_=void 0!==screen.width&&1024<screen.width?"no":"yes",s="",c={};function n(t){return c[t]||!1}function i(t,e){c[t]=e;e=JSON.stringify(c);localStorage.setItem("ht_ctc_storage",e)}localStorage.getItem("ht_ctc_storage")&&(c=localStorage.getItem("ht_ctc_storage"),c=JSON.parse(c));var t,r="";if("undefined"!=typeof ht_ctc_chat_var)r=ht_ctc_chat_var,e(),h();else{try{document.querySelector(".ht_ctc_chat_data")&&(t=f(".ht_ctc_chat_data").attr("data-settings"),r=JSON.parse(t))}catch(t){r={}}e(),h()}function e(){var t=document.querySelector(".ht_ctc_chat_data");t&&(s=f(".ht_ctc_chat_data").attr("data-no_number"),t.remove())}function h(){var e;document.dispatchEvent(new CustomEvent("ht_ctc_event_settings",{detail:{ctc:r}})),(e=document.querySelector(".ht-ctc-chat"))&&(document.dispatchEvent(new CustomEvent("ht_ctc_event_chat")),function(t){"yes"==r.schedule?document.dispatchEvent(new CustomEvent("ht_ctc_event_display",{detail:{ctc:r,display_chat:l,ht_ctc_chat:t}})):l(t)}(e),e.addEventListener("click",function(){f(".ht_ctc_chat_greetings_box").length||p(e)}),f(".ht_ctc_chat_greetings_box").length&&f(document).on("click",".ht_ctc_chat_style",function(t){f(".ht_ctc_chat_greetings_box").hasClass("ctc_greetings_opened")?d("user_closed"):u("user_opened")}),f(document).on("click",".ctc_greetings_close_btn",function(t){d("user_closed")}),f(document).on("click",".ht_ctc_chat_greetings_box_link",function(t){t.preventDefault(),!document.querySelector("#ctc_opt")||f("#ctc_opt").is(":checked")||n("g_optin")?p(e):f(".ctc_opt_in").show(400).fadeOut("1").fadeIn("1"),document.dispatchEvent(new CustomEvent("ht_ctc_event_greetings"))}),document.querySelector("#ctc_opt")&&f("#ctc_opt").on("change",function(t){f("#ctc_opt").is(":checked")&&(f(".ctc_opt_in").hide(100),i("g_optin","y"),setTimeout(()=>{p(e)},500))})),f(document).on("click",".ht-ctc-sc-chat",function(){var t=this.getAttribute("data-number"),e=(e=this.getAttribute("data-pre_filled")).replace(/\[url]/gi,a);e=encodeURIComponent(e),r.url_structure_d&&"yes"!==_?window.open("https://web.whatsapp.com/send?phone="+t+"&text="+e,"_blank","noopener"):window.open("https://wa.me/"+t+"?text="+e,"_blank","noopener"),m(this),v(t)}),f(document).on("click",".ctc_chat, #ctc_chat",function(t){p(this),f(this).hasClass("ctc_woo_place")&&t.preventDefault()}),f(document).on("click",'[href="#ctc_chat"]',function(t){t.preventDefault(),p(this)})}function u(t){f(".ctc_cta_stick").remove(),f(".ht_ctc_chat_greetings_box").show(70),f(".ht_ctc_chat_greetings_box").addClass("ctc_greetings_opened").removeClass("ctc_greetings_closed"),i("g_action",t),"user_opened"==t&&i("g_user_action",t)}function d(t){f(".ht_ctc_chat_greetings_box").hide(70),f(".ht_ctc_chat_greetings_box").addClass("ctc_greetings_closed").removeClass("ctc_greetings_opened"),i("g_action",t),"user_closed"==t&&i("g_user_action",t)}function l(t){var e;"yes"==_?"show"==r.dis_m&&((e=document.querySelector(".ht_ctc_desktop_chat"))&&e.remove(),t.style.cssText=r.pos_m+r.css,g(t)):"show"==r.dis_d&&((e=document.querySelector(".ht_ctc_mobile_chat"))&&e.remove(),t.style.cssText=r.pos_d+r.css,g(t))}function g(e){try{f(e).show(parseInt(r.se))}catch(t){e.style.display="block"}var t,c;!function(){if(f(".ht_ctc_chat_greetings_box").length){if(r.g_device){if("yes"!==_&&"mobile"==r.g_device)return f(".ht_ctc_chat_greetings_box").remove();if("yes"==_&&"desktop"==r.g_device)return f(".ht_ctc_chat_greetings_box").remove()}document.dispatchEvent(new CustomEvent("ht_ctc_event_after_chat_displayed",{detail:{ctc:r,greetings_open:u,greetings_close:d}})),r.g_init&&"open"==r.g_init&&"user_closed"!==n("g_user_action")&&u("init"),f(document).on("click",".ctc_greetings, #ctc_greetings",function(t){d("element"),u("element")})}}(),c=f(t=e).hasClass("ht_ctc_entry_animation")?1200:120,setTimeout(function(){t.classList.add("ht_ctc_animation",r.ani)},c),f(".ht-ctc-chat").hover(function(){f(".ht-ctc-chat .ht-ctc-cta-hover").show(120)},function(){f(".ht-ctc-chat .ht-ctc-cta-hover").hide(100)})}function m(t){if(r.analytics&&"session"==r.analytics){if(sessionStorage.getItem("ht_ctc_analytics"))return;sessionStorage.setItem("ht_ctc_analytics","done")}document.dispatchEvent(new CustomEvent("ht_ctc_event_analytics"));var e=r.number;t.classList.contains("ht-ctc-sc")&&(e=t.getAttribute("data-number"));var c="Click to Chat for WhatsApp",n="chat: "+e,t=o+", "+a;(r.ga||r.ga4)&&("undefined"!=typeof gtag?r.ga4?gtag("event","click to chat",{number:e,title:o,url:a}):gtag("event",n,{event_category:c,event_label:t}):"undefined"!=typeof ga&&void 0!==ga.getAll?ga.getAll()[0].send("event",c,n,t):"undefined"!=typeof __gaTracker&&__gaTracker("send","event",c,n,t)),"undefined"!=typeof dataLayer&&dataLayer.push({event:"Click to Chat",type:"chat",number:e,title:o,url:a,event_category:c,event_label:t,event_action:n}),r.ads&&"undefined"!=typeof gtag_report_conversion&&gtag_report_conversion(),r.fb&&"undefined"!=typeof fbq&&fbq("trackCustom","Click to Chat by HoliThemes",{Category:"Click to Chat for WhatsApp",return_type:"chat",ID:e,Title:o,URL:a})}function p(t){document.dispatchEvent(new CustomEvent("ht_ctc_event_number",{detail:{ctc:r}}));var e,c,n=r.number,o=r.pre_filled;t.hasAttribute("data-number")&&(n=t.getAttribute("data-number")),t.hasAttribute("data-pre_filled")&&(o=t.getAttribute("data-pre_filled")),o=o.replace(/\[url]/gi,a),o=encodeURIComponent(decodeURI(o)),""!=n?(e="https://wa.me/"+n+"?text="+o,c=r.url_target_d||"_blank","yes"==_?(r.url_structure_m&&(e="whatsapp://send?phone="+n+"&text="+o,c="_self"),r.custom_link_m&&""!==r.custom_link_m&&(e=r.custom_link_m)):(r.url_structure_d&&(e="https://web.whatsapp.com/send?phone="+n+"&text="+o),r.custom_link_d&&""!==r.custom_link_d&&(e=r.custom_link_d)),o="popup"==c?"scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=788,height=514,left=100,top=100":"noopener",window.open(e,c,o),m(t),v(n)):f(".ht-ctc-chat").html(s)}function v(t){var e,c;r.hook_url&&(e=r.hook_url,c={},r.hook_v&&(c=r.hook_v),document.dispatchEvent(new CustomEvent("ht_ctc_event_hook",{detail:{ctc:r,number:t}})),e=r.hook_url,c=r.hook_v,data=JSON.stringify(c),f.ajax({url:e,type:"POST",mode:"no-cors",data:data,success:function(t){}}))}})}(jQuery)