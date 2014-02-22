// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function noop() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

    'use strict';

    // class helper functions from bonzo https://github.com/ded/bonzo

    function classReg( className ) {
      return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    }

    // classList support for class management
    // altho to be fair, the api sucks because it won't accept multiple classes at once
    var hasClass, addClass, removeClass;

    if ( 'classList' in document.documentElement ) {
      hasClass = function( elem, c ) {
        return elem.classList.contains( c );
      };
      addClass = function( elem, c ) {
        elem.classList.add( c );
      };
      removeClass = function( elem, c ) {
        elem.classList.remove( c );
      };
    }
    else {
      hasClass = function( elem, c ) {
        return classReg( c ).test( elem.className );
      };
      addClass = function( elem, c ) {
        if ( !hasClass( elem, c ) ) {
          elem.className = elem.className + ' ' + c;
        }
      };
      removeClass = function( elem, c ) {
        elem.className = elem.className.replace( classReg( c ), ' ' );
      };
    }

    function toggleClass( elem, c ) {
      var fn = hasClass( elem, c ) ? removeClass : addClass;
      fn( elem, c );
    }

    var classie = {
      // full names
      hasClass: hasClass,
      addClass: addClass,
      removeClass: removeClass,
      toggleClass: toggleClass,
      // short names
      has: hasClass,
      add: addClass,
      remove: removeClass,
      toggle: toggleClass
    };

    // transport
    if ( typeof define === 'function' && define.amd ) {
      // AMD
      define( classie );
    } else {
      // browser global
      window.classie = classie;
    }

})( window );

/**
 * uisearch.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
;( function( window ) {

    'use strict';

    // EventListener | @jon_neal | //github.com/jonathantneal/EventListener
    !window.addEventListener && window.Element && (function () {
       function addToPrototype(name, method) {
          Window.prototype[name] = HTMLDocument.prototype[name] = Element.prototype[name] = method;
       }

       var registry = [];

       addToPrototype("addEventListener", function (type, listener) {
          var target = this;

          registry.unshift({
             __listener: function (event) {
                event.currentTarget = target;
                event.pageX = event.clientX + document.documentElement.scrollLeft;
                event.pageY = event.clientY + document.documentElement.scrollTop;
                event.preventDefault = function () { event.returnValue = false };
                event.relatedTarget = event.fromElement || null;
                event.stopPropagation = function () { event.cancelBubble = true };
                event.relatedTarget = event.fromElement || null;
                event.target = event.srcElement || target;
                event.timeStamp = +new Date;

                listener.call(target, event);
             },
             listener: listener,
             target: target,
             type: type
          });

          this.attachEvent("on" + type, registry[0].__listener);
       });

       addToPrototype("removeEventListener", function (type, listener) {
          for (var index = 0, length = registry.length; index < length; ++index) {
             if (registry[index].target == this && registry[index].type == type && registry[index].listener == listener) {
                return this.detachEvent("on" + type, registry.splice(index, 1)[0].__listener);
             }
          }
       });

       addToPrototype("dispatchEvent", function (eventObject) {
          try {
             return this.fireEvent("on" + eventObject.type, eventObject);
          } catch (error) {
             for (var index = 0, length = registry.length; index < length; ++index) {
                if (registry[index].target == this && registry[index].type == eventObject.type) {
                   registry[index].call(this, eventObject);
                }
             }
          }
       });
    })();

    // http://stackoverflow.com/a/11381730/989439
    function mobilecheck() {
        var check = false;
        (function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
    }

    // http://www.jonathantneal.com/blog/polyfills-and-prototypes/
    !String.prototype.trim && (String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, '');
    });

    function UISearch( el, options ) {  
        this.el = el;
        this.inputEl = el.querySelector( 'form > input.sb-search-input' );
        this._initEvents();
    }

    UISearch.prototype = {
        _initEvents : function() {
            var self = this,
                initSearchFn = function( ev ) {
                    ev.stopPropagation();
                    // trim its value
                    self.inputEl.value = self.inputEl.value.trim();

                    if( !classie.has( self.el, 'sb-search-open' ) ) { // open it
                        ev.preventDefault();
                        self.open();
                    }
                    else if( classie.has( self.el, 'sb-search-open' ) && /^\s*$/.test( self.inputEl.value ) ) { // close it
                        ev.preventDefault();
                        self.close();
                    }
                }

            this.el.addEventListener( 'click', initSearchFn );
            this.el.addEventListener( 'touchstart', initSearchFn );
            this.inputEl.addEventListener( 'click', function( ev ) { ev.stopPropagation(); });
            this.inputEl.addEventListener( 'touchstart', function( ev ) { ev.stopPropagation(); } );
        },
        open : function() {
            var self = this;
            classie.add( this.el, 'sb-search-open' );
            // focus the input
            if( !mobilecheck() ) {
                this.inputEl.focus();
            }
            // close the search input if body is clicked
            var bodyFn = function( ev ) {
                self.close();
                this.removeEventListener( 'click', bodyFn );
                this.removeEventListener( 'touchstart', bodyFn );
            };
            document.addEventListener( 'click', bodyFn );
            document.addEventListener( 'touchstart', bodyFn );
        },
        close : function() {
            this.inputEl.blur();
            classie.remove( this.el, 'sb-search-open' );
        }
    }

    // add to global namespace
    window.UISearch = UISearch;

} )( window );

/**
 * Collapsible, jQuery Plugin
 * 
 * Collapsible management.  Optional cookie support using the jQuery Cookie plugin:
 * https://github.com/carhartl/jquery-cookie
 * 
 * Copyright (c) 2010 John Snyder (snyderplace.com)
 * @license http://www.snyderplace.com/collapsible/license.txt New BSD
 * @version 1.2.1
 */
