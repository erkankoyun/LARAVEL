<x-layout>
    <x-slot:title>Sign In</x-slot:title>

    <div class="max-w-md mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="card-title text-2xl">Sign In</h1>
                <p class="text-base-content/60">Access your AIHAN Cafe account.</p>

                <form method="POST" action="{{ route('login.store') }}" class="space-y-4 mt-4">
                    @csrf

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Email</span></div>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
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

                    <label class="label cursor-pointer justify-start gap-3">
                        <input type="checkbox" name="remember" value="1" class="checkbox checkbox-sm">
                        <span class="label-text">Remember me</span>
                    </label>

                    <button type="submit" class="btn btn-primary w-full">Sign In</button>
                </form>

                <div class="divider">OR</div>
                <a href="{{ route('register') }}" class="btn btn-outline w-full">Create Account</a>
            </div>
        </div>
    </div>
</x-layout>
