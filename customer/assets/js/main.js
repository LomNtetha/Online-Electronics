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
        window.location.href = "./includes/delete_wishlist.php?wishlist_id=" +wishlist_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Product End
