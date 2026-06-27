<form action="{{ isset($client) ? route('clients.update', $client) : route('clients.store') }}" method="POST">

    @csrf

    @if(isset($client))
        @method('PUT')
    @endif

    @if ($errors->any())

        <div class="mb-6 rounded-xl bg-red-500/10 border border-red-500 p-4">

            <ul class="text-red-400 space-y-1">

                @foreach ($errors->all() as $error)

                    <li>• {{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="grid grid-cols-2 gap-6">

        <div>

            <label class="block mb-2 text-sm text-slate-400">
                Company Name
            </label>

            <input
                type="text"
                name="company_name"
                value="{{ old('company_name', $client->company_name ?? '') }}"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3"
                required>

        </div>

        <div>

            <label class="block mb-2 text-sm text-slate-400">
                Owner Name
            </label>

            <input
                type="text"
                name="owner_name"
                value="{{ old('owner_name', $client->owner_name ?? '') }}"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3"
                required>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-6 mt-6">

        <div>

            <label class="block mb-2 text-sm text-slate-400">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $client->email ?? '') }}"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3"
                required>

        </div>

        <div>

            <label class="block mb-2 text-sm text-slate-400">
                Phone
            </label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone', $client->phone ?? '') }}"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3">

        </div>

    </div>

    <div class="mt-8">

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl">

            {{ isset($client) ? 'Update Client' : 'Save Client' }}

        </button>

    </div>

</form>