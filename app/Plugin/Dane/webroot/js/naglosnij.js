jQuery(document).ready(function () {
    var shoutItBox;

    if ((shoutItBox = jQuery('.shoutIt')).length) {
        shoutItBox.find('.shoutItButton').click(function () {
            var shoutItDialog = shoutItBox.find('.shoutItContent').dialog({
                dialogClass: 'shoutItDialog',
                width: 550,
                title: _mPHeart.translation.LC_DANE_NAGLOSNIJ,
                close: function () {
                    shoutItDialog.parent('.shoutItDialog').remove();
                }
            });
        });

        /* ShoutIt on Twitter - loading Twitter JS*/
        !function () {
            var js, fjs = document.getElementsByTagName("script")[0], p = /^http:/.test(document.location) ? 'http' : 'https';
            if (!document.getElementById("twitter-wjs")) {
                js = document.createElement("script");
                js.id = "twitter-wjs";
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }();

        /* ShoutIt on Wykop - generate wykop iframe *sic* */
        !function () {
            jQuery('.wykop-button').each(function () {
                var wykop_url = jQuery(this).data('href'),
                    wykop_title = jQuery(this).data('title') || encodeURIComponent(document.title),
                    wykop_desc = jQuery(this).data('desc') || '',
                    widget_bg = jQuery(this).data('bg') || 'FFFFFF',
                    widget_type = jQuery(this).data('type') || 'normal',
                    widget_url = 'http://www.wykop.pl/dataprovider/diggerwidget/?url=' + encodeURIComponent(wykop_url) + '&title=' + (wykop_title) + '&desc=' + (wykop_desc) + '&bg=' + (widget_bg) + '&type=' + (widget_type);

                jQuery(this).html('<iframe src="' + widget_url + '" style="border:none;width:72px;height:65px;overflow:hidden;margin:0;padding:0;" frameborder="0" border="0"></iframe>')
            });
        }();

        /* ShoutIt on Facebook - loading Facebook JS*/
        !function () {
            var js = document.createElement("script"),
                fjs = document.getElementsByTagName("script")[0];

            if (document.getElementById("facebook-jssdk")) {
                return;
            }

            js.id = "facebook-jssdk";

            switch (jQuery('body').data('lang')) {
                case 'pol':
                    js.src = "//connect.facebook.net/pl_PL/all.js";
                    break;
                case 'eng':
                    js.src = "//connect.facebook.net/en_EN/all.js";
                    break;
                default:
                    js.src = "//connect.facebook.net/pl_PL/all.js";
                    break;
            }

            fjs.parentNode.insertBefore(js, fjs);

            window.fbAsyncInit = function () {
                FB.init({
                        "appId": _mPHeart.social.facebook.id,
                        "status": true,
                        "cookie": true,
                        "oauth": true,
                        "xfbml": true}
                );
                FB.Canvas.setSize();
                FBApiInit = true;
            };
        }();

        /* Make visibilty shoutIt Button*/
        shoutItBox.removeClass('hide');
    }
});