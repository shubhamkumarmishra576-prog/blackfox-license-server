<div class="grid grid-cols-2 gap-6">

    {{-- Client --}}
    <div>
        <label class="block mb-2 text-sm font-medium text-slate-300">
            Client
        </label>

        <select name="client_id"
            class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3">

            <option value="">Select Client</option>

            @foreach($clients as $client)
                <option value="{{ $client->id }}">
                    {{ $client->company_name }}
                </option>
            @endforeach

        </select>
    </div>

    {{-- Product --}}
    <div>
        <label class="block mb-2 text-sm font-medium text-slate-300">
            Product
        </label>

        <select name="product_id"
            class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3">

            <option value="">Select Product</option>

            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->product_name }}
                </option>
            @endforeach

        </select>
    </div>

    {{-- License Type --}}
    <div>
        <label class="block mb-2 text-sm font-medium text-slate-300">
            License Type
        </label>

        <select name="license_type"
            class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3">

            <option value="trial">Trial</option>
            <option value="subscription">Subscription</option>
            <option value="perpetual">Perpetual</option>

        </select>
    </div>

    {{-- Activation Mode --}}
    <div>
        <label class="block mb-2 text-sm font-medium text-slate-300">
            Activation Mode
        </label>

        <select name="activation_mode"
            class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3">

            <option value="single">Single Computer</option>
            <option value="group">Group License</option>

        </select>
    </div>

    {{-- Allowed Computers --}}
    <div>
        <label class="block mb-2 text-sm font-medium text-slate-300">
            Allowed Computers
        </label>

        <input
            type="number"
            name="allowed_computers"
            value="1"
            min="1"
            class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3">
    </div>

    {{-- Expiry --}}
    <div>
        <label class="block mb-2 text-sm font-medium text-slate-300">
            Expiry Date
        </label>

        <input
            type="date"
            name="expires_at"
            class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white p-3">
    </div>

</div>

<div class="mt-8 flex justify-end">

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl font-semibold">

        Generate License

    </button>

</div>