<div class="container mx-auto px-4 my-8 flex items-start">
    {{--
        @if (session()->has('message'))
        {{ session('message') }}
    @endif
    --}}

    <form class="p-4 border-l-4 border-blue-600 shadow-md mr-8 w-1/4">
        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2">Name</label>
            <input class="p-2 bg-gray-200 outline-none w-full" type="text" wire:model='name'>
            @error('name') <em class="text-xs text-red-700">{{ $message }}</em> @enderror
        </div>

        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2">Email</label>
            <input class="p-2 bg-gray-200 outline-none w-full" type="email" wire:model='email'>
            @error('email') <em class="text-xs text-red-700">{{ $message }}</em> @enderror
        </div>

        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2">Password</label>
            <input class="p-2 bg-gray-200 outline-none w-full"  type="password" wire:model='password'>
            @error('password') <em class="text-xs text-red-700">{{ $message }}</em> @enderror
        </div>

        <button wire:click.prevent='store()' class="bg-blue-500 text-white font-bold w-full rounded shadow p-2">Save</button>
    </form>

    <table class="shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Email</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @foreach ($users as $user)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
