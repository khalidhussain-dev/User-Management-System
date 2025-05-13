$(document).ready(function () {
  // Toggle Add User Form
  $("#addUserBtn").click(function () {
    $("#addUserForm").toggleClass("hidden");
  });

  // Fetch Users
  function fetchUsers() {
    $.ajax({
      url: "get_users.php",
      type: "GET",
      success: function (data) {
        $("#userTable").html(data);
      },
    });
  }
  fetchUsers();

  // Add User
  $("#userForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: "add_user.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        alert(response);
        fetchUsers();
        $("#userForm")[0].reset();
        $("#addUserForm").addClass("hidden");
      },
    });
  });

  // Delete User
  $(document).on("click", ".delete-btn", function () {
    const id = $(this).data("id");
    if (confirm("Are you sure you want to delete this user?")) {
      $.ajax({
        url: "delete_user.php",
        type: "POST",
        data: { id: id },
        success: function (response) {
          alert(response);
          fetchUsers();
        },
      });
    }
  });

  // Edit User
  let editId;
  $(document).on("click", ".edit-btn", function () {
    editId = $(this).data("id");
    $.ajax({
      url: "get_users.php",
      type: "GET",
      success: function (data) {
        const row = $(`button[data-id="${editId}"]`).closest("tr");
        $("#editName").val(row.find("td:nth-child(4)").text());
        $("#editCompanyId").val(row.find("td:nth-child(2)").text());
        $("#editRoleId").val(row.find("td:nth-child(3)").text());
        $("#editUsername").val(row.find("td:nth-child(5)").text());
        $("#editPwd").val(row.find("td:nth-child(6)").text());
        $("#editModal").modal("show");
      },
    });
  });

  $("#editForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: "edit_user.php",
      type: "POST",
      data: {
        id: editId,
        name: $("#editName").val(),
        company_id: $("#editCompanyId").val(),
        role_id: $("#editRoleId").val(),
        username: $("#editUsername").val(),
        pwd: $("#editPwd").val(),
      },
      success: function (response) {
        alert(response);
        fetchUsers();
        $("#editModal").modal("hide");
      },
    });
  });

  // Search Users
  $("#searchBar").on("input", function () {
    const value = $(this).val().toLowerCase();
    $("#userTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});
