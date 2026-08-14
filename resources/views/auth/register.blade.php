<x-layout>
    <x-slot:title>Create Account</x-slot:title>

    <div class="auth-wrap">
        <div class="auth-card">
            <aside class="auth-aside">
                <div>
                    <div class="auth-kicker"><span class="eyebrow-dot"></span> Laravel Portfolio Application</div>
                    <h1>Create your AIHAN account.</h1>
                    <p>
                        Register to explore the authenticated experience of this Laravel portfolio application.
                    </p>
                </div>

                <div class="auth-points">
                    <div class="auth-point"><span class="auth-check">✓</span><span>Secure session-based authentication</span></div>
                    <div class="auth-point"><span class="auth-check">✓</span><span>Role-based admin authorization</span></div>
                    <div class="auth-point"><span class="auth-check">✓</span><span>Database-backed product management</span></div>
                </div>
            </aside>

            <section class="auth-form-panel">
                <div class="auth-form-inner">
                    <h2>Create account</h2>
                    <p>Enter your information below. Passwords must contain at least 8 characters.</p>

                    <form method="POST" action="{{ route('register.store', absolute: false) }}" class="form-stack">
                        @csrf

                        <div class="field">
                            <label for="name">Full name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                   placeholder="Your full name" class="@error('name') is-error @enderror">
                            @error('name')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email">Email address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="name@example.com" class="@error('email') is-error @enderror">
                            @error('email')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-grid-2">
                            <div class="field">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" required autocomplete="new-password"
                                       placeholder="Minimum 8 characters" class="@error('password') is-error @enderror">
                                @error('password')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="password_confirmation">Confirm password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                       placeholder="Repeat password">
                            </div>
                        </div>

                        <button type="submit" class="btnx btnx-dark btnx-wide">Create Account</button>
                    </form>

                    <div class="auth-bottom">
                        Already have an account? <a href="{{ route('login', absolute: false) }}">Sign in</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
