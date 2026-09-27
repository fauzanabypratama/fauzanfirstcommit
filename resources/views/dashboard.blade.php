<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- MATIKAN CACHE BROWSER -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">

  <title>Inventaris TIK - Diskominfo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <style>
    :root{
      --ink:#0f172a;        /* deep navy */
      --navy:#1e3a5f;       /* header navy */
      --navy-2:#312e81;     /* indigo */
      --accent:#3b82f6;     /* blue-500 */
      --accent-soft:#60a5fa;/* blue-400 */
      --paper:#f8fafc;      /* content background */
      --line:#e2e8f0;       /* hairline */
    }
    body{ font-family:'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; }
    .font-display{ font-family:'Lora', Georgia, serif; }

    .bg-paper{ background-color:var(--paper); }
    .bg-navy{ background-color:var(--ink); }

    .seal{
      background:
        radial-gradient(circle at 30% 30%, rgba(255,255,255,.25), rgba(255,255,255,0) 60%),
        linear-gradient(160deg, var(--accent-soft), var(--navy-2) 70%);
      box-shadow: inset 0 0 0 1px rgba(255,255,255,.35), 0 4px 14px rgba(0,0,0,.25);
    }

    .nav-active{
      background: linear-gradient(90deg, rgba(59,130,246,.25), rgba(99,102,241,.1));
      border-left: 3px solid var(--accent);
      color: #fff !important;
    }

    .nav-inactive{
      color: #cbd5e1;
      border-left: 3px solid transparent;
    }

    .nav-inactive:hover{
      background: rgba(255,255,255,.05);
      color: #fff;
    }

    .hairline{ border-color: rgba(255,255,255,.1); }

    .hero-pattern{
      background-image:
        radial-gradient(circle at 92% 8%, rgba(59,130,246,.35), transparent 42%),
        radial-gradient(circle at 8% 95%, rgba(99,102,241,.3), transparent 45%),
        repeating-linear-gradient(135deg, rgba(255,255,255,.05) 0px, rgba(255,255,255,.05) 1px, transparent 1px, transparent 14px);
    }

    .avatar-badge{
      background: linear-gradient(160deg, var(--accent-soft), var(--navy-2));
    }

    .logout-btn{
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.16);
      color:#cbd5e1;
      transition: all .15s ease;
    }
    .logout-btn:hover{
      background: rgba(239,68,68,.2);
      border-color: rgba(239,68,68,.45);
      color:#fecaca;
    }
  </style>
