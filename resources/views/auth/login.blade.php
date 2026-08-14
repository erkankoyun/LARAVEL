<x-layout>
    <x-slot:title>Sign In</x-slot:title>

    <div class="mx-auto w-full max-w-5xl py-4 sm:py-8">
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-slate-200/60 lg:grid lg:grid-cols-[0.9fr_1.1fr]">
            <section class="relative hidden min-h-full overflow-hidden bg-slate-950 p-10 text-white lg:flex lg:flex-col lg:justify-between">
                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-cyan-400/20 blur-3xl"></div>
                <div class="absolute -bottom-24 -left-16 h-72 w-72 rounded-full bg-indigo-500/20 blur-3xl"></div>

                <div class="relative">
                    <div class="mb-10 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-medium text-slate-200">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        AIHAN Cafe Admin & Product System
                    </div>

                    <h1 class="max-w-sm text-4xl font-bold leading-tight tracking-tight">
                        Welcome back to AIHAN Cafe.
                    </h1>
                    <p class="mt-5 max-w-md text-base leading-7 text-slate-300">
                        Sign in to access your account. Administrators can manage products and protected dashboard features.
                    </p>
                </div>

                <div class="relative mt-12 rounded-2xl border border-white/10 bg-white/5 p-5 text-sm leading-6 text-slate-300">
                    Built as a Laravel portfolio project with authentication, authorization, validation and tested CRUD workflows.
                </div>
            </section>

            <section class="p-6 sm:p-10 lg:p-12">
                <div class="mx-auto max-w-lg">
                    <div class="mb-8">
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold uppercase tracking-wider text-slate-600 lg:hidden">
                            AIHAN Cafe
                        </div>
                        <h2 class="text-3xl font-bold tracking-tight text-slate-950">Sign in</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Use your email and password to continue.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login.store', absolute: false) }}" class="space-y-5">
                        @csrf

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-slate-700">Email address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                                   placeholder="name@example.com"
                                   class="input input-bordered h-12 w-full rounded-xl border-slate-300 bg-white px-4 text-slate-900 outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10 @error('email') input-error @enderror">
                            @error('email')
                                <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                   placeholder="Enter your password"
                                   class="input input-bordered h-12 w-full rounded-xl border-slate-300 bg-white px-4 text-slate-900 outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10 @error('password') input-error @enderror">
                            @error('password')
                                <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-600">
                            <input type="checkbox" name="remember" value="1" class="checkbox checkbox-sm rounded border-slate-300">
                            <span>Remember me</span>
                        </label>

                        <button type="submit" class="btn h-12 w-full rounded-xl border-0 bg-slate-950 text-base font-semibold text-white shadow-lg shadow-slate-900/10 hover:bg-slate-800">
                            Sign In
                        </button>
                    </form>

                    <p class="mt-7 text-center text-sm text-slate-500">
                        New to AIHAN Cafe?
                        <a href="{{ route('register', absolute: false) }}" class="font-semibold text-slate-950 underline-offset-4 hover:underline">Create an account</a>
                    </p>
                </div>
            </section>
        </div>
    </div>
</x-layout>
