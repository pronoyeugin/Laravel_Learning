<x-layout>
    <x-slot:heading>
     Register
    </x-slot:heading>
   
<main>
   <form method="POST" action="/register" class="space-y-8">

      @csrf

        <div class="md-6">

            <div class="max-w-sm space-y-6">
                <x-form-field>
                    <x-form-label for="first_name">First Name</x-form-label>
                    <x-form-input name="first_name" id="first_name"  required   />
                    <x-form-error name="first_name"/>
                </x-form-field>
                
                <x-form-field>
                    <x-form-label for="last_name">Last Name</x-form-label>
                    <x-form-input name="last_name" id="last_name"  required />
                    <x-form-error name="last_name"/>
                </x-form-field>

                
                <x-form-field>
                    <x-form-label for="email">Email</x-form-label>
                    <x-form-input name="email" id="email"  required />
                    <x-form-error name="email"/>
                </x-form-field>

            </div>

            <div class="max-w-sm space-y-6">
                <x-form-field>
                    <x-form-label for="password">Password</x-form-label>
                    <x-form-input name="password" id="password" type="password"  required/>
                    <x-form-error name="password"/>
                </x-form-field>
                <x-form-field>
                    <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                    <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />
                    <x-form-error name="password_confirmation"/>
                </x-form-field>
            </div>

        </div>


 



      <div class="flex justify-end mt-6 gap-x-6 items-center">
         <a href="/" type= "button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
         <x-form-button>Register</x-form-button>
      </div>
   </form>
</main>

</x-layout>