</head>
<body class="bg-paper font-sans flex h-screen overflow-hidden text-slate-800">

  <!-- SIDEBAR -->
  <aside class="w-64 bg-navy text-white flex flex-col justify-between shadow-2xl relative flex-shrink-0">
    <div class="absolute inset-y-0 right-0 w-px bg-gradient-to-b from-transparent via-[var(--accent)]/40 to-transparent"></div>

    <div>
      <!-- Brand Logo -->
      <div class="p-6 border-b hairline flex items-center space-x-3">
        <div class="w-11 h-11 seal rounded-xl flex items-center justify-center text-white font-bold text-lg">
          🏛️
        </div>
        <div>
          <h1 class="font-display font-bold text-sm tracking-wide text-white leading-tight">DISKOMINFO</h1>
          <p class="text-[10px] text-[var(--accent-soft)] font-semibold tracking-[0.15em] uppercase mt-0.5">Inventaris TIK</p>
        </div>
      </div>

      <!-- Navigasi Menu Sidebar -->
      <nav class="mt-8 px-3 space-y-1.5 text-sm font-medium">
        <button id="nav-dashboard" onclick="gantiTab('dashboard')" class="w-full text-left nav-active flex items-center space-x-3 px-4 py-3 rounded-r-lg rounded-l-sm font-semibold transition-all cursor-pointer">
          <span class="material-symbols-outlined text-lg">dashboard</span>
          <span class="tracking-wide">Dashboard</span>
        </button>

        <button id="nav-barang" onclick="gantiTab('barang')" class="w-full text-left nav-inactive flex items-center space-x-3 px-4 py-3 rounded-r-lg rounded-l-sm font-semibold transition-all cursor-pointer">
          <span class="material-symbols-outlined text-lg">inventory_2</span>
          <span class="tracking-wide">Daftar Barang</span>
        </button>
      </nav>
    </div>

    <!-- User Profile & Logout -->
    <div class="p-4 bg-black/20 border-t hairline space-y-3">
      <div class="flex items-center space-x-3 px-1">
        <div class="w-9 h-9 rounded-lg avatar-badge text-white font-extrabold flex items-center justify-center text-xs shadow-sm">
          {{ strtoupper(substr(Auth::user()->username ?? 'U', 0, 2)) }}
        </div>
        <div class="text-xs overflow-hidden">
          <p class="font-bold text-slate-100 truncate">{{ Auth::user()->username ?? 'User' }}</p>
          <p class="text-[10px] text-slate-400 tracking-wide">Petugas Inventaris</p>
        </div>
      </div>

      <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
        @csrf
        <button type="submit" class="logout-btn w-full py-2.5 px-3 rounded-lg font-bold text-xs flex items-center justify-center space-x-1.5 cursor-pointer">
          <span class="material-symbols-outlined text-sm">logout</span>
          <span>Keluar</span>
        </button>
      </form>
    </div>
  </aside>

  <!-- KONTEN UTAMA -->
  <div class="flex-1 flex flex-col overflow-y-auto">
    <!-- TOPBAR -->
    <header class="bg-white/90 backdrop-blur border-b border-[var(--line)] px-8 py-5 flex items-center justify-between shadow-sm sticky top-0 z-20">
      <div>
        <h2 id="topbar-title" class="font-display text-lg font-bold text-[var(--ink)] tracking-tight">Dashboard</h2>
        <p class="text-xs text-slate-500 mt-0.5">Dinas Komunikasi dan Informatika</p>
      </div>
    </header>

    <main class="p-8 space-y-6">
      @if (session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl shadow-sm flex items-center space-x-2">
          <span class="material-symbols-outlined text-emerald-600 text-sm">check_circle</span>
          <p class="text-xs font-semibold text-emerald-800">{{ session('success') }}</p>
        </div>
      @endif

      <!-- ==================== TAB 1: DASHBOARD ==================== -->
      <div id="section-dashboard" class="space-y-6">
        <!-- Hero Banner -->
        <div class="hero-pattern bg-gradient-to-br from-[var(--navy-2)] via-[var(--navy)] to-[var(--ink)] rounded-2xl p-7 text-white shadow-xl border-l-4 border-[var(--accent)] flex items-center justify-between overflow-hidden">
          <div class="space-y-1.5 relative z-10">
            <h3 class="font-display text-2xl font-bold tracking-wide">Selamat Datang, {{ Auth::user()->username ?? 'User' }}</h3>
            <p class="text-xs text-blue-200/80">Pantau seluruh aset teknologi informasi & komunikasi Diskominfo di sini.</p>
          </div>
          <div class="hidden sm:flex w-14 h-14 bg-white/10 backdrop-blur rounded-2xl items-center justify-center text-2xl border border-white/10 relative z-10">
            🏛️
          </div>
        </div>

        <!-- 4 Kartu Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
          <!-- Total Unit -->
          <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Perangkat</p>
              <h4 class="text-2xl font-extrabold text-slate-800 mt-1">{{ number_format($totalUnit ?? 0) }} <span class="text-xs font-semibold text-slate-400">Unit</span></h4>
              <p class="text-[11px] text-blue-600 font-medium mt-1">{{ $totalJenis ?? 0 }} Macam TIK</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
              <span class="material-symbols-outlined">devices</span>
            </div>
          </div>

          <!-- Kondisi Baik -->
          <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kondisi Baik</p>
              <h4 class="text-2xl font-extrabold text-emerald-600 mt-1">{{ number_format($totalBaik ?? 0) }} <span class="text-xs font-semibold text-slate-400">Unit</span></h4>
              <p class="text-[11px] text-emerald-600 font-medium mt-1">Siap Digunakan</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
              <span class="material-symbols-outlined">check_circle</span>
            </div>
          </div>

          <!-- Perangkat Rusak -->
          <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Perangkat Rusak</p>
              <h4 class="text-2xl font-extrabold text-amber-600 mt-1">{{ number_format($totalRusak ?? 0) }} <span class="text-xs font-semibold text-slate-400">Unit</span></h4>
              <p class="text-[11px] text-slate-500 font-medium mt-1">Perlu Servis</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
              <span class="material-symbols-outlined">build</span>
            </div>
          </div>

          <!-- Total Nilai Aset -->
          <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Nilai Aset</p>
              <h4 class="text-lg font-extrabold text-indigo-900 mt-1">Rp {{ number_format($totalNilaiInventaris ?? 0, 0, ',', '.') }}</h4>
              <p class="text-[11px] text-indigo-500 font-medium mt-1">Valuasi Inventaris</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
              <span class="material-symbols-outlined">payments</span>
            </div>
          </div>
        </div>
      </div>

      <!-- ==================== TAB 2: DAFTAR BARANG (CRUD) ==================== -->
      <div id="section-barang" class="hidden space-y-4">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden space-y-4 p-6">
          
          <!-- Bar Cari, Filter, dan Tombol Tambah Perangkat -->
          <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3">
            <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
              
              <div class="relative flex-1 sm:w-64">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, merek, lokasi..." 
                  class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="material-symbols-outlined absolute left-2.5 top-2.5 text-slate-400 text-sm">search</span>
              </div>

              <select name="kategori" class="text-xs py-2 px-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Kategori</option>
                @foreach ($daftarKategori as $kat)
                  <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                @endforeach
              </select>

              <select name="kondisi" class="text-xs py-2 px-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Kondisi</option>
                <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak Ringan" {{ request('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ request('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
              </select>

              <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white text-xs font-semibold px-4 py-2 rounded-xl transition-all cursor-pointer">Filter</button>
              
              @if(request()->anyFilled(['search', 'kategori', 'kondisi']))
                <a href="{{ route('dashboard') }}" class="text-xs text-rose-600 hover:underline font-semibold">Reset</a>
              @endif
            </form>

            <button onclick="bukaModalTambah()" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl flex items-center justify-center gap-1.5 shadow-sm transition-all cursor-pointer flex-shrink-0">
              <span class="material-symbols-outlined text-sm">add</span>
              <span>Tambah Perangkat</span>
            </button>
          </div>

          <!-- Tabel Data CRUD -->
          <div class="overflow-x-auto border border-slate-100 rounded-xl">
            <table class="w-full text-left text-xs text-slate-600">
              <thead class="bg-slate-50 uppercase tracking-wider text-[11px] text-slate-500 border-b border-slate-100">
                <tr>
                  <th class="p-4 pl-5">Perangkat</th>
                  <th class="p-4">Kategori</th>
                  <th class="p-4">Merek</th>
                  <th class="p-4">Jumlah</th>
                  <th class="p-4">Harga / Unit</th>
                  <th class="p-4">Kondisi</th>
                  <th class="p-4">Lokasi</th>
                  <th class="p-4">Tahun</th>
                  <th class="p-4 pr-5 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                @forelse ($perangkats as $item)
                  <tr class="hover:bg-slate-50/70 transition-all">
                    <td class="p-4 pl-5 font-bold text-slate-800">{{ $item->nama_perangkat }}</td>
                    <td class="p-4">{{ $item->kategori }}</td>
                    <td class="p-4">{{ $item->merek }}</td>
                    <td class="p-4 font-bold text-slate-800">{{ number_format($item->jumlah) }} Unit</td>
                    <td class="p-4">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                    <td class="p-4">
                      @if ($item->kondisi == 'Baik')
                        <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full font-semibold text-[10px]">Baik</span>
                      @elseif ($item->kondisi == 'Rusak Ringan')
                        <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-full font-semibold text-[10px]">Rusak Ringan</span>
                      @else
                        <span class="px-2.5 py-1 bg-red-100 text-red-800 rounded-full font-semibold text-[10px]">Rusak Berat</span>
                      @endif
                    </td>
                    <td class="p-4 text-slate-500">{{ $item->lokasi_penyimpanan }}</td>
                    <td class="p-4">{{ $item->tahun_pengadaan }}</td>
                    <td class="p-4 pr-5">
                      <div class="flex items-center justify-center gap-1.5">
                        <!-- Detail -->
                        <button onclick='bukaModalDetail(@json($item))' class="p-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg cursor-pointer" title="Detail">
                          <span class="material-symbols-outlined text-sm">visibility</span>
                        </button>
                        <!-- Edit -->
                        <button onclick='bukaModalEdit(@json($item))' class="p-1.5 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg cursor-pointer" title="Edit">
                          <span class="material-symbols-outlined text-sm">edit</span>
                        </button>
                        <!-- Hapus -->
                        <form action="{{ route('perangkat.delete', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data perangkat ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="p-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-lg cursor-pointer" title="Hapus">
                            <span class="material-symbols-outlined text-sm">delete</span>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="9" class="text-center py-8 text-slate-400">Belum ada data perangkat TIK ditemukan.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div class="pt-2">
            {{ $perangkats->links() }}
          </div>
        </div>
      </div>

    </main>
  </div>

  <!-- MODAL FORM (TAMBAH / EDIT) -->
  <div id="modalForm" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h3 id="modalTitle" class="font-display font-bold text-base text-slate-800">Tambah Perangkat TIK</h3>
        <button onclick="tutupModal('modalForm')" class="text-slate-400 hover:text-slate-600 cursor-pointer">✕</button>
      </div>

      <form id="formPerangkat" method="POST" action="{{ route('perangkat.store') }}" class="p-6 space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
          <div>
            <label class="font-semibold text-slate-700">Nama Perangkat *</label>
            <input type="text" name="nama_perangkat" id="in_nama" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <label class="font-semibold text-slate-700">Kategori *</label>
            <select name="kategori" id="in_kategori" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
              @foreach ($daftarKategori as $kat)
                <option value="{{ $kat }}">{{ $kat }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="font-semibold text-slate-700">Merek *</label>
            <input type="text" name="merek" id="in_merek" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <label class="font-semibold text-slate-700">Jumlah Unit * (Maks. 1.000.000)</label>
            <input type="number" name="jumlah" id="in_jumlah" min="1" max="1000000" value="1" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <label class="font-semibold text-slate-700">Harga Satuan (Rp) * (Maks. 10 Miliar)</label>
            <input type="number" name="harga_satuan" id="in_harga" min="0" max="10000000000" value="0" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <label class="font-semibold text-slate-700">Lokasi Penyimpanan *</label>
            <input type="text" name="lokasi_penyimpanan" id="in_lokasi" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <label class="font-semibold text-slate-700">Kondisi *</label>
            <select name="kondisi" id="in_kondisi" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
              <option value="Baik">Baik</option>
              <option value="Rusak Ringan">Rusak Ringan</option>
              <option value="Rusak Berat">Rusak Berat</option>
            </select>
          </div>
          <div>
            <label class="font-semibold text-slate-700">Tahun Pengadaan *</label>
            <input type="number" name="tahun_pengadaan" id="in_tahun" value="{{ date('Y') }}" min="2000" max="{{ date('Y')+1 }}" required class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div class="md:col-span-2">
            <label class="font-semibold text-slate-700">Keterangan / Spesifikasi</label>
            <textarea name="keterangan" id="in_keterangan" rows="2" class="w-full p-2.5 mt-1 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
          </div>
        </div>

        <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
          <button type="button" onclick="tutupModal('modalForm')" class="px-4 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100 rounded-xl cursor-pointer">Batal</button>
          <button type="submit" class="px-5 py-2 text-xs font-bold bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-md cursor-pointer">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL DETAIL -->
  <div id="modalDetail" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
      <div class="p-6 bg-slate-900 text-white flex items-center justify-between">
        <div>
          <p id="det_id" class="text-[10px] uppercase font-bold tracking-widest text-blue-400"></p>
          <h3 id="det_nama" class="font-display text-lg font-bold"></h3>
        </div>
        <button onclick="tutupModal('modalDetail')" class="text-slate-400 hover:text-white cursor-pointer">✕</button>
      </div>
      <div class="p-6 grid grid-cols-2 gap-4 text-xs">
        <div>
          <span class="text-slate-400 font-semibold">Kategori:</span>
          <p id="det_kategori" class="font-bold text-slate-800 text-sm"></p>
        </div>
        <div>
          <span class="text-slate-400 font-semibold">Merek:</span>
          <p id="det_merek" class="font-bold text-slate-800 text-sm"></p>
        </div>
        <div>
          <span class="text-slate-400 font-semibold">Jumlah Unit:</span>
          <p id="det_jumlah" class="font-bold text-slate-800 text-sm"></p>
        </div>
        <div>
          <span class="text-slate-400 font-semibold">Kondisi:</span>
          <p id="det_kondisi" class="font-bold text-sm"></p>
        </div>
        <div>
          <span class="text-slate-400 font-semibold">Harga Satuan:</span>
          <p id="det_harga" class="font-bold text-slate-800 text-sm"></p>
        </div>
        <div>
          <span class="text-slate-400 font-semibold">Tahun Pengadaan:</span>
          <p id="det_tahun" class="font-bold text-slate-800 text-sm"></p>
        </div>
        <div class="col-span-2">
          <span class="text-slate-400 font-semibold">Lokasi Penyimpanan:</span>
          <p id="det_lokasi" class="font-bold text-slate-800 text-sm"></p>
        </div>
        <div class="col-span-2">
          <span class="text-slate-400 font-semibold">Keterangan:</span>
          <p id="det_keterangan" class="mt-1 p-3 bg-slate-50 rounded-xl text-slate-700 border border-slate-200"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPT SWITCH TAB & MODAL -->
  <script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () { history.pushState(null, null, location.href); };

    function gantiTab(tab) {
      const secDashboard = document.getElementById('section-dashboard');
      const secBarang = document.getElementById('section-barang');
      const navDashboard = document.getElementById('nav-dashboard');
      const navBarang = document.getElementById('nav-barang');
      const topbarTitle = document.getElementById('topbar-title');

      if (tab === 'barang') {
        secDashboard.classList.add('hidden');
        secBarang.classList.remove('hidden');
        navDashboard.className = 'w-full text-left nav-inactive flex items-center space-x-3 px-4 py-3 rounded-r-lg rounded-l-sm font-semibold transition-all cursor-pointer';
        navBarang.className = 'w-full text-left nav-active flex items-center space-x-3 px-4 py-3 rounded-r-lg rounded-l-sm font-semibold transition-all cursor-pointer';
        topbarTitle.innerText = 'Daftar Perangkat TIK';
      } else {
        secBarang.classList.add('hidden');
        secDashboard.classList.remove('hidden');
        navBarang.className = 'w-full text-left nav-inactive flex items-center space-x-3 px-4 py-3 rounded-r-lg rounded-l-sm font-semibold transition-all cursor-pointer';
        navDashboard.className = 'w-full text-left nav-active flex items-center space-x-3 px-4 py-3 rounded-r-lg rounded-l-sm font-semibold transition-all cursor-pointer';
        topbarTitle.innerText = 'Dashboard';
      }
    }

    // Hanya otomatis ke tab barang JIKA sedang melakukan pencarian / filter data
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('search') || urlParams.has('kategori') || urlParams.has('kondisi')) {
      gantiTab('barang');
    } else {
      gantiTab('dashboard');
    }

    function tutupModal(id) {
      document.getElementById(id).classList.add('hidden');
    }

    function bukaModalTambah() {
      document.getElementById('modalTitle').innerText = 'Tambah Perangkat TIK';
      document.getElementById('formPerangkat').action = "{{ route('perangkat.store') }}";
      document.getElementById('in_nama').value = '';
      document.getElementById('in_merek').value = '';
      document.getElementById('in_jumlah').value = '1';
      document.getElementById('in_harga').value = '0';
      document.getElementById('in_lokasi').value = '';
      document.getElementById('in_keterangan').value = '';
      document.getElementById('modalForm').classList.remove('hidden');
    }

    function bukaModalEdit(data) {
      document.getElementById('modalTitle').innerText = 'Edit Data Perangkat TIK';
      document.getElementById('formPerangkat').action = '/perangkat/update/' + data.id;
      document.getElementById('in_nama').value = data.nama_perangkat;
      document.getElementById('in_kategori').value = data.kategori;
      document.getElementById('in_merek').value = data.merek;
      document.getElementById('in_jumlah').value = data.jumlah;
      document.getElementById('in_harga').value = data.harga_satuan;
      document.getElementById('in_lokasi').value = data.lokasi_penyimpanan;
      document.getElementById('in_kondisi').value = data.kondisi;
      document.getElementById('in_tahun').value = data.tahun_pengadaan;
      document.getElementById('in_keterangan').value = data.keterangan || '';
      document.getElementById('modalForm').classList.remove('hidden');
    }

    function bukaModalDetail(data) {
      document.getElementById('det_id').innerText = 'ID Perangkat #' + data.id;
      document.getElementById('det_nama').innerText = data.nama_perangkat;
      document.getElementById('det_kategori').innerText = data.kategori;
      document.getElementById('det_merek').innerText = data.merek;
      document.getElementById('det_jumlah').innerText = Number(data.jumlah).toLocaleString('id-ID') + ' Unit';
      document.getElementById('det_kondisi').innerText = data.kondisi;
      document.getElementById('det_harga').innerText = 'Rp ' + Number(data.harga_satuan).toLocaleString('id-ID');
      document.getElementById('det_tahun').innerText = data.tahun_pengadaan;
      document.getElementById('det_lokasi').innerText = data.lokasi_penyimpanan;
      document.getElementById('det_keterangan').innerText = data.keterangan || 'Tidak ada keterangan.';
      document.getElementById('modalDetail').classList.remove('hidden');
    }
  </script>

</body>
</html>