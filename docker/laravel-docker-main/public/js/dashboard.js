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
const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});