(function($) {
    $.fn.collapsible = function (cmd, arg) {

        //firewalling
        if (!this || this.length < 1) {
            return this;
        }

        //address command requests
        if (typeof cmd == 'string') {
            return $.fn.collapsible.dispatcher[cmd](this, arg);
        }
        
        //return the command dispatcher
        return $.fn.collapsible.dispatcher['_create'](this, cmd);
    };

    //create the command dispatcher
    $.fn.collapsible.dispatcher = {

        //initialized with options
        _create : function(obj, arg) {
            createCollapsible(obj, arg);
        },

        //toggle the element's display
        toggle: function(obj) {
            toggle(obj, loadOpts(obj));
            return obj;
        },

        //show the element
        open: function(obj) {
            open(obj, loadOpts(obj));
            return obj;
        },

        //hide the element
        close: function(obj) {
            close(obj, loadOpts(obj));
            return obj;
        },

        //check if the element is closed
        collapsed: function(obj) {
            return collapsed(obj, loadOpts(obj));
        },

        //open all closed containers
        openAll: function(obj) {
            return openAll(obj, loadOpts(obj));
        },

        //close all opened containers
        closeAll: function(obj) {
            return closeAll(obj, loadOpts(obj));
        }
    };

    //create the initial collapsible
    function createCollapsible(obj, options)
    {

        //build main options before element iteration
        var opts = $.extend({}, $.fn.collapsible.defaults, options);
        
        //store any opened default values to set cookie later
        var opened = [];
        
        //iterate each matched object, bind, and open/close
        obj.each(function() {

            var $this = $(this);
            saveOpts($this, opts);
            
            //bind it to the event
            if (opts.bind == 'mouseenter') {

                $this.bind('mouseenter', function(e) {
                    e.preventDefault(); 
                    toggle($this, opts);
                });
            }
            
            //bind it to the event
            if (opts.bind == 'mouseover') {

                $this.bind('mouseover',function(e) {
                    e.preventDefault(); 
                    toggle($this, opts); 
                });
            }
            
            //bind it to the event
            if (opts.bind == 'click') {

                $this.bind('click', function(e) {
                    e.preventDefault();
                    toggle($this, opts);
                });

            }
            
            //bind it to the event
            if (opts.bind == 'dblclick') {

                $this.bind('dblclick', function(e) {

                    e.preventDefault();
                    toggle($this, opts);
                });

            }
            
            //initialize the collapsibles
            //get the id for this element
            var id = $this.attr('id');
            
            //if not using cookies, open defaults
            if (!useCookies(opts)) {

                //is this collapsible in the default open array?
                var dOpenIndex = inDefaultOpen(id, opts);
                
                //close it if not defaulted to open
                if (dOpenIndex === false) {

                    $this.addClass(opts.cssClose);
                    opts.loadClose($this, opts);

                } else { //its a default open, open it

                    $this.addClass(opts.cssOpen);
                    opts.loadOpen($this, opts);
                    opened.push(id);
                }

            } else { //can use cookies, use them now

                //has a cookie been set, this overrides default open
                if (issetCookie(opts)) {

                    var cookieIndex = inCookie(id, opts);

                    if (cookieIndex === false) {

                        $this.addClass(opts.cssClose);
                        opts.loadClose($this, opts);

                    } else {

                        $this.addClass(opts.cssOpen);
                        opts.loadOpen($this, opts);
                        opened.push(id);
                    }

                } else { //a cookie hasn't been set open defaults, add them to opened array

                    dOpenIndex = inDefaultOpen(id, opts);

                    if (dOpenIndex === false) {

                        $this.addClass(opts.cssClose);
                        opts.loadClose($this, opts);

                    } else {

                        $this.addClass(opts.cssOpen);
                        opts.loadOpen($this, opts);
                        opened.push(id);
                    }
                }
            }
        });
        
        //now that the loop is done, set the cookie
        if (opened.length > 0 && useCookies(opts)) {

            setCookie(opened.toString(), opts);

        } else { //there are none open, set cookie

            setCookie('', opts);
        }
        
        return obj;
    }
    
    //load opts from object
    function loadOpts($this) {
        return $this.data('collapsible-opts');
    }
    
    //save opts into object
    function saveOpts($this, opts) {
        return $this.data('collapsible-opts', opts);
    }
    
    //returns true if object is opened
    function collapsed($this, opts) {
        return $this.hasClass(opts.cssClose);
    }
    
    //hides a collapsible
    function close($this, opts) {

        //give the proper class to the linked element
        $this.addClass(opts.cssClose).removeClass(opts.cssOpen);
        
        //close the element
        opts.animateClose($this, opts);
        
        //do cookies if plugin available
        if (useCookies(opts)) {
            // split the cookieOpen string by ","
            var id = $this.attr('id');
            unsetCookieId(id, opts);
        }
    }
    
    //opens a collapsible
    function open($this, opts) {

        //give the proper class to the linked element
        $this.removeClass(opts.cssClose).addClass(opts.cssOpen);
        
        //open the element
        opts.animateOpen($this, opts);
        
        //do cookies if plugin available
        if (useCookies(opts)) {

            // split the cookieOpen string by ","
            var id = $this.attr('id');
            appendCookie(id, opts);
        }
    }
    
    //toggle a collapsible on an event
    function toggle($this, opts) {

        if (collapsed($this, opts)) {

            //open a closed element
            open($this, opts);

        } else {

            //close an open element
            close($this, opts);
        }
        
        return false;
    }

    //open all closed containers
    function openAll($this, opts) {

        // loop through all container elements
        $.each($this, function(elem, value) {

            if (collapsed($(value), opts)) {

                //open a closed element
                open($(value), opts);
            }
        });
    }

    //close all open containers
    function closeAll($this, opts) {

        $.each($this, function(elem, value) {

            if (!collapsed($(value), opts)) {

                //close an opened element
                close($(value), opts);
            }
        });
    }
    
    //use cookies?
    function useCookies(opts) {

        //return false if cookie plugin not present or if a cookie name is not provided
        if (!$.cookie || opts.cookieName == '') {
            return false;
        }
        
        //we can use cookies
        return true;
    }
    
    //append a collapsible to the cookie
    function appendCookie(value, opts) {

        //check if cookie plugin available and cookiename is set
        if (!useCookies(opts)) {
            return false;
        }
        
        //does a cookie already exist
        if (!issetCookie(opts)) {

            //no lets set one
            setCookie(value, opts);
            return true;
        }
        
        //cookie already exists, is this collapsible already set?
        if (inCookie(value, opts)) { //yes, quit here
            return true;
        }
        
        //get the cookie
        var cookie = decodeURIComponent($.cookie(opts.cookieName));

        //turn it into an array
        var cookieArray = cookie.split(',');
        
        //add it to list
        cookieArray.push(value);
        
        //save it
        setCookie(cookieArray.toString(), opts);
        
        return true;    
    }
    
    //unset a collapsible from the cookie
    function unsetCookieId(value, opts)
    {
        //check if cookie plugin available and cookiename is set
        if (!useCookies(opts)) {
            return false;
        }
        
        //if its not there we don't need to remove from it
        if (!issetCookie(opts)) { //quit here, don't have a cookie 
            return true;
        }
        
        //we have a cookie, is this collapsible in it
        var cookieIndex = inCookie(value, opts);
        if (cookieIndex === false) { //not in the cookie quit here
            return true;
        }
        
        //still here get the cookie
        var cookie = decodeURIComponent($.cookie(opts.cookieName));
        
        //turn it into an array
        var cookieArray = cookie.split(',');
        
        //lets pop it out of the array
        cookieArray.splice(cookieIndex, 1);

        //overwrite
        setCookie(cookieArray.toString(), opts);

        return true
    }
    
    //set a cookie
    function setCookie(value, opts)
    {
        //can use the cookie plugin
        if (!useCookies(opts)) { //no, quit here
            return false;
        }
        
        //cookie plugin is available, lets set the cookie
        $.cookie(opts.cookieName, value, opts.cookieOptions);

        return true;
    }
    
    //check if a collapsible is in the cookie
    function inCookie(value, opts)
    {
        //can use the cookie plugin
        if (!useCookies(opts)) {
            return false;
        }
        
        //if its not there we don't need to remove from it
        if (!issetCookie(opts)) { //quit here, don't have a cookie 
            return false;
        }

        //get the cookie value
        var cookie = decodeURIComponent($.cookie(opts.cookieName));
        
        //turn it into an array
        var cookieArray = cookie.split(',');
        
        //get the index of the collapsible if in the cookie array
        var cookieIndex = $.inArray(value, cookieArray);
        
        //is this value in the cookie array
        if (cookieIndex == -1) { //no, quit here
            return false;
        }
        
        return cookieIndex;
    }
    
    //check if a cookie is set
    function issetCookie(opts)
    {
        //can we use the cookie plugin
        if (!useCookies(opts)) { //no, quit here
            return false;
        }
        
        //is the cookie set
        if ($.cookie(opts.cookieName) === null) { //no, quit here
            return false;
        }
        
        return true;
    }
    
    //check if a collapsible is in the list of collapsibles to be opened by default
    function inDefaultOpen(id, opts)
    {
        //get the array of open collapsibles
        var defaultOpen = getDefaultOpen(opts);
        
        //is it in the default open array
        var index = $.inArray(id, defaultOpen);
        if (index == -1) { //nope, quit here
            return false;
        }
        
        return index;
    }
    
    //get the default open collapsibles and return array
    function getDefaultOpen(opts)
    {
        //initialize an empty array
        var defaultOpen = [];
        
        //if there is a list, lets split it into an array
        if (opts.defaultOpen != '') {
            defaultOpen = opts.defaultOpen.split(',');
        }
        
        return defaultOpen;
    }
    
    // settings
    $.fn.collapsible.defaults = {
        cssClose: 'collapse-close', //class you want to assign to a closed collapsible header
        cssOpen: 'collapse-open', //class you want to assign an opened collapsible header
        cookieName: 'collapsible', //name of the cookie you want to set for this collapsible
        cookieOptions: { //cookie options, see cookie plugin for details
            path: '/',
            expires: 7,
            domain: '',
            secure: ''
        },
        defaultOpen: '', //comma separated list of header ids that you want opened by default
        speed: 'slow', //speed of the slide effect
        bind: 'click', //event to bind to, supports click, dblclick, mouseover and mouseenter
        animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
            elem.next().stop(true, true).slideDown(opts.speed);
        },
        animateClose: function (elem, opts) { //replace the standard slideDown with custom function
            elem.next().stop(true, true).slideUp(opts.speed);
        },
        loadOpen: function (elem, opts) { //replace the default open state with custom function
            elem.next().show();
        },
        loadClose: function (elem, opts) { //replace the default close state with custom function
            elem.next().hide();
        }
    };

})(jQuery);

