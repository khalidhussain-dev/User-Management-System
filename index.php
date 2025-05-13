<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Add this Bootstrap Icons CDN link to your HTML <head> section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }

        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .modal .modal-dialog {
            max-width: 500px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container my-5">
        <h2 class="text-center text-success mb-4">Catálogo de usuarios</h2>

        <!-- Add User Button -->
        <div class="mb-3 text-end">
            <button id="addUserBtn" class="btn btn-success">Agregar usuario</button>
        </div>

        <!-- Add User Form -->
        <div id="addUserForm" class="hidden bg-white p-4 border rounded">
            <h4>Agregar usuario</h4>
            <form id="userForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required maxlength="100">
                </div>
                <div class="mb-3">
                    <label for="company_id" class="form-label">ID de la empresa</label>
                    <input type="number" class="form-control" id="company_id" name="company_id" required>
                </div>
                <div class="mb-3">
                    <label for="role_id" class="form-label">ID de rol</label>
                    <input type="number" class="form-control" id="role_id" name="role_id" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Contraseña (pwd)</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" required maxlength="20">
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>

        <!-- Search Bar -->
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text bg-light">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" id="searchBar" class="form-control" placeholder="Buscar usuarios...">
            </div>
        </div>

        <!-- User Table -->
        <div class="table-container bg-white p-3 border rounded">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa_ID</th>
                        <th>Rol_ID</th>
                        <th>Nombre</th>
                        <th>usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <!-- Dynamic rows will be inserted here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCompanyId" class="form-label">Company ID</label>
                            <input type="number" class="form-control" id="editCompanyId" name="company_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRoleId" class="form-label">Role ID</label>
                            <input type="number" class="form-control" id="editRoleId" name="role_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPwd" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editPwd" name="pwd" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>