<x-layout>
    <x-slot:heading>
     Login
    </x-slot:heading>
   
<main>
   <form method="POST" action="/login" class="space-y-8">

      @csrf

        <div class="md-6">

            <div class="max-w-sm space-y-6">
                

                
                <x-form-field>
                    <x-form-label for="email">Email</x-form-label>
                    <x-form-input name="email" id="email" :value="old('email')" required />
                    <x-form-error name="email"/>
                </x-form-field>

            </div>

            <div class="max-w-sm space-y-6">
                <x-form-field>
                    <x-form-label for="password">Password</x-form-label>
                    <x-form-input name="password" id="password" type="password"  required/>
                    <x-form-error name="password"/>
                </x-form-field>
            </div>

        </div>


 



      <div class="flex justify-end mt-6 gap-x-6 items-center">
         <a href="/" type= "button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
         <x-form-button>Login</x-form-button>
      </div>
   </form>
</main>

</x-layout>