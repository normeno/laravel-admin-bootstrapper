(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
      (global.growl = factory());
}(this, (function () { 'use strict';

  /**
   *
   */
  var extend = function (obj) {
    var args = [], len = arguments.length - 1;
    while ( len-- > 0 ) args[ len ] = arguments[ len + 1 ];

    args.forEach(function (source) {
      if (source) {
        for (var prop in source) {
          obj[prop] = source[prop];
        }
      }
    });

    return obj
  };

  /**
   *
   */
  var animationEnd = (function () {
    var el = document.createElement('fake');

    var animations = {
      animation: 'animationend',
      OAnimation: 'oAnimationEnd',
      MozAnimation: 'animationend',
      WebkitAnimation: 'webkitAnimationEnd'
    };

    for (var a in animations) {
      if (el.style[a] !== void 0) {
        return animations[a]
      }
    }
  })();

  /**
   *
   */
  var defineType = function (param, type) {
    if (typeof param === 'string') {
      var opts = {
        text: param,
        type: type
      };
      return opts
    } else if (param !== null && typeof param === 'object') {
      return extend(param, {
        type: type
      })
    } else {
      return { type: type }
    }
  };

  /**
   *
   */
  var types = {
    success: 'growl-alert--success',
    info: 'growl-alert--info',
    warning: 'growl-alert--warning',
    error: 'growl-alert--error'
  };

  /**
   *
   */
  var classes = {
    alertClass: 'growl-alert',
    activeClass: 'growl-alert--active',
    closingClass: 'growl-alert--closing',
    textClass: 'growl-alert__text',
    closeClass: 'growl-alert__close',
    containerClass: 'container-growl-alert'
  };

  /**
   *
   */
  var defaults = {
    activeClass: 'growl-alert--active',
    closingClass: 'growl-alert--closing',
    containerId: 'growl-container',
    type: 'success',
    text: 'Growl Alert',
    closeOnClick: false,
    fadeAway: false,
    fadeAwayTimeout: 5000,
    opened: void 0,
    closed: void 0
  };

  /**
   *
   */
  var template = "\n    <div class=\"growl-alert__close\"></div>\n    <div class=\"growl-alert__icon\"></div>\n    <p class=\"growl-alert__text\"></p>\n";

  var growl = function (opts) {
    var doc = document;
    var config = extend(growl.defaults, opts);

    var $el, fadeAwayTimeout;

    var bootstrap = function () {
      var $container = doc.getElementById(config.containerId);

      if (!$container) {
        $container = createContainer();
      }

      $el = doc.createElement('div');
      $el.setAttribute('class', classes.alertClass);
      $el.innerHTML = template;

      $container.insertBefore($el, $container.firstChild);
      $el.classList.add(types[config.type] || types['success']);

      $el.querySelector(("." + (classes.textClass))).textContent = config.text;

      openMessage();

      if (!!config.closeOnClick) {
        $el.addEventListener('click', function () { return closeMessage(); });
      }

      if (config.fadeAway && !isNaN(config.fadeAwayTimeout)) {
        fadeAwayTimeout = setTimeout(function () {
          closeMessage();
        }, config.fadeAwayTimeout);
      }

      $el.querySelector(("." + (classes.closeClass))).addEventListener('click', function () {
        closeMessage();
      });
    };

    var createContainer = function () {

      var $container = doc.createElement('div');
      $container.setAttribute('id', config.containerId);
      $container.setAttribute('class', classes.containerClass);

      doc.body.appendChild($container);

      return $container
    };

    var openMessage = function () {
      $el.classList.add(classes.activeClass);
      clearTimeout(fadeAwayTimeout);

      if (config.opened instanceof Function) {
        config.opened($el);
      }
    };

    var closeMessage = function () {
      $el.classList.add(classes.closingClass);

      $el.addEventListener(animationEnd, function () {
        $el.parentNode.removeChild($el);

        if (config.closed instanceof Function) {
          config.closed($el);
        }
      });

      clearTimeout(fadeAwayTimeout);
    };

    bootstrap();

    return {
      $element: $el,
      close: closeMessage
    }
  };

  /**
   * Define the default values
   */
  growl.defaults = defaults;

  /**
   * Create a shortcut function for each type of alert
   */
  Object.keys(types).forEach(function (type) {
    growl[type] = function (opts) { return growl(defineType(opts, type)); };
  });

  return growl;

})));