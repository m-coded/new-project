<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='main.js'></script>
             @vite('resources/css/app.css')


</head>

<body class="bg-gray-100 p-8">
    <h2 class="max-w-2xl mx-auto bg-white shadow-md rounded p-6">
        {{ __('Edit Client') }}
    </h2>
   

    <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('user.update', $client->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $client->name) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-gray-700">Company Name</label>
                <input type="text" name="company_name" value="{{ old('company_name', $client->company_name) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700">Due Date</label>
                <input type="date" name="due_date" value="{{ old('due_date', $client->due_date) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700">Amount</label>
                <input type="number" step="0.01" name="amount" value="{{ old('amount', $client->amount) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700">Account Status</label>
                <select name="account_status" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                    <option value="Active" {{ old('account_status', $client->account_status) == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('account_status', $client->account_status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="Pending" {{ old('account_status', $client->account_status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Suspended" {{ old('account_status', $client->account_status) == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">{{ old('description', $client->description) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" value="{{ old('phone_number', $client->phone_number) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $client->email) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>



            <div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 transition">
                    Update Client
                </button>
            </div>
        </form>
    </div>
</body>

</html>