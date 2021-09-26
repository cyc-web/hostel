function setDeleteAction() {
document.frmUser.action = "edit_user.php";
document.frmUser.submit();
}
function setUpdateAction() {
if(confirm("Are you sure want to reserve these rooms?")) {
document.frmUser.action = "reserve.php";
document.frmUser.submit();
}
}
function setEditAction() {
if(confirm("Are you sure want to unlock these rooms?")) {
document.frmUser.action = "unlock.php";
document.frmUser.submit();
}
}
