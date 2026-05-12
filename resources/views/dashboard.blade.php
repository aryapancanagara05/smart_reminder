<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReminderOS — Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono&display=swap" rel="stylesheet">
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
<div class="shell">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar">

        <div class="sidebar-logo">
            <div class="logo-box">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/>
                </svg>
            </div>
            <span class="logo-text">Reminder<span>OS</span></span>
        </div>

        <div class="nav-group">
            <div class="nav-group-label">Main</div>

            <a href="{{ route('dashboard') }}" class="nav-item {{ !request('tab') && !request('prioritas') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard
                @if($terlewat > 0)
                    <span class="nav-badge">{{ $terlewat }}</span>
                @endif
            </a>

            <a href="{{ route('dashboard', ['tab' => 'upcoming']) }}" class="nav-item {{ request('tab') === 'upcoming' ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                Akan Datang
            </a>

            <a href="{{ route('dashboard', ['tab' => 'selesai']) }}" class="nav-item {{ request('tab') === 'selesai' ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
                Selesai
            </a>

            <a href="{{ route('dashboard', ['tab' => 'terlewat']) }}" class="nav-item {{ request('tab') === 'terlewat' ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                    <line x1="12" y1="9" x2="12" y2="13"/>
                    <line x1="12" y1="17" x2="12.01" y2="17"/>
                </svg>
                Terlewat
            </a>
        </div>

        <div class="nav-group">
            <div class="nav-group-label">Prioritas</div>

            <a href="{{ route('dashboard', ['prioritas' => 'sangat penting']) }}" class="nav-item {{ request('prioritas') === 'sangat penting' ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
                Sangat Penting
            </a>

            <a href="{{ route('dashboard', ['prioritas' => 'penting']) }}" class="nav-item {{ request('prioritas') === 'penting' ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                Penting
            </a>

            <a href="{{ route('dashboard', ['prioritas' => 'tidak penting']) }}" class="nav-item {{ request('prioritas') === 'tidak penting' ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                </svg>
                Tidak Penting
            </a>
        </div>

        <div class="nav-group">
            <div class="nav-group-label">Sistem</div>

            <div class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/>
                </svg>
                Pengaturan
            </div>

            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <div class="nav-item" onclick="document.getElementById('logout-form').submit()" style="cursor:pointer">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
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
                @if(request('tab'))      <input type="hidden" name="tab"      value="{{ request('tab') }}"> @endif
                @if(request('prioritas'))<input type="hidden" name="prioritas" value="{{ request('prioritas') }}"> @endif
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari pengingat...">
            </form>
            <div class="navbar-right">
                <span class="clock" id="clock-display"></span>
                <div class="notif-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0"/>
                    </svg>
                    @if($terlewat > 0)
                        <div class="notif-dot"></div>
                    @endif
                </div>
            </div>
        </nav>

        {{-- KONTEN --}}
        <div class="content">

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
                    <button class="alert-close" onclick="this.parentElement.style.display='none'">&#215;</button>
                </div>
            @endif

            {{-- Error validasi --}}
            @if ($errors->any())
                <div class="alert-bar" style="display:flex;border-color:rgba(239,68,68,0.4);background:rgba(239,68,68,0.08)">
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
                <a href="{{ route('dashboard', ['tab' => 'upcoming']) }}" class="stat-card card-indigo" style="text-decoration:none">
                    <div class="stat-label">Akan Datang</div>
                    <div class="stat-num">{{ $upcoming }}</div>
                    <div class="stat-sub">belum jatuh tempo</div>
                    <div class="stat-deco"></div>
                </a>
                <a href="{{ route('dashboard', ['tab' => 'selesai']) }}" class="stat-card card-green" style="text-decoration:none">
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
                            @if(request('tab') === 'upcoming')      Akan Datang
                            @elseif(request('tab') === 'selesai')   Selesai
                            @elseif(request('tab') === 'terlewat')  Terlewat
                            @elseif(request('prioritas'))           Prioritas: {{ ucwords(request('prioritas')) }}
                            @else                                   Semua Pengingat
                            @endif
                        </span>

                        <form method="POST" action="{{ route('jadwal.destroyDone') }}" id="form-hapus-selesai" style="display:inline">
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
                                $isOverdue = $item->status === 'akan datang'
                                             && $item->due_date
                                             && $item->due_date < now();
                                $prioClass = [
                                    'sangat penting' => 'prio-high',
                                    'penting'        => 'prio-medium',
                                    'tidak penting'  => 'prio-low',
                                ][$item->tingkat_kepentingan] ?? 'prio-low';
                            @endphp

                            <div class="reminder-item {{ $item->status === 'selesai' ? 'item-done' : '' }} {{ $isOverdue ? 'item-overdue' : '' }}">
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
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <circle cx="12" cy="12" r="10"/>
                                                    <polyline points="12 6 12 12 16 14"/>
                                                </svg>
                                                {{ $item->due_date ? $item->due_date->format('H:i d-m-Y') : '-' }}
                                            </span>
                                            <span class="badge {{ $prioClass }}">
                                                {{ strtoupper($item->tingkat_kepentingan) }}
                                            </span>
                                            @if($isOverdue)
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
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3 6 5 6 21 6"/>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        @empty
                            <div class="empty-state">
                                <p>
                                    @if(request('tab') === 'upcoming')     Tidak ada pengingat yang akan datang.
                                    @elseif(request('tab') === 'selesai')  Belum ada yang selesai.
                                    @elseif(request('tab') === 'terlewat') Tidak ada yang terlewat. 🎉
                                    @else                                  Belum ada pengingat. Yuk, buat satu!
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
                                <textarea name="catatan" placeholder="Detail tambahan...">{{ old('catatan') }}</textarea>
                            </div>

                            <div class="field">
                                <label>Ingatkan Dalam</label>
                                <div class="time-row">
                                    <input type="number" name="waktu" value="{{ old('waktu', 30) }}" min="1">
                                    <select name="satuan_waktu">
                                        <option value="menit" {{ old('satuan_waktu') === 'menit' ? 'selected' : '' }}>Menit</option>
                                        <option value="jam"   {{ old('satuan_waktu') === 'jam'   ? 'selected' : '' }}>Jam</option>
                                        <option value="hari"  {{ old('satuan_waktu') === 'hari'  ? 'selected' : '' }}>Hari</option>
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
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
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

        </div>
        {{-- /content --}}

    </div>
    {{-- /main --}}

</div>
{{-- /shell --}}

<script>
function pilihPrioritas(p) {
    document.getElementById('pb-low').classList.toggle('sel',    p === 'tidak penting');
    document.getElementById('pb-medium').classList.toggle('sel', p === 'penting');
    document.getElementById('pb-high').classList.toggle('sel',   p === 'sangat penting');
    document.getElementById('priority-input').value = p;
}

function updateClock() {
    const n = new Date(), pad = x => String(x).padStart(2, '0');
    const el = document.getElementById('clock-display');
    if (el) el.textContent =
        `${pad(n.getHours())}:${pad(n.getMinutes())} ${pad(n.getDate())}-${pad(n.getMonth()+1)}-${n.getFullYear()}`;
}
updateClock();
setInterval(updateClock, 1000);

// Auto-hide flash alert
const alertBar = document.getElementById('alert-bar');
if (alertBar) setTimeout(() => alertBar.style.display = 'none', 4000);
</script>

</body>
</html>