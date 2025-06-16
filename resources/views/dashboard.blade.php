<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
        @vite  ('resources/css/dashboard.css')
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='main.js'></script>
<!-- search bar  -->
 <script>
   
    function showEditModal() {
      document.getElementById('editUserModal').classList.remove('hidden');
    }
    function showDeleteConfirm() {
      document.getElementById('deleteConfirmModal').classList.remove('hidden');
    }
    function hideModal(id) {
      document.getElementById(id).classList.add('hidden');
    }
    </script>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-white hidden md:block">
    <div class="p-6 text-2xl font-bold border-b border-gray-700">Dashboard</div>
    <nav class="p-4 space-y-4">
      <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Home</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Invoices</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Clients</a>
      <a href="#" class="block py-2 px-3 rounded hover:bg-gray-700">Reports</a>
      <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="block py-2 px-3 rounded hover:bg-gray-700">Logout</button>
</form>

    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    <div class="flex items-center justify-between mb-4">
      <h1 class="text-2xl font-semibold text-black">@if(Auth::check())
    Welcome, {{ Auth::user()->name }}
@else
    Welcome, Guest!
@endif</h1>
      <button onclick="document.getElementById('addUserModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        + Add User
      </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-800 text-white">
        <tr>
          <th class="text-left px-4 py-2">ID</th>
          <th class="text-left px-4 py-2">Name</th>
          <th class="text-left px-4 py-2">Company</th>
          <th class="text-left px-4 py-2">Due Date</th>
          <th class="text-left px-4 py-2">Amount</th>
          <th class="text-left px-4 py-2">Status</th>
          <th class="text-left px-4 py-2">Description</th>
          <th class="text-left px-4 py-2">Phone</th>
          <th class="text-left px-4 py-2">Email</th>
          <th class="text-left px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody class="text-gray-700 divide-y divide-gray-200">
          <tr>
            <td class="px-4 py-2">1</td>
            <td class="px-4 py-2">Jane Doe</td>
            <td class="px-4 py-2">TechCorp</td>
            <td class="px-4 py-2">2025-06-30</td>
            <td class="px-4 py-2">$1200.00</td>
            <td class="px-4 py-2 text-green-600">Paid</td>
            <td class="px-4 py-2">Monthly subscription</td>
            <td class="px-4 py-2">+1 (555) 123-4567</td>
            <td class="px-4 py-2">jane@techcorp.com</td>
            <td class="px-4 py-2 space-x-2">
              <button onclick="openEditModal({{ $user }})" class="text-blue-600 hover:underline">Edit</button>
              <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <div id="deleteConfirmModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white p-6 rounded-lg w-full max-w-sm">
    <h2 class="text-xl font-bold mb-4">Delete User</h2>
    <p>Are you sure you want to delete this user?</p>
    <div class="flex justify-end space-x-2 mt-6">
      <button onclick="hideModal('deleteConfirmModal')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
      <button  type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
    </div>
  </div>
</div>              </form>>
            </td>
          </tr>
        </tbody>
        
      </table>
    </div>
  </main>
</div>

<div id="addUserModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white p-6 rounded-lg w-full max-w-xl">
    <h2 class="text-xl font-bold mb-4">Add New User</h2>
    <form action="{{ route('users.store') }}" method="POST">
  @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" placeholder="Full Name" class="border p-2 rounded w-full" required />
        <input type="text" placeholder="Company" class="border p-2 rounded w-full" />
        <input type="date" class="border p-2 rounded w-full" />
        <input type="number" placeholder="Amount" class="border p-2 rounded w-full" />
        <select class="border p-2 rounded w-full">
          <option value="Paid">Paid</option>
          <option value="Pending">Pending</option>
          <option value="Overdue">Overdue</option>
        </select>
        <input type="text" placeholder="Phone Number" class="border p-2 rounded w-full" />
        <input type="email" placeholder="Email" class="border p-2 rounded w-full" />
      </div>
      <textarea placeholder="Description" class="border p-2 rounded w-full mt-4"></textarea>
      <div class="flex justify-end space-x-2 mt-4">
        <button type="button" onclick="document.getElementById('addUserModal').classList.add('hidden')" class="px-4 py-2  bg-red-600 border rounded hover:bg-gray-800">
          Cancel
        </button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

<div id="editUserModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white p-6 rounded-lg w-full max-w-xl">
    <h2 class="text-xl font-bold mb-4">Edit User</h2>
    <form id="editForm" method="POST">
  @csrf
  @method('PUT')
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" placeholder="Full Name" class="border p-2 rounded w-full" />
        <input type="text" placeholder="Company" class="border p-2 rounded w-full" />
        <input type="date" class="border p-2 rounded w-full" />
        <input type="number" placeholder="Amount" class="border p-2 rounded w-full" />
        <select class="border p-2 rounded w-full">
          <option value="Paid">Paid</option>
          <option value="Pending">Pending</option>
          <option value="Overdue">Overdue</option>
        </select>
        <input type="text" placeholder="Phone Number" class="border p-2 rounded w-full" />
        <input type="email" placeholder="Email" class="border p-2 rounded w-full" />
      </div>
      <textarea placeholder="Description" class="border p-2 rounded w-full mt-4"></textarea>
      <div class="flex justify-end space-x-2 mt-4">
        <button type="button" onclick="hideModal('editUserModal')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
      </div>
    </form>
  </div>
</div>



</body>

</html>

    