(function() {
//  var callbackUrl, suffix;

  KISSY.use('node,ua', function(S, Node, UA) {
    var $, childMenuEl, coords, downMoveEnd, getCoords, getDirection, hideSubmenu, lastPoint, menuEl, menuList, setPaddingLeft, showSubmenu, subMenuEl, subMenuEls;
    $ = S.all;
    menuList = S.all('#J_Menu li');
    subMenuEl = $('#J_subMenus');
    menuEl = $('#J_Menu');
    childMenuEl = $('#J_subMenus dd>a');
    subMenuEls = $('.sub-menu');
    coords = [];
    lastPoint = {};
    downMoveEnd = {};
    getCoords = function() {
      var coords_Arr;
      coords_Arr = [];
      S.each(menuList, function(o, i) {
        var coord;
        coord = {
          'start': $(o).offset().left,
          'end': $(o).offset().left + $(o).width(),
          'elm': $(o)
        };
        return coords_Arr.push(coord);
      });
      return coords_Arr;
    };
    setPaddingLeft = function() {
      coords = getCoords();
      return S.each(menuList, function(o, i) {
        var menuId, menuType, _left, _menu_width;
        menuId = '#' + $(o).attr('data-menu') + ' .first';
        menuType = $(o).attr('data-case');
        if (menuType === 'one') {
          _left = $(o).one('h2').offset().left;
        } else if (menuType === 'two') {
          _left = $('.header-inner nav').offset().left ;
        } else if (menuType === 'three') {
          _menu_width = S.all(window).width() > 1200 ? 590 : 530;
          _left = menuEl.offset().left + menuEl.width() - _menu_width - parseInt($(o).css('padding-right'));
        }else if (menuType === 'four') {
          _left = $('.header-inner nav').offset().left;
        }
        return S.DOM.css(menuId, {
          marginLeft: _left
        });
      });
    };
    showSubmenu = function(li) {
      var menuId, rowEl;
      rowEl = $(li);
      menuId = '#' + rowEl.attr('data-menu');
      rowEl.addClass('selected').siblings().removeClass('selected');
      return $(menuId).addClass('show').siblings().removeClass('show');
    };
    hideSubmenu = function() {
      subMenuEl.all('.sub-menu').removeClass('show');
      return menuList.removeClass('selected');
    };
    getDirection = function(e, xy) {
      var currentPoint, dir;
      currentPoint = {
        x: e.pageX,
        y: e.pageY
      };
      if (xy === 'y') {
        if (lastPoint.y > currentPoint.y) {
          dir = 'up';
        } else if (lastPoint.y < currentPoint.y) {
          dir = 'down';
        } else if (lastPoint.y = currentPoint.y) {
          dir = 'hor';
        }
      } else {
        if (lastPoint.x > currentPoint.x) {
          dir = 'left';
        } else if (lastPoint.x < currentPoint.x) {
          dir = 'right';
        } else if (lastPoint.x = currentPoint.x) {
          dir = 'hor';
        }
      }
      lastPoint = currentPoint;
      return dir;
    };
    if (UA.ie !== 6) {
      setPaddingLeft();
      menuEl.on('mouseleave', function(e) {
        var _e;
        _e = e;
        return setTimeout(function() {
          var _left, _width;
          _left = menuEl.offset().left;
          _width = menuEl.width();
          if (((_e.pageX < _left || _e.pageX > _left + _width) && _e.pageY < 75) || _e.pageY < 0) {
            return hideSubmenu();
          }
        }, 400);
      }).on('mousemove', function(e) {
        var dir, el;
        dir = getDirection(e, 'y');
        if (dir === 'up' || dir === 'hor') {
          el = {};
          return S.each(coords, function(o, i) {
            if (o.start < e.pageX && e.pageX < o.end) {
              return showSubmenu(o.elm);
            }
          });
        } else {
          clearTimeout(downMoveEnd);
          return downMoveEnd = setTimeout(function() {
            if (e < 75) {
              el = {};
              return S.each(coords, function(o, i) {
                if (o.start < e.pageX && e.pageX < o.end) {
                  return showSubmenu(o.elm);
                }
              });
            }
          }, 1800);
        }
      });
      subMenuEls.on('mouseleave', function(e) {
        var dir, _left, _width;
        dir = getDirection(e, 'y');
        if (dir === 'down') {
          hideSubmenu();
        }
        if (dir === 'up') {
          _left = menuEl.offset().left;
          _width = menuEl.width();
          if (e.pageX < _left || e.pageX > _left + _width) {
            return hideSubmenu();
          }
        }
      });
      childMenuEl.on('focus', function() {
        var dataMenu;
        dataMenu = $(S.DOM.parent(this, '.sub-menu')).attr('id');
        return showSubmenu(S.DOM.children(menuEl, 'li[data-menu="' + dataMenu + '"]'));
      });
      S.one(window).on('resize', setPaddingLeft);
      $(document.body).on('click', function(e) {
        if (!S.DOM.contains(subMenuEl, $(e.target)) && !S.DOM.contains(menuEl, $(e.target))) {
          return hideSubmenu();
        }
      });
      return $('#J_Menu li').on('singleTap', function(e) {
        if ($(this).hasClass('selected')) {
          return hideSubmenu();
        }
      });
    } else {
      $('.sub-menu').css({
        'top': 0,
        'filter': 'progid:DXImageTransform.Microsoft.Alpha(Opacity=100) !important',
        'display': 'none'
      });
      $('.first').css({
        'margin-left': '5%'
      });
      menuList.on('mouseenter', function(e) {
        $(this).addClass('selected').siblings().removeClass('selected');
        $('#' + $(this).attr('data-menu')).show();
        return $('#' + $(this).attr('data-menu')).siblings().removeClass('show');
      });
      subMenuEls.on('mouseleave', function() {
        return subMenuEls.hide();
      });
      return $('#J_Logined').on('mouseenter', function() {
        return $(this).addClass('hover');
      }).on('mouseleave', function() {
        return $(this).removeClass('hover');
      });
    }
  });

//  suffix = (function() {
//    var output;
//    if (window.location.host.indexOf('china-ops.') === -1) {
//      return '.com';
//    }
//    output = window.location.host.replace(/^.*\.china-ops/i, '');
//    if (!output) {
//      output = '.com';
//    }
//    return output;
//  })();

  //callbackUrl = location.href.indexOf('account.aliyun' + suffix) < 0 ? '?oauth_callback=' + encodeURIComponent(window.location.href) : '';

  KISSY.use();

}).call(this);
