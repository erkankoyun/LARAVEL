<x-layout>
    <x-slot:title>Create Account</x-slot:title>

    <div class="max-w-md mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="card-title text-2xl">Create Account</h1>
                <p class="text-base-content/60">Register for an AIHAN Cafe account.</p>

                <form method="POST" action="{{ route('register.store', absolute: false) }}" class="space-y-4 mt-4">
                    @csrf

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Name</span></div>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                               class="input input-bordered w-full @error('name') input-error @enderror">
                        @error('name')
                            <div class="label"><span class="label-text-alt text-error">{{ $message }}</span></div>
                        @enderror
                    </label>

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Email</span></div>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="input input-bordered w-full @error('email') input-error @enderror">
                        @error('email')
                            <div class="label"><span class="label-text-alt text-error">{{ $message }}</span></div>
                        @enderror
                    </label>

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Password</span></div>
                        <input type="password" name="password" required
                               class="input input-bordered w-full @error('password') input-error @enderror">
                        @error('password')
                            <div class="label"><span class="label-text-alt text-error">{{ $message }}</span></div>
                        @enderror
                    </label>

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Confirm Password</span></div>
                        <input type="password" name="password_confirmation" required class="input input-bordered w-full">
                    </label>

                    <button type="submit" class="btn btn-primary w-full">Create Account</button>
                </form>

                <div class="divider">OR</div>
                <a href="{{ route('login', absolute: false) }}" class="btn btn-outline w-full">Sign In</a>
            </div>
        </div>
    </div>
</x-layout>
