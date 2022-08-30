$(document).ready(function() {

    /// Hide And Show Code Starts ///

    $('.nav-toggle1').click(function() {

	    $(".panel-collapse1,.collapse-data1").slideToggle(700, function() {

        if ($(this).css('display') == 'none') {

          $(".hide-show1").html('<i class="fas fa-plus"></i>');

        } else {

          $(".hide-show1").html('<i class="fas fa-minus"></i>');

        }

	    });

    });

    $('.nav-toggle2').click(function() {

	    $(".panel-collapse2,.collapse-data2").slideToggle(700, function() {

        if ($(this).css('display') == 'none') {

          $(".hide-show2").html('<i class="fas fa-plus"></i>');

        } else {

          $(".hide-show2").html('<i class="fas fa-minus"></i>');

        }

	    });

    });


    $('.nav-toggle3').click(function() {

	    $(".panel-collapse3,.collapse-data3").slideToggle(700, function() {

        if ($(this).css('display') == 'none') {

          $(".hide-show3").html('<i class="fas fa-plus"></i>');

        } else {

          $(".hide-show3").html('<i class="fas fa-minus"></i>');

        }

	    });

    });

    /// Hide And Show Code Ends ///

    /// Search Filters code Starts ///

    $(function() {

      $.fn.extend({

        filterTable: function() {

          return this.each(function() {

            $(this).on('keyup', function() {

              var $this = $(this),

                search = $this.val().toLowerCase(),

                target = $this.attr('data-filter'),

                handle = $(target),

                rows = handle.find('li a');

              if (search == '') {

                rows.show();

              } else {

                rows.each(function() {

                  var $this = $(this);

                  $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

                });

                }

              });

          });

        }

      });

      $('[data-action="filter"][id="dev-table-filter"]').filterTable();

    });

    /// Search Filters code Ends ///

});


// Delete Product Script
function DeleteWishlist(wishlist_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./customer/includes/delete_wishlist.php?wishlist_id=" +wishlist_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Product End
