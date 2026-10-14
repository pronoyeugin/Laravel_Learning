<x-layout>
    <x-slot:heading>
     Create Job
    </x-slot:heading>
   
<main>
   <form method="POST" action="/jobs" class="space-y-8">

      @csrf
      <div>                         
         <h2 class="text-sm font-semibold text-slate-900">Create a New Job</h2>
         <p class="mt-1 text-sm text-slate-600">We just need a handful of details from you.</p>
      </div>

      <div class="max-w-sm space-y-6">
         <div>
            <label for="title" class="mb-2 inline-block text-sm font-medium text-slate-900">Title</label>
            <input type="text" id="title" name="title" placeholder="Shift Leader" required
               class="w-full rounded-md border border-slate-300 bg-transparent px-2 py-2 text-sm text-slate-900 placeholder:text-slate-500 focus:border-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-600" />
         </div>
            @error('title')
               <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
            @enderror
         <div>
            <label for="salary" class="mb-2 inline-block text-sm font-medium text-slate-900">Salary</label>
            <input type="number" id="salary" name="salary" placeholder="50000" min="0" step="any" required
               class="w-full rounded-md border border-slate-300 bg-transparent px-2 py-2 text-sm text-slate-900 placeholder:text-slate-500 focus:border-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-600" />
         </div>
            @error('salary')
               <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
            @enderror
      </div>


      <div class="flex justify-end gap-4 border-t border-slate-200 pt-4">

         <div class="">
            <button>Delete</button>
         </div>

         
         <div class="flex justify-end gap-4 >

            <a href="/jobs"
               class="rounded-md px-2 py-2 text-sm font-medium text-slate-900 hover:text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-1">
               Cancel
            </a>
            <div>
                <button type="submit"
                  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-1">
                  Save
               </button>
            </div>


         </div>
        
      </div>
   </form>
</main>

</x-layout>