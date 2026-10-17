
<button {{ $attributes->merge(['class' => "rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-1", 'type' => 'submit']) }}>
    {{ $slot }}
</button>