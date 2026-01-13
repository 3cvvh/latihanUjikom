<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(["resources/css/app.css"])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        brand: {
                            deep: "#0a0a0a",
                            accent: "#6366f1",
                        }
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                    },
                },
            },
        };
    </script>
<style type="text/tailwindcss">
        @layer base {
            body {
                @apply bg-[#0a0a0a] text-slate-200 font-sans antialiased;
            }
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #7c3aed 0%, #3b82f6 100%);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
            filter: brightness(1.1);
        }
        .input-dark {
            @apply bg-white/5 border-white/10 text-white transition-all duration-200;
        }
        .input-dark:focus {
            @apply border-indigo-500/50 ring-1 ring-indigo-500/50 bg-white/10;
        }
        .neon-glow {
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.3);
        }
    </style>
</head>
<body class="min-h-screen overflow-hidden">
@yield("content")
</body>
</html>
