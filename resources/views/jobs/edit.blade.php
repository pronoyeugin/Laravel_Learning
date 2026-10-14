<x-layout>
    <x-slot:heading>
     Edit Job : {{ $job -> title }}
    </x-slot:heading>
   
<main>
   <form method="POST" action="/jobs/{{ $job->id }}" class="space-y-8">

      @csrf
      @method('PATCH')
      <div>                         
         <h2 class="text-sm font-semibold text-slate-900">Update a  Job</h2>
         <p class="mt-1 text-sm text-slate-600">We just need a handful of details from you.</p>
      </div>

      <div class="max-w-sm space-y-6">
         <div>
            <label for="title" class="mb-2 inline-block text-sm font-medium text-slate-900">Title</label>
            <input type="text" 
                    id="title" 
                    name="title" 
                    value="{{ $job->title }}"
                    placeholder="Shift Leader" required
                    class="w-full rounded-md border border-slate-300 bg-transparent px-2 py-2 text-sm text-slate-900 placeholder:text-slate-500 focus:border-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-600"
                />
         </div>
            @error('title')
               <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
            @enderror
         <div>
            <label for="salary" class="mb-2 inline-block text-sm font-medium text-slate-900">Salary</label>
            <input type="number"
                    id="salary"
                    name="salary"
                    value="{{ $job->salary }}"
                    placeholder="50000" min="0" step="any" required
                    class="w-full rounded-md border border-slate-300 bg-transparent px-2 py-2 text-sm text-slate-900 placeholder:text-slate-500 focus:border-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-600"
                />
         </div>
            @error('salary')
               <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
            @enderror
      </div>

      

      <div class="mt-6 flex item-center justify-between gap-x-4">
        
        <div class="flex item-center">
            <button form="delete-form" class="text-red-500 font-bold text-sm">Delete</button>
        </div>

        <div>
            <a href="/jobs/{{ $job->id }}"
                class="rounded-md px-2 py-2 text-sm font-medium text-slate-900 hover:text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-1">
                Cancel
            </a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-1">
                Update
            </button>
        </div>
   </form>
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</main>

</x-layout>