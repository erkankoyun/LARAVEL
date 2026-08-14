<x-layout>
    <x-slot:title>Sign In</x-slot:title>

    <div class="auth-wrap">
        <div class="auth-card">
            <aside class="auth-aside">
                <div>
                    <div class="auth-kicker"><span class="eyebrow-dot"></span> AIHAN Cafe</div>
                    <h1>Welcome back.</h1>
                    <p>
                        Sign in to continue to the authenticated area of this Laravel portfolio application.
                    </p>
                </div>

                <div class="auth-points">
                    <div class="auth-point"><span class="auth-check">✓</span><span>Secure Laravel authentication flow</span></div>
                    <div class="auth-point"><span class="auth-check">✓</span><span>Protected routes and sessions</span></div>
                    <div class="auth-point"><span class="auth-check">✓</span><span>Admin access controlled by middleware</span></div>
                </div>
            </aside>

            <section class="auth-form-panel">
                <div class="auth-form-inner">
                    <h2>Sign in</h2>
                    <p>Use your account credentials to continue.</p>

                    <form method="POST" action="{{ route('login.store', absolute: false) }}" class="form-stack">
                        @csrf

                        <div class="field">
                            <label for="email">Email address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                                   placeholder="name@example.com" class="@error('email') is-error @enderror">
                            @error('email')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                   placeholder="Your password" class="@error('password') is-error @enderror">
                            @error('password')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="checkbox-row">
                            <input type="checkbox" name="remember" value="1">
                            <span>Remember me</span>
                        </label>

                        <button type="submit" class="btnx btnx-dark btnx-wide">Sign In</button>
                    </form>

                    <div class="auth-bottom">
                        Need an account? <a href="{{ route('register', absolute: false) }}">Create one</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
