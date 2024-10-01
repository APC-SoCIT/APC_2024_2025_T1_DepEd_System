function invalid_credentials(){
    Swal.fire({
        icon: "error",
        title: "Invalid Credentials",
        text: "Please Input the right credentials!",
      });
};
function deleted(){
    Swal.fire({
        icon: "success",
        title: "Student Deleted",
      });
}
const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});
