<form method="GET" action="{{ route('tasks.index') }}" class="mb-6 flex items-center space-x-4">
    <input
        type="text"
        name="name"
        placeholder="Search by name"
        class="bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500"
        value="{{ request('name') }}"
    />
    <select
        name="priority"
        class="bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-500"
    >
        <option value="">All Priorities</option>
        <option value="Normal" {{ request('priority') === 'Normal' ? 'selected' : '' }}>Normal</option>
        <option value="Minor" {{ request('priority') === 'Minor' ? 'selected' : '' }}>Minor</option>
        <option value="Critical" {{ request('priority') === 'Critical' ? 'selected' : '' }}>Critical</option>
    </select>
    <button
        type="submit"
        class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none"
    >
        Search
    </button>
</form>