// Place any jQuery/helper plugins in here.

/*

 scrollup v2.1.1
 Author: Mark Goodyear - http://markgoodyear.com
 Git: https://github.com/markgoodyear/scrollup

 Copyright 2013 Mark Goodyear.
 Licensed under the MIT license
 http://www.opensource.org/licenses/mit-license.php

 Twitter: @markgdyr

 */
!function(a,b,c){a.fn.scrollUp=function(b){a.data(c.body,"scrollUp")||(a.data(c.body,"scrollUp",!0),a.fn.scrollUp.init(b))},a.fn.scrollUp.init=function(d){var e=a.fn.scrollUp.settings=a.extend({},a.fn.scrollUp.defaults,d),f=e.scrollTitle?e.scrollTitle:e.scrollText,g=a("<a/>",{id:e.scrollName,href:"#top",title:f}).appendTo("body");e.scrollImg||g.html(e.scrollText),g.css({display:"none",position:"fixed",zIndex:e.zIndex}),e.activeOverlay&&a("<div/>",{id:e.scrollName+"-active"}).css({position:"absolute",top:e.scrollDistance+"px",width:"100%",borderTop:"1px dotted"+e.activeOverlay,zIndex:e.zIndex}).appendTo("body"),scrollEvent=a(b).scroll(function(){switch(scrollDis="top"===e.scrollFrom?e.scrollDistance:a(c).height()-a(b).height()-e.scrollDistance,e.animation){case"fade":a(a(b).scrollTop()>scrollDis?g.fadeIn(e.animationInSpeed):g.fadeOut(e.animationOutSpeed));break;case"slide":a(a(b).scrollTop()>scrollDis?g.slideDown(e.animationInSpeed):g.slideUp(e.animationOutSpeed));break;default:a(a(b).scrollTop()>scrollDis?g.show(0):g.hide(0))}}),g.click(function(b){b.preventDefault(),a("html, body").animate({scrollTop:0},e.scrollSpeed,e.easingType)})},a.fn.scrollUp.defaults={scrollName:"scrollUp",scrollDistance:300,scrollFrom:"top",scrollSpeed:300,easingType:"linear",animation:"fade",animationInSpeed:200,animationOutSpeed:200,scrollText:"Scroll to top",scrollTitle:!1,scrollImg:!1,activeOverlay:!1,zIndex:2147483647},a.fn.scrollUp.destroy=function(d){a.removeData(c.body,"scrollUp"),a("#"+a.fn.scrollUp.settings.scrollName).remove(),a("#"+a.fn.scrollUp.settings.scrollName+"-active").remove(),a.fn.jquery.split(".")[1]>=7?a(b).off("scroll",d):a(b).unbind("scroll",d)},a.scrollUp=a.fn.scrollUp}(jQuery,window,document);
