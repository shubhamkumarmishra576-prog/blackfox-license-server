<form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">

    @csrf

    @if(isset($product))
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
                Product Name
            </label>

            <input
                type="text"
                name="product_name"
                value="{{ old('product_name', $product->product_name ?? '') }}"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3"
                required>

        </div>

        <div>

            <label class="block mb-2 text-sm text-slate-400">
                Version
            </label>

            <input
                type="text"
                name="version"
                value="{{ old('version', $product->version ?? '1.0.0') }}"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3"
                required>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-6 mt-6">

        <div>

            <label class="block mb-2 text-sm text-slate-400">
                License Type
            </label>

            <select
                name="license_type"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3">

                <option value="subscription">Subscription</option>
                <option value="perpetual">Perpetual</option>
                <option value="trial">Trial</option>

            </select>

        </div>

        <div>

            <label class="block mb-2 text-sm text-slate-400">
                Max Activations
            </label>

            <input
                type="number"
                name="max_activations"
                value="{{ old('max_activations', $product->max_activations ?? 1) }}"
                class="w-full rounded-xl bg-slate-900 border border-slate-700 px-4 py-3">

        </div>

    </div>

    <div class="mt-8">

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl">

            {{ isset($product) ? 'Update Product' : 'Save Product' }}

        </button>

    </div>

</form>