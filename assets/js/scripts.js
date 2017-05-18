$(document).ready(function () {
        $(document).on("scroll", onScroll);
        
        //smoothscroll
        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");
            
            $('a').each(function () {
                $(this).parent().removeClass('active');
            })
            $(this).parent().addClass('active');
          
            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top+2
            }, 500, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    });

    function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('#menu-items a').each(function () {
            var currLink = $(this);
            if($(currLink.attr("href"))) {
                var refElement = $(currLink.attr("href"));
                if(typeof(refElement.position()) == 'undefined') return;
                if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                    $('#menu-item ul li').removeClass("active");
                    currLink.parent().addClass("active");
                }
                else{
                    currLink.parent().removeClass("active");
                }
            }
        });
    }

    var images1 = document.querySelectorAll('.parallax-image1');
    var images2 = document.querySelectorAll('.parallax-image2');
    
    function setTopOffset(image, offset) {
      var imageHeight = image.offsetHeight;
      var containerHeight = image.parentNode.offsetHeight;
      var pageHeight = document.documentElement.clientHeight;
      var imageDistance = imageHeight - containerHeight;
      var containerTop = image.parentNode.getBoundingClientRect().top;
      var distancePercent = 0;
      var offsetTop = 0;

      if (containerTop >= pageHeight) {
        distancePercent = 0;
      } else if (containerTop <= -containerHeight) {
        distancePercent = 1;
      } else {
        distancePercent = (containerTop + containerHeight) / (pageHeight + containerHeight);
      }

      offsetTop = distancePercent * imageDistance * offset;
      if(/Mobi/.test(navigator.userAgent) && $('#menu-items').is(":visible")) {
          image.style.transform = 'translate3d(0,' + offsetTop - 10 + 'px, 0)';
      } else {
          image.style.transform = 'translate3d(0,' + offsetTop + 'px, 0)';
      }
    }

    function updateImages() {
      [].forEach.call(images1, function(item) {
          setTopOffset(item, -1)
      });
      [].forEach.call(images2, function(item) {
          setTopOffset(item, -1.3)
      });
    }

    function animate() {
      requestAnimationFrame(animate);
      updateImages();
    }

    animate();

    //Calendar
    var eventModal = document.getElementById('eventModal');
    var openEvent = function(event) {
        eventModal.style.display = "block";
        $('#existingEventTitle').html(event[0]);
        $('#existingEventTitle').attr('href', event[1]);
    }

    
    var settings = {
        EventClick: function(content) { openEvent(content); },
        EventTargetWholeDay: true
    };
    var element = document.getElementById('calendar-container');
    caleandar(element, events, settings);

    function toggleMenu(menu) {
        menu.classList.toggle("change");
        if($('#menu-items').is(":visible")) {
            $('#menu-items').hide();
        }
        else {
            $('#menu-items').show();
        }
    }

    var modal = document.getElementById('myModal');

    $('#back').click( function( ) {
        back();
    });
    $('#close').click( function( ) {
        close();
    });
    $('#closeEvent').click( function() {
        closeEvent();
    });
    $('#closeAddEvent').click( function() {
        closeAddEvent();
    });
    $('#closeChangeUsers').click( function() {
        closeChangeUsers();
    });

    function close() {
        modal.style.display = "none";
    }

    function closeEvent() {
        eventModal.style.display = "none";
    }

    function closeChangeUsers() {
        changeUsersModal.style.display = "none";
    }

    function closeAddEvent() {
        addEventModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        else if (event.target == eventModal) {
            eventModal.style.display = "none";
        }
    }
    
    function openLoginModal() {
        modal.style.display = "block";
    }
    
    function back() {
        $("#buttons").fadeIn(3000);
        $("#loginForm").fadeOut();
        $("#registerForm").fadeOut();
        $("#back").fadeOut();
    }

    function registerFadeIn() {
        $("#buttons").fadeOut();
        $("#registerForm").fadeIn(3000);
        $("#back").fadeIn(3000);
    }

    function loginFadeIn() {
        $("#buttons").fadeOut();
        $("#loginForm").fadeIn(3000);
        $("#back").fadeIn(3000);
    }

    function logout() {
        $("#logout").submit();
    }

    //add events
    $('#eventDate').datepicker({
          format: "dd-mm-yyyy",
          todayBtn: "linked",
          autoclose: true,
          todayHighlight: true,
          container: '#addEventModal modal-content modal-body'
        });
    var submitDisabled = true;
    var numEvents = 0;
    var events = [];
    var event;
    var addEventModal = document.getElementById("addEventModal");
    function openAddEventsModal() {
        addEventModal.style.display = "block";
    }

    $('#addEvent').click( function() {
        event = {};
        event.date = $("#eventDate").datepicker('getDate');
        event.title = $("#eventTitle").val();
        event.link = $("#eventLink").val();
        events.push(event);
        numEvents++;
        $("#eventTitle").val('');
        $("#eventLink").val('');
        $("#eventCounter").html(numEvents);
        if(submitDisabled) {
            $("#submitEvents").removeAttr("disabled");
            $("#eventCounterContainer").show();
            submitDisabled = false;
        }
    });

    $('#submitEvents').click( function() {
        if($("#eventsValue")) {
            if(events) {
                $("#eventsValue").val(JSON.stringify(events));
                $("#addEventsForm").submit();
            }
        }
        else {
            closeAddEvents();
        }
    });

    //change users
    var numChanges = 0;
    var changes = [];
    var change;
    var submitUserDisabled = true;
    
    var changeUsersModal = document.getElementById("changeUsersModal");
    function openChangeUserRolesModal() {
        changeUsersModal.style.display = "block";
    }

    $('#addUser').click( function() {
        change = {};
        change.id = $("#userList").val();
        change.role = $("#roleList").val();
        changes.push(change);
        numChanges++;
        $("#userCounter").html(numChanges);
        if(submitUserDisabled) {
            $("#submitUsers").removeAttr("disabled");
            $("#userCounterContainer").show();
            submitUserDisabled = false;
        }
    });

    $('#submitUsers').click( function() {
        if($("#userChanges")) {
            if(events) {
                $("#userChanges").val(JSON.stringify(changes));
                $("#changeUsersForm").submit();
            }
        }
        else {
            closeChangeUsers();
        }
    });