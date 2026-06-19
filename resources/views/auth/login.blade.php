<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    @php $settings = \App\Models\SiteSetting::first(); @endphp
    @if($settings->favicon ?? false)
        <link rel="icon" href="{{ asset('storage/' . $settings->favicon) }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white font-sans">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-sm">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-2">Sign in</h1>
                <p class="text-slate-400">Access your blog content</p>
            </div>

            <!-- Form Card -->
            <div class="bg-slate-900 rounded-xl p-8 border border-slate-800">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-900/30 border border-red-800 rounded-lg">
                        <p class="text-red-200 text-sm">{{ $errors->first('email') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.attempt') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus
                            placeholder="you@example.com"
                            class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                        >
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            placeholder="••••••••"
                            class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                        >
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input 
                            id="remember" 
                            type="checkbox" 
                            name="remember" 
                            value="1"
                            class="w-4 h-4 rounded accent-indigo-500 bg-slate-800 border-slate-700 cursor-pointer"
                        >
                        <label for="remember" class="ml-2.5 text-sm text-slate-400 cursor-pointer">
                            Remember me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition duration-200 mt-6"
                    >
                        Sign in
                    </button>
                </form>

                <!-- Register Link -->
                <p class="text-center text-slate-400 text-sm mt-6">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                        Create one
                    </a>
                </p>
            </div>

            <!-- Footer -->
            <p class="text-center text-slate-500 text-sm mt-8">
                <a href="{{ route('portfolio') }}" class="hover:text-slate-400 transition">
                    Back to portfolio
                </a>
            </p>
        </div>
    </div>
</body>
</html>
