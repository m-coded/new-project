<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Simple toggle for mobile sidebar
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('-translate-x-full');
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Mobile Navbar -->
  <div class="md:hidden flex items-center justify-between bg-blue-900 text-white px-4 py-3">
    <span class="text-xl font-bold">Dashboard</span>
    <button onclick="toggleSidebar()" class="focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside id="sidebar"
           class=" inset-y-0 left-0 z-40 w-64 bg-blue-900 text-white transform transition-transform duration-200 ease-in-out md:translate-x-0 -translate-x-full md:relative md:flex md:flex-col">
      <div class="p-6 text-2xl font-bold border-b border-blue-800">
        Dashboard
      </div>
      <nav class="flex flex-col p-4 space-y-2 flex-grow">
        <a href="#" class="px-4 py-2 rounded hover:bg-blue-700 transition">User List</a>
        <a href="#" class="px-4 py-2 rounded hover:bg-blue-700 transition">Reports</a>
        <a href="#" class="px-4 py-2 rounded hover:bg-blue-700 transition">Settings</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex flex-col flex-1  w-full">
    <!-- Navbar -->
<header class="hidden  w-full md:flex justify-between items-center bg-white shadow px-6 h-16">
  <div class="text-gray-700 font-semibold text-lg">
    Welcome, {{ Auth::user()->name }}
  </div>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button
      type="submit"
      onclick="return confirm('Are you sure you want to log out?');"
      class="text-red-600 hover:text-red-800 font-semibold px-4 py-2 rounded transition"
    >
      Log Out
    </button>
  </form>
</header>

      <main class="p-4 sm:p-6 overflow-x-auto w-full">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
          <h1 class="text-2xl sm:text-3xl font-bold text-blue-900 mb-4 sm:mb-0">User List</h1>
          <a href="{{ route('user.create') }}"
             class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold transition">
            Add User
          </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow w-full">
          <table class="min-w-full w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-900 text-white text-xs uppercase">
              <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Due Date</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Company</th>
                <th class="px-4 py-3">Description</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Amount</th>
                <th class="px-4 py-3">Created</th>
                <th class="px-4 py-3" colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach ($records as $user)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $user->id }}</td>
                <td class="px-4 py-3">{{ $user->name }}</td>
                <td class="px-4 py-3">{{ $user->due_date }}</td>
                <td class="px-4 py-3 text-green-700 font-semibold">{{ $user->account_status }}</td>
                <td class="px-4 py-3">{{ $user->company_name }}</td>
                <td class="px-4 py-3">{{ $user->description }}</td>
                <td class="px-4 py-3">{{ $user->phone_number }}</td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3">{{ $user->amount }}</td>
                <td class="px-4 py-3">{{ $user->created_at }}</td>
                <td class="px-2 py-3 text-center">
                  <a href="{{ route('user.edit', $user->id) }}"
                     class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                    Edit
                  </a>
                </td>
                <td class="px-2 py-3 text-center">
                  <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this user?');"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

</body>
</html>
