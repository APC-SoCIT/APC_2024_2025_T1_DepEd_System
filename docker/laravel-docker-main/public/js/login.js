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
function register_error(){
    Swal.fire({
        icon: "error",
        title: "Registration Error",
        text: "Please try again.",
      });
};