<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReminderOS — Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono&display=swap"
        rel="stylesheet">
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
    <div class="shell">

        {{-- ===== SIDEBAR ===== --}}
        <aside class="sidebar">

            <div class="sidebar-logo">
                <div class="logo-box">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z" />
                    </svg>
                </div>
                <span class="logo-text">Reminder<span>OS</span></span>
            </div>

            <div class="nav-group">
                <div class="nav-group-label">Main</div>

                <a href="{{ route('dashboard') }}"
                    class="nav-item {{ !request('tab') && !request('prioritas') && !request('page') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="3" width="7" height="7" rx="1" />
                        <rect x="3" y="14" width="7" height="7" rx="1" />
                        <rect x="14" y="14" width="7" height="7" rx="1" />
                    </svg>
                    Dashboard
                    @if ($terlewat > 0)
                        <span class="nav-badge">{{ $terlewat }}</span>
                    @endif
                </a>

                <a href="{{ route('dashboard', ['tab' => 'upcoming']) }}"
                    class="nav-item {{ request('tab') === 'upcoming' ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    Akan Datang
                </a>

                <a href="{{ route('dashboard', ['tab' => 'selesai']) }}"
                    class="nav-item {{ request('tab') === 'selesai' ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                    </svg>
                    Selesai
                </a>

                <a href="{{ route('dashboard', ['tab' => 'terlewat']) }}"
                    class="nav-item {{ request('tab') === 'terlewat' ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                    </svg>
                    Terlewat
                </a>
            </div>

            <div class="nav-group">
                <div class="nav-group-label">Prioritas</div>

                <a href="{{ route('dashboard', ['prioritas' => 'sangat penting']) }}"
                    class="nav-item {{ request('prioritas') === 'sangat penting' ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                    Sangat Penting
                </a>

                <a href="{{ route('dashboard', ['prioritas' => 'penting']) }}"
                    class="nav-item {{ request('prioritas') === 'penting' ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    Penting
                </a>

                <a href="{{ route('dashboard', ['prioritas' => 'tidak penting']) }}"
                    class="nav-item {{ request('prioritas') === 'tidak penting' ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    Tidak Penting
                </a>
            </div>

            <div class="nav-group">
                <div class="nav-group-label">Sistem</div>

                <a href="{{ route('dashboard', ['page' => 'pengaturan']) }}"
                    class="nav-item {{ request('page') === 'pengaturan' ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3" />
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14" />
                    </svg>
                    Pengaturan
                </a>

                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <div class="nav-item" onclick="document.getElementById('logout-form').submit()"
                        style="cursor:pointer">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Logout
                    </div>
                </form>
            </div>

        </aside>
        {{-- /SIDEBAR --}}

        {{-- ===== AREA KANAN ===== --}}
        <div class="main">

            {{-- NAVBAR --}}
            <nav class="navbar">
                <form method="GET" action="{{ route('dashboard') }}" class="search-box">
                    @if (request('tab'))
                        <input type="hidden" name="tab" value="{{ request('tab') }}">
                    @endif
                    @if (request('prioritas'))
                        <input type="hidden" name="prioritas" value="{{ request('prioritas') }}">
                    @endif
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        placeholder="Cari pengingat...">
                </form>
                <div class="navbar-right">
                    <span class="clock" id="clock-display"></span>
                    <div class="notif-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
                        </svg>
                        @if ($terlewat > 0)
                            <div class="notif-dot"></div>
                        @endif
                    </div>
                    {{-- Avatar / user pill --}}
                    <div class="user-pill">
                        <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                        <span class="user-name-pill">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </nav>

            {{-- KONTEN --}}
            <div class="content">

                @if (request('page') === 'pengaturan')
                    {{-- ============================================================
                 HALAMAN PENGATURAN
                 ============================================================ --}}

                    <div class="page-header">
                        <h2>Pengaturan Akun</h2>
                        <p>Kelola informasi profil, email, dan keamanan akun Anda.</p>
                    </div>

                    {{-- Flash / error --}}
                    @if (session('status'))
                        <div class="alert-bar" id="alert-bar" style="display:flex">
                            <div class="alert-icon">✅</div>
                            <div class="alert-body">
                                <div class="alert-title">{{ session('status') }}</div>
                            </div>
                            <button class="alert-close"
                                onclick="this.parentElement.style.display='none'">&#215;</button>
                        </div>
                    @endif

                    <div class="settings-grid">

                        {{-- ---- KARTU PROFIL ---- --}}
                        <div class="settings-card">
                            <div class="settings-card-header">
                                <div class="settings-card-icon icon-blue">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="settings-card-title">Informasi Profil</div>
                                    <div class="settings-card-sub">Ubah nama dan alamat email</div>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('profile.update') }}" class="settings-form">
                                @csrf
                                @method('PATCH')

                                <div class="field">
                                    <label>Username</label>
                                    <div class="input-with-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                        <input type="text" name="name"
                                            value="{{ old('name', Auth::user()->name) }}"
                                            placeholder="Masukkan username baru...">
                                    </div>
                                    @error('name')
                                        <span class="field-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label>Email</label>
                                    <div class="input-with-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                            <polyline points="22,6 12,13 2,6" />
                                        </svg>
                                        <input type="email" name="email"
                                            value="{{ old('email', Auth::user()->email) }}"
                                            placeholder="Masukkan email baru...">
                                    </div>
                                    @error('email')
                                        <span class="field-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="settings-btn btn-primary">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                        <polyline points="17 21 17 13 7 13 7 21" />
                                        <polyline points="7 3 7 8 15 8" />
                                    </svg>
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>

                        {{-- ---- KARTU PASSWORD ---- --}}
                        <div class="settings-card">
                            <div class="settings-card-header">
                                <div class="settings-card-icon icon-purple">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="settings-card-title">Ubah Password</div>
                                    <div class="settings-card-sub">Pastikan menggunakan password yang kuat</div>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('password.update') }}" class="settings-form">
                                @csrf
                                @method('PUT')

                                <div class="field">
                                    <label>Password Saat Ini</label>
                                    <div class="input-with-icon password-field">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <rect x="3" y="11" width="18" height="11" rx="2"
                                                ry="2" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                        <input type="password" name="current_password" id="current_password"
                                            placeholder="Password saat ini...">
                                        <button type="button" class="toggle-pw"
                                            onclick="togglePassword('current_password', this)">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('current_password')
                                        <span class="field-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label>Password Baru</label>
                                    <div class="input-with-icon password-field">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <rect x="3" y="11" width="18" height="11" rx="2"
                                                ry="2" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                        <input type="password" name="password" id="new_password"
                                            placeholder="Password baru..." oninput="checkStrength(this.value)">
                                        <button type="button" class="toggle-pw"
                                            onclick="togglePassword('new_password', this)">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- Password strength meter --}}
                                    <div class="strength-meter" id="strength-meter" style="display:none">
                                        <div class="strength-bar">
                                            <div class="strength-fill" id="strength-fill"></div>
                                        </div>
                                        <span class="strength-label" id="strength-label"></span>
                                    </div>
                                    @error('password')
                                        <span class="field-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label>Konfirmasi Password Baru</label>
                                    <div class="input-with-icon password-field">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <polyline points="22 4 12 14.01 9 11.01" />
                                        </svg>
                                        <input type="password" name="password_confirmation" id="confirm_password"
                                            placeholder="Ulangi password baru...">
                                        <button type="button" class="toggle-pw"
                                            onclick="togglePassword('confirm_password', this)">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="pw-minchar"
                                        style="font-size:0.7rem;margin-top:3px;display:none;color:#f87171">
                                        ⚠ Password minimal 8 karakter
                                    </div>
                                    @error('password_confirmation')
                                        <span class="field-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="settings-btn btn-purple">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                    Perbarui Password
                                </button>
                            </form>
                        </div>

                        {{-- ---- KARTU INFO AKUN ---- --}}
                        <div class="settings-card settings-card-wide">
                            <div class="settings-card-header">
                                <div class="settings-card-icon icon-green">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="settings-card-title">Ringkasan Akun</div>
                                    <div class="settings-card-sub">Detail informasi akun aktif Anda</div>
                                </div>
                            </div>

                            <div class="account-summary">
                                <div class="account-summary-avatar">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                                <div class="account-summary-info">
                                    <div class="account-info-grid">
                                        <div class="account-info-item">
                                            <span class="account-info-label">Username</span>
                                            <span class="account-info-value">{{ Auth::user()->name }}</span>
                                        </div>
                                        <div class="account-info-item">
                                            <span class="account-info-label">Email</span>
                                            <span class="account-info-value">{{ Auth::user()->email }}</span>
                                        </div>
                                        <div class="account-info-item">
                                            <span class="account-info-label">Bergabung</span>
                                            <span
                                                class="account-info-value">{{ Auth::user()->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="account-info-item">
                                            <span class="account-info-label">Total Pengingat</span>
                                            <span class="account-info-value">{{ $total }}</span>
                                        </div>
                                        <div class="account-info-item">
                                            <span class="account-info-label">Selesai</span>
                                            <span class="account-info-value"
                                                style="color:#4ade80">{{ $selesai }}</span>
                                        </div>
                                        <div class="account-info-item">
                                            <span class="account-info-label">Terlewat</span>
                                            <span class="account-info-value"
                                                style="color:#f87171">{{ $terlewat }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Danger Zone --}}
                            <div class="danger-zone">
                                <div class="danger-zone-title">⚠️ Zona Berbahaya</div>
                                <div class="danger-zone-body">
                                    <div>
                                        <div class="danger-zone-label">Hapus Akun</div>
                                        <div class="danger-zone-sub">Tindakan ini tidak dapat dibatalkan. Semua data
                                            akan dihapus permanen.</div>
                                    </div>
                                    <button type="button" class="btn-danger"
                                        onclick="document.getElementById('delete-modal').style.display='flex'">
                                        Hapus Akun
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- /settings-grid --}}

                    {{-- Delete Account Modal --}}
                    <div id="delete-modal" class="modal-overlay" style="display:none">
                        <div class="modal-box">
                            <div class="modal-icon">🗑️</div>
                            <div class="modal-title">Hapus Akun?</div>
                            <div class="modal-sub">Masukkan password Anda untuk konfirmasi penghapusan akun secara
                                permanen.</div>
                            <form method="POST" action="{{ route('profile.destroy') }}" class="modal-form">
                                @csrf @method('DELETE')
                                <input type="password" name="password" placeholder="Password Anda..." required>
                                @error('password', 'userDeletion')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror
                                <div class="modal-actions">
                                    <button type="button" class="settings-btn btn-ghost"
                                        onclick="document.getElementById('delete-modal').style.display='none'">
                                        Batal
                                    </button>
                                    <button type="submit" class="settings-btn btn-danger-confirm">
                                        Ya, Hapus Akun
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- ============================================================
                 HALAMAN DASHBOARD (default)
                 ============================================================ --}}

                    {{-- Page Header --}}
                    <div class="page-header">
                        <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
                        <p>Semua sistem berjalan lancar. Anda memiliki
                            <span style="color:#f87171;font-weight:600">{{ $terlewat }} pengingat terlewat.</span>
                        </p>
                    </div>

                    {{-- Flash session --}}
                    @if (session('status'))
                        <div class="alert-bar" id="alert-bar" style="display:flex">
                            <div class="alert-icon">&#128276;</div>
                            <div class="alert-body">
                                <div class="alert-title">{{ session('status') }}</div>
                            </div>
                            <button class="alert-close"
                                onclick="this.parentElement.style.display='none'">&#215;</button>
                        </div>
                    @endif

                    {{-- Error validasi --}}
                    @if ($errors->any())
                        <div class="alert-bar"
                            style="display:flex;border-color:rgba(239,68,68,0.4);background:rgba(239,68,68,0.08)">
                            <div class="alert-icon">&#9888;</div>
                            <div class="alert-body">
                                @foreach ($errors->all() as $error)
                                    <div class="alert-title" style="color:#f87171">{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Stats Cards --}}
                    <div class="stats-row">
                        <a href="{{ route('dashboard') }}" class="stat-card card-blue" style="text-decoration:none">
                            <div class="stat-label">Total Pengingat</div>
                            <div class="stat-num">{{ $total }}</div>
                            <div class="stat-sub">semua kategori</div>
                            <div class="stat-deco"></div>
                        </a>
                        <a href="{{ route('dashboard', ['tab' => 'upcoming']) }}" class="stat-card card-indigo"
                            style="text-decoration:none">
                            <div class="stat-label">Akan Datang</div>
                            <div class="stat-num">{{ $upcoming }}</div>
                            <div class="stat-sub">belum jatuh tempo</div>
                            <div class="stat-deco"></div>
                        </a>
                        <a href="{{ route('dashboard', ['tab' => 'selesai']) }}" class="stat-card card-green"
                            style="text-decoration:none">
                            <div class="stat-label">Selesai</div>
                            <div class="stat-num">{{ $selesai }}</div>
                            <div class="stat-sub">berhasil diselesaikan</div>
                            <div class="stat-deco"></div>
                        </a>
                    </div>

                    {{-- Main Grid --}}
                    <div class="main-grid">

                        {{-- PANEL KIRI --}}
                        <div class="panel">
                            <div class="panel-head">
                                <span class="panel-title">
                                    @if (request('tab') === 'upcoming')
                                        Akan Datang
                                    @elseif(request('tab') === 'selesai')
                                        Selesai
                                    @elseif(request('tab') === 'terlewat')
                                        Terlewat
                                    @elseif(request('prioritas'))
                                        Prioritas: {{ ucwords(request('prioritas')) }}
                                    @else
                                        Semua Pengingat
                                    @endif
                                </span>

                                <form method="POST" action="{{ route('jadwal.destroyDone') }}"
                                    id="form-hapus-selesai" style="display:inline">
                                    @csrf @method('DELETE')
                                </form>
                                <span class="panel-action"
                                    onclick="if(confirm('Hapus semua yang selesai?')) document.getElementById('form-hapus-selesai').submit()">
                                    Hapus selesai
                                </span>
                            </div>

                            {{-- Tab Bar --}}
                            <div class="tab-bar">
                                <a href="{{ route('dashboard', array_filter(['cari' => request('cari')])) }}"
                                    class="tab-btn {{ !request('tab') ? 'active' : '' }}">
                                    Semua <span class="tab-count">{{ $total }}</span>
                                </a>
                                <a href="{{ route('dashboard', array_filter(['tab' => 'upcoming', 'cari' => request('cari')])) }}"
                                    class="tab-btn {{ request('tab') === 'upcoming' ? 'active' : '' }}">
                                    Akan Datang <span class="tab-count">{{ $upcoming }}</span>
                                </a>
                                <a href="{{ route('dashboard', array_filter(['tab' => 'selesai', 'cari' => request('cari')])) }}"
                                    class="tab-btn {{ request('tab') === 'selesai' ? 'active' : '' }}">
                                    Selesai <span class="tab-count">{{ $selesai }}</span>
                                </a>
                                <a href="{{ route('dashboard', array_filter(['tab' => 'terlewat', 'cari' => request('cari')])) }}"
                                    class="tab-btn {{ request('tab') === 'terlewat' ? 'active' : '' }}">
                                    Terlewat <span class="tab-count">{{ $terlewat }}</span>
                                </a>
                            </div>

                            {{-- Progress Bar --}}
                            @php $pct = $total > 0 ? round($selesai / $total * 100) : 0; @endphp
                            <div class="progress-section">
                                <div class="prog-label">
                                    <span>Progress penyelesaian</span>
                                    <span>{{ $pct }}%</span>
                                </div>
                                <div class="prog-track">
                                    <div class="prog-fill" style="width:{{ $pct }}%"></div>
                                </div>
                            </div>

                            {{-- List Pengingat --}}
                            <div class="reminder-list">
                                @forelse ($jadwal as $item)
                                    @php
                                        $isOverdue =
                                            $item->status === 'akan datang' &&
                                            $item->due_date &&
                                            $item->due_date < now();
                                        $prioClass =
                                            [
                                                'sangat penting' => 'prio-high',
                                                'penting' => 'prio-medium',
                                                'tidak penting' => 'prio-low',
                                            ][$item->tingkat_kepentingan] ?? 'prio-low';
                                    @endphp

                                    <div
                                        class="reminder-item {{ $item->status === 'selesai' ? 'item-done' : '' }} {{ $isOverdue ? 'item-overdue' : '' }}">
                                        <div class="item-left">

                                            <form method="POST" action="{{ route('jadwal.status', $item->id) }}">
                                                @csrf @method('PATCH')
                                                <button type="submit"
                                                    class="custom-checkbox {{ $item->status === 'selesai' ? 'checked' : '' }}"
                                                    title="{{ $item->status === 'selesai' ? 'Tandai belum selesai' : 'Tandai selesai' }}">
                                                    {{ $item->status === 'selesai' ? '✓' : '' }}
                                                </button>
                                            </form>

                                            <div class="item-info">
                                                <h4 class="item-title">{{ $item->judul_kegiatan }}</h4>
                                                <p class="item-note">{{ $item->catatan ?: 'Tidak ada catatan' }}</p>
                                                <div class="item-meta">
                                                    <span class="meta-time">
                                                        <svg width="12" height="12" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <polyline points="12 6 12 12 16 14" />
                                                        </svg>
                                                        {{ $item->due_date ? $item->due_date->format('H:i d-m-Y') : '-' }}
                                                    </span>
                                                    <span class="badge {{ $prioClass }}">
                                                        {{ strtoupper($item->tingkat_kepentingan) }}
                                                    </span>
                                                    @if ($isOverdue)
                                                        <span class="badge prio-high">TERLEWAT</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-actions">
                                            <form method="POST" action="{{ route('jadwal.destroy', $item->id) }}">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-delete"
                                                    onclick="return confirm('Hapus pengingat ini?')">
                                                    <svg width="18" height="18" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="3 6 5 6 21 6" />
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                @empty
                                    <div class="empty-state">
                                        <p>
                                            @if (request('tab') === 'upcoming')
                                                Tidak ada pengingat yang akan datang.
                                            @elseif(request('tab') === 'selesai')
                                                Belum ada yang selesai.
                                            @elseif(request('tab') === 'terlewat')
                                                Tidak ada yang terlewat. 🎉
                                            @else
                                                Belum ada pengingat. Yuk, buat satu!
                                            @endif
                                        </p>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                        {{-- /PANEL KIRI --}}

                        {{-- PANEL KANAN: Form Tambah --}}
                        <div class="add-panel">
                            <div class="add-head">
                                <div class="add-title">Tambah Pengingat</div>
                                <div class="add-sub">Atur waktu, prioritas, dan detail tugas</div>
                            </div>

                            <div class="form-body">
                                <form method="POST" action="{{ route('jadwal.store') }}">
                                    @csrf

                                    <div class="field">
                                        <label>Judul Kegiatan *</label>
                                        <input type="text" name="judul_kegiatan"
                                            value="{{ old('judul_kegiatan') }}"
                                            placeholder="Contoh: Meeting dengan tim dev...">
                                        @error('judul_kegiatan')
                                            <span style="color:#f87171;font-size:0.72rem">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label>Catatan (opsional)</label>
                                        <textarea name="catatan" placeholder="Detail tambahan..." >{{ old('catatan') }}</textarea>
                                    </div>

                                    <div class="field">
                                        <label>Ingatkan Dalam</label>
                                        <div class="time-row">
                                            <input type="number" name="waktu" value="{{ old('waktu', 30) }}"
                                                min="1">
                                            <select name="satuan_waktu">
                                                <option value="menit"
                                                    {{ old('satuan_waktu') === 'menit' ? 'selected' : '' }}>Menit
                                                </option>
                                                <option value="jam"
                                                    {{ old('satuan_waktu') === 'jam' ? 'selected' : '' }}>Jam
                                                </option>
                                                <option value="hari"
                                                    {{ old('satuan_waktu') === 'hari' ? 'selected' : '' }}>Hari
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label>Tingkat Kepentingan</label>
                                        <div class="priority-row">
                                            <button type="button"
                                                class="p-btn p-low {{ old('tingkat_kepentingan', 'tidak penting') === 'tidak penting' ? 'sel' : '' }}"
                                                id="pb-low" onclick="pilihPrioritas('tidak penting')">
                                                <span class="p-dot"></span>Tidak Penting
                                            </button>
                                            <button type="button"
                                                class="p-btn p-medium {{ old('tingkat_kepentingan') === 'penting' ? 'sel' : '' }}"
                                                id="pb-medium" onclick="pilihPrioritas('penting')">
                                                <span class="p-dot"></span>Penting
                                            </button>
                                            <button type="button"
                                                class="p-btn p-high {{ old('tingkat_kepentingan') === 'sangat penting' ? 'sel' : '' }}"
                                                id="pb-high" onclick="pilihPrioritas('sangat penting')">
                                                <span class="p-dot"></span>Sangat Penting
                                            </button>
                                        </div>
                                        <input type="hidden" name="tingkat_kepentingan" id="priority-input"
                                            value="{{ old('tingkat_kepentingan', 'tidak penting') }}">
                                    </div>

                                    <button type="submit" class="submit-btn">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Tambah Pengingat
                                    </button>
                                </form>
                            </div>

                            {{-- Ringkasan terlewat --}}
                            <div class="overdue-card">
                                <div class="overdue-card-label">&#128680; Terlewat</div>
                                <div class="overdue-card-list">
                                    @forelse($jadwalTerlewat as $ov)
                                        <div class="overdue-item">• {{ $ov->judul_kegiatan }}</div>
                                    @empty
                                        Tidak ada pengingat terlewat
                                    @endforelse
                                </div>
                            </div>

                        </div>
                        {{-- /PANEL KANAN --}}

                    </div>
                    {{-- /main-grid --}}

                @endif
                {{-- end page condition --}}

            </div>
            {{-- /content --}}

        </div>
        {{-- /main --}}

    </div>
    {{-- /shell --}}

    <script>
        /* ---- Dashboard JS ---- */
        function pilihPrioritas(p) {
            document.getElementById('pb-low').classList.toggle('sel', p === 'tidak penting');
            document.getElementById('pb-medium').classList.toggle('sel', p === 'penting');
            document.getElementById('pb-high').classList.toggle('sel', p === 'sangat penting');
            document.getElementById('priority-input').value = p;
        }

        function updateClock() {
            const n = new Date(),
                pad = x => String(x).padStart(2, '0');
            const el = document.getElementById('clock-display');
            if (el) el.textContent =
                `${pad(n.getHours())}:${pad(n.getMinutes())} ${pad(n.getDate())}-${pad(n.getMonth()+1)}-${n.getFullYear()}`;
        }
        updateClock();
        setInterval(updateClock, 1000);

        const alertBar = document.getElementById('alert-bar');
        if (alertBar) setTimeout(() => alertBar.style.display = 'none', 4000);

        /* ---- Settings JS ---- */
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            if (!input) return;
            const isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';
            btn.style.color = isText ? 'var(--muted)' : 'var(--accent)';
        }

        function checkStrength(val) {
            const meter = document.getElementById('strength-meter');
            const fill = document.getElementById('strength-fill');
            const label = document.getElementById('strength-label');
            if (!meter) return;

            if (!val) {
                meter.style.display = 'none';
                return;
            }
            meter.style.display = 'flex';

            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const levels = [{
                    pct: '25%',
                    color: '#ef4444',
                    text: 'Lemah'
                },
                {
                    pct: '50%',
                    color: '#f59e0b',
                    text: 'Cukup'
                },
                {
                    pct: '75%',
                    color: '#3b82f6',
                    text: 'Kuat'
                },
                {
                    pct: '100%',
                    color: '#22c55e',
                    text: 'Sangat Kuat'
                },
            ];
            const lv = levels[Math.max(0, score - 1)];
            fill.style.width = lv.pct;
            fill.style.background = lv.color;
            label.textContent = lv.text;
            label.style.color = lv.color;
        }

        /* Close modal on overlay click */
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('delete-modal');
            if (modal && e.target === modal) modal.style.display = 'none';
        });
    </script>

</body>

</html>
