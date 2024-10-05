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
        title: "Student Info Deleted",
      });
}
function updated(){
    Swal.fire({
        icon: "success",
        title: "Student Info Updated",
      });
}
function updateError(){
    Swal.fire({
        icon: "error",
        title: "Failed to update Student Information",
        text: "Please try again.",
      });
};
function section_creation_error(){
    Swal.fire({
        icon: "error",
        title: "Failed to create Secction",
        text: "Please try again.",
      });
};
function section_created(){
    Swal.fire({
        icon: "success",
        title: "Section Created!",
      });
}
const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});
