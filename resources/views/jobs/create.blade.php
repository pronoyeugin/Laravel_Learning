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
         <x-form-field>
            <x-form-label for="title">Title</x-form-label>
            <x-form-input name="title" id="title"  placeholder="CEO" />
            <x-form-error name="title"/>
         </x-form-field>


         <x-form-field>
            <x-form-label for="salary">Salary</x-form-label>
            <x-form-input name="salary" id="salary"  placeholder="$50,000 USD" />
            <x-form-error name="salary"/>
         </x-form-field>


      </div>


      <div class="flex justify-end mt-6 gap-x-6 items-center">
         <button type= "button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
         <x-form-button>Save</x-form-button>
      </div>
   </form>
</main>

</x-layout>