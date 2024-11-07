function invalid_credentials(){
    Swal.fire({
        icon: "error",
        title: "Invalid Credentials",
        text: "Please Input the right credentials!",
      });
};
function registered(){
    Swal.fire({
        icon: "success",
        title: "Registered Successfully!",
      });
}
function schoolAdded(){
  Swal.fire({
      icon: "success",
      title: "School Added!",
    });
}
function schoolUpdated(){
  Swal.fire({
      icon: "success",
      title: "School Updated!",
    });
}
function schoolDeleted(){
  Swal.fire({
      icon: "success",
      title: "School Deleted!",
    });
}
function register_error(){
    Swal.fire({
        icon: "error",
        title: "Registration Error",
        text: "Please try again.",
      });
};