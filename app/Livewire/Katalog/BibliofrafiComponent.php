<?php

namespace App\Livewire\Katalog;

use Exception;
use Carbon\Carbon;
use App\Models\Gmd;
use App\Models\Rak;
use App\Models\Item;
use App\Models\Topik;
use App\Models\Bahasa;
use App\Models\Lokasi;
use App\Models\Penulis;
use Livewire\Component;
use App\Models\Lampiran;
use App\Models\Penerbit;
use App\Models\Supplier;
use App\Models\Frekuensi;
use App\Models\StatusItem;
use App\Models\Bibliografi;
use App\Models\TipeKoleksi;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\TempatPenerbit;
use Illuminate\Support\Facades\DB;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\UploadedFile;


class BibliofrafiComponent extends Component
{
    use WithFileUploads;
    public $bibliografi_id;
    public $gambarLama;
    public $tambahpengarang = 0;
    public $tambahsubyek = 0;
    public $tambahlampiran = 0;
    public $tambahitem = 0;
    public $activeTab = 'pills-sistem';
    public $tabActive = 'pills-summary';
    public $tipe_koleksi;
    public $tipe_rak;
    public $tipe_lokasi;
    public $tipe_status;
    public $tipe_gmd;
    public $tipe_supplier;
    public $bibliografi;
    public $penulis;

    public $bahasa;
    public $frekuensi;
    public $topik_id;
    public $editId;

    public $tempat_id;
    public $nama_tempat;
    public $gambarFile;
    public $nama_penerbit;

    public $penerbit = [];
    public $tempat = [];

    public $item = [
        'bibliografi_id' => '',
        'kode_item' => '',
        'call_number' => '',
        'kode_inventori' => '',
        'lokasi_id' => '',
        'rak_id' => '',
        'tipe_koleksi_id' => '',
        'status_id' => '',
        'nmr_order' => '',
        'tgl_order' => '',
        'tgl_penerimaan' => '',
        'invoice' => '',
        'supplier_id' => '',
        'source' => '',
        'tgl_invoice' => '',
        'harga' => '',
        'harga_currency' => '',
        'is_fotocopy' => false,
    ];

    public $listItem = [];

    public $pengarang = [
        'nama' => '',
        'kategori' => '',
    ];

    public $listPengarang = [];

    public $subyek = [
        'nama_topik' => '',
        'kategori_topik' => '',
    ];

    public $listsubyek = [];
    public $topik;
    public $status_marker;


    public $lampiran = [
        'judul' => '',
        'deskripsi' => '',
        'tipe_akses' => '',
    ];

    public $listLampiran = [];
    public $lampiranFile;

    public $judul, $gmd_id, $tipe_koleksi_id, $judul_seri, $penerbit_id, $tahun_terbit, $edisi, $frekuensi_id, $volume, $isbn_issn, $bahasa_id, $klasifikasi, $call_number, $collation, $is_etalase_hide, $is_promosi, $gambar, $penulis_id, $subyek_id, $tipe_akses, $spec_detail_info, $catatan;
    public $nama_topik;


    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'q')]
    public $search = '';

    protected function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'edisi' => 'nullable|string|max:100',
            'isbn_issn' => 'nullable|string|max:50',
            'tahun_terbit' => 'nullable|digits:4|integer',
            'collation' => 'nullable|string|max:255',
            'judul_seri' => 'nullable|string|max:255',
            'call_number' => 'nullable|string|max:50',
            'gmd_id' => 'required|exists:gmds,id',
            'bahasa_id' => 'required|exists:bahasas,kode_bahasa',
            'tipe_koleksi_id' => 'required|exists:tipe_koleksis,id',
            'penerbit_id' => 'required|exists:penerbits,id',
            'klasifikasi' => 'nullable|string|max:50',
            'catatan' => 'nullable|string|max:255',
            'spec_detail_info' => 'nullable|string|max:255',
            'frekuensi_id' => 'nullable|exists:frekuensis,id',
            'volume' => 'nullable|string|max:50',
            'penulis_id' => 'nullable',
            'topik_id' => 'nullable|exists:topiks,id',
            'lampiran.judul' => 'nullable|string|max:255',
            'lampiran.deskripsi' => 'nullable|string|max:500',
        ];
    }




    // 2. Reset semua input form
    public function resetInput()
    {
        $this->judul = null;
        $this->edisi = null;
        $this->isbn_issn = null;
        $this->tahun_terbit = null;
        $this->collation = null;
        $this->judul_seri = null;
        $this->call_number = null;
        $this->gmd_id = null;
        $this->bahasa_id = null;
        $this->tipe_koleksi_id = null;
        $this->penerbit_id = null;
        $this->klasifikasi = null;
        $this->catatan = null;
        $this->spec_detail_info = null;
        $this->frekuensi_id = null;
        $this->gambar = null;
        $this->volume = null;
        $this->penulis_id = [];
        $this->topik_id = [];
        $this->lampiran = [
            'judul' => '',
            'nama_file' => '',
            'deskripsi' => '',
            'tipe_akses' => '',
        ];
        $this->nama_topik = '';
        $this->pengarangList = [];
        $this->subyekList = [];
    }

public function mount($bibliografi_id = null)
{
    // Load dropdown, pilihan, dan semua list
    $this->tipe_koleksi = TipeKoleksi::all();
    $this->tipe_rak = Rak::all();
    $this->tipe_lokasi = Lokasi::all();
    $this->tipe_status = StatusItem::all();
    $this->penerbit = Penerbit::orderBy('id', 'desc')->get();
    $this->tipe_gmd = Gmd::all();
    $this->tipe_supplier = Supplier::all();
    $this->bibliografi = Bibliografi::all();
    $this->frekuensi = Frekuensi::all();
    $this->tempat = TempatPenerbit::orderBy('id', 'desc')->get();
    $this->penulis = Penulis::all();
    $this->topik = Topik::all();
    $this->bahasa = Bahasa::all();

    // Jika ada ID dari route → mode edit
    if ($bibliografi_id) {
        $this->bibliografi_id = $bibliografi_id;
        $this->loadBibliografi($bibliografi_id);
    }
}

    public function loadBibliografi($id)
    {
        $b = Bibliografi::with([
            'penulis',
            'topik',
            'lampiran',
            'items'
        ])->findOrFail($id);

        // isi field biasa
        $this->judul = $b->judul;
        $this->edisi = $b->edisi;
        $this->isbn_issn = $b->isbn_issn;
        $this->tahun_terbit = $b->tahun_terbit;
        $this->collation = $b->collation;
        $this->judul_seri = $b->judul_seri;
        $this->call_number = $b->call_number;
        $this->gmd_id = $b->gmd_id;
        $this->bahasa_id = $b->bahasa_id;
        $this->tipe_koleksi_id = $b->tipe_koleksi_id;
        $this->klasifikasi = $b->klasifikasi;
        $this->catatan = $b->catatan;
        $this->spec_detail_info = $b->spec_detail_info;
        $this->frekuensi_id = $b->frekuensi_id;
        $this->is_etalase_hide = $b->is_etalase_hide;
        $this->is_promosi = $b->is_promosi;
        $this->volume = $b->volume;
        $this->status_marker = $b->status_marker;
        $this->penerbit_id = $b->penerbit_id;

        $this->gambarLama = $b->gambar;

        // isi array PENULIS
        $this->listPengarang = $b->penulis->map(function($x){
            return [
                'id' => $x->id,
                'nama' => $x->nama,
                'tipe' => $x->tipe,
                'level' => $x->level,
                'kategori' => $x->kategori
            ];
        })->toArray();

        // isi array SUBYEK
        $this->listsubyek = $b->topik->map(function($x){
            return [
                'id' => $x->topik_id,
                'nama_topik' => $x->nama_topik,
                'tipe' => $x->tipe,
                'level' => $x->level,
                'kategori_topik' => $x->kategori
            ];
        })->toArray();

        // isi array LAMPIRAN
        $this->listLampiran = $b->lampiran->map(function($x){
            return [
                'id' => $x->id,
                'judul' => $x->judul,
                'nama_file' => $x->nama_file,
                'deskripsi' => $x->deskripsi,
                'tipe_akses' => $x->tipe_akses
            ];
        })->toArray();

        // isi array ITEM
        $this->listItem = $b->items->map(function($x){
            return [
                'kode_item' => $x->kode_item,
                'call_number' => $x->call_number,
                'kode_inventori' => $x->kode_inventori,
                'lokasi_id' => $x->lokasi_id,
                'rak_id' => $x->rak_id,
                'tipe_koleksi_id' => $x->tipe_koleksi_id,
                'status_id' => $x->status_id,
                'nmr_order' => $x->nmr_order,
                'tgl_order' => $x->tgl_order,
                'tgl_penerimaan' => $x->tgl_penerimaan,
                'supplier_id' => $x->supplier_id,
                'source' => $x->source,
                'invoice' => $x->invoice,
                'tgl_invoice' => $x->tgl_invoice,
                'harga' => $x->harga,
                'harga_currency' => $x->harga_currency,
                'is_fotocopy' => $x->is_fotocopy
            ];
        })->toArray();
    }


public function UpdateBibliografi()
{
    $this->validate([
        'judul' => 'required',
        'gambarFile' => 'nullable|image|max:2048',
    ]);

    try {
        $b = Bibliografi::findOrFail($this->bibliografi_id);

        // cek gambar baru
        if ($this->gambarFile) {
            // hapus gambar lama
            if ($this->gambarLama && Storage::disk('public')->exists($this->gambarLama)) {
                Storage::disk('public')->delete($this->gambarLama);
            }

            $gambarPath = $this->gambarFile->store('bibliografi', 'public');
        } else {
            $gambarPath = $this->gambarLama; // tetap pakai gambar lama
        }

        // UPDATE data
        $b->update([
            'judul' => $this->judul,
            'edisi' => $this->edisi,
            'isbn_issn' => $this->isbn_issn,
            'tahun_terbit' => $this->tahun_terbit,
            'collation' => $this->collation,
            'judul_seri' => $this->judul_seri,
            'call_number' => $this->call_number,
            'gmd_id' => $this->gmd_id,
            'bahasa_id' => $this->bahasa_id,
            'tipe_koleksi_id' => $this->tipe_koleksi_id,
            'klasifikasi' => $this->klasifikasi,
            'catatan' => $this->catatan,
            'spec_detail_info' => $this->spec_detail_info,
            'frekuensi_id' => $this->frekuensi_id,
            'is_etalase_hide' => $this->is_etalase_hide ? 1 : 0,
            'is_promosi' => $this->is_promosi ? 1 : 0,
            'gambar' => $gambarPath,
            'volume' => $this->volume,
            'status_marker' => $this->status_marker ? 1 : 0,
            'penerbit_id' => $this->penerbit_id,
        ]);

        // HAPUS relasi lama
        DB::table('bibliografi_penulis')->where('bibliografi_id', $b->id)->delete();
        DB::table('bibliografi_topiks')->where('bibliografi_id', $b->id)->delete();
        Lampiran::where('bibliografi_id', $b->id)->delete();
        Item::where('bibliografi_id', $b->id)->delete();

        // INSERT ulang PENULIS
        foreach ($this->listPengarang as $p) {
            DB::table('bibliografi_penulis')->insert([
                'bibliografi_id' => $b->id,
                'penulis_id' => $p['id'],
                'tipe' => $p['tipe'],
                'level' => $p['level'],
                'kategori' => $p['kategori'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // INSERT ulang SUBYEK
        foreach ($this->listsubyek as $s) {
            DB::table('bibliografi_topiks')->insert([
                'bibliografi_id' => $b->id,
                'topik_id' => $s['id'],
                'tipe' => $s['tipe'],
                'level' => $s['level'],
                'kategori' => $s['kategori_topik'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // INSERT ulang lampiran
        foreach ($this->listLampiran as $l) {
            Lampiran::create([
                'bibliografi_id' => $b->id,
                'judul' => $l['judul'],
                'nama_file' => $l['nama_file'],
                'deskripsi' => $l['deskripsi'],
                'tipe_akses' => $l['tipe_akses'],
            ]);
        }

        // INSERT ulang item
        foreach ($this->listItem as $item) {
            Item::create([
                'bibliografi_id' => $b->id,
                'kode_item' => $item['kode_item'],
                'call_number' => $item['call_number'] ?? null,
                'kode_inventori' => $item['kode_inventori'] ?? null,
                'lokasi_id' => $item['lokasi_id'],
                'rak_id' => $item['rak_id'],
                'tipe_koleksi_id' => $item['tipe_koleksi_id'],
                'status_id' => $item['status_id'],
                'nmr_order' => $item['nmr_order'] ?? null,
                'tgl_order' => $item['tgl_order'] ?? null,
                'tgl_penerimaan' => $item['tgl_penerimaan'] ?? null,
                'supplier_id' => $item['supplier_id'] ?? null,
                'source' => $item['source'] ?? null,
                'invoice' => $item['invoice'] ?? null,
                'tgl_invoice' => $item['tgl_invoice'] ?? null,
                'harga' => $item['harga'] ?? 0,
                'harga_currency' => $item['harga_currency'],
                'is_fotocopy' => $item['is_fotocopy'] ?? 0,
            ]);
        }

        session()->flash('success', 'Bibliografi berhasil diperbarui.');
    } catch (\Exception $e) {
        session()->flash('error', 'Error: ' . $e->getMessage());
    }
}


    public function updatedPenulisId($value)
    {
        if ($value) {
            $penulis = Penulis::find($value);

            // Update kategori otomatis
            if ($penulis) {
                $this->pengarang['kategori'] = $penulis->kategori;
            }
        } else {
            // Jika select kosong, reset kategori
            $this->pengarang['kategori'] = '';
        }
    }

    public function TambahTempatLangsung()
    {
        $this->validate([
            'nama_tempat' => 'required|min:2'
        ]);

        $tempat = TempatPenerbit::create([
            'nama_tempat' => $this->nama_tempat
        ]);
        $this->tempat = TempatPenerbit::orderBy('id', 'desc')->get();
        $place = (int) TempatPenerbit::latest('id')->value('id');

        $this->nama_tempat = "";

        $this->tempat_id = $place;

        session()->flash('success', 'Tempat penerbit baru berhasil ditambahkan.');
    }


    public function TambahPenerbitLangsung()
    {
        $this->validate([
            'nama_penerbit' => 'required',
            'tempat_id' => 'nullable|exists:tempat_penerbits,id',
        ]);

        $penerbit = Penerbit::create([
            'nama_penerbit' => $this->nama_penerbit,
            'tempat_id' => $this->tempat_id,
        ]);

        $this->penerbit = Penerbit::orderBy('id', 'desc')->get();

        $this->penerbit_id = $penerbit->id;

        $this->nama_penerbit = "";

        session()->flash('success', 'Penerbit berhasil ditambahkan.');
    }

    public function TambahPengarang()
    {
        $this->validate([
            'pengarang.kategori' => 'required',
        ]);

        try {

            if (!empty($this->pengarang['nama'])) {

                $penulisBaru = Penulis::create([
                    'nama' => $this->pengarang['nama'],
                    'kategori' => $this->pengarang['kategori'],
                    'tipe' => "Personal Name",
                ]);

                $penulis = $penulisBaru;
                $this->penulis_id = $penulisBaru->id;

            } elseif (!empty($this->penulis_id)) {

                $penulis = Penulis::find($this->penulis_id);

                if (!$penulis) {
                    session()->flash('error', 'Penulis tidak ditemukan.');
                    return;
                }

            } else {
                session()->flash('error', 'Isi nama atau pilih penulis.');
                return;
            }
            $this->listPengarang[] = [
                'id' => $penulis->id,
                'nama' => $penulis->nama,
                'kategori' => $penulis->kategori,
            ];

            $this->pengarang['nama'] = '';
            $this->pengarang['kategori'] = '';
            $this->penulis_id = '';

            $this->penulis = Penulis::orderBy('nama')->get();

            session()->flash('success', 'Pengarang berhasil ditambahkan.');

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function HapusPengarang($index)
{
    if (isset($this->listPengarang[$index])) {

        // hapus berdasarkan index array
        unset($this->listPengarang[$index]);

        // reset index array agar rapi (optional, tapi disarankan)
        $this->listPengarang = array_values($this->listPengarang);

        session()->flash('success', 'Pengarang berhasil dihapus.');
    }
}


    public function Tambahsubyek()
    {
        $this->validate([
            'subyek.kategori_topik' => 'required',
        ]);

        try {
            if (!empty($this->subyek['nama_topik'])) {

                // Create baru
                $subyekBaru = Topik::create([
                    'nama_topik' => $this->subyek['nama_topik'],
                    'kategori_topik' => $this->subyek['kategori_topik'],
                    'tipe_topik' => "Topic",
                ]);

                $subyek = $subyekBaru;
                $this->subyek_id = $subyekBaru->id;

            } elseif (!empty($this->subyek_id)) {

                $subyek = Topik::find($this->subyek_id);

                if (!$subyek) {
                    session()->flash('error', 'Subyek tidak ditemukan.');
                    return;
                }

            } else {
                session()->flash('error', 'Isi nama atau pilih subyek.');
                return;
            }

            // Tambah ke JSON array
            $this->listsubyek[] = [
                'id' => $subyek->id,
                'nama_topik' => $subyek->nama_topik,
                'kategori_topik' => $subyek->kategori_topik,
            ];

            // Reset input
            $this->subyek['nama_topik'] = '';
            $this->subyek['kategori_topik'] = '';
            $this->subyek_id = '';

            // Refresh dropdown list
            $this->topik = Topik::orderBy('nama_topik')->get();

            session()->flash('success', 'Subyek berhasil ditambahkan.');

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function removesubyek($index)
{
    if (isset($this->listsubyek[$index])) {
        
        unset($this->listsubyek[$index]);

        // rapikan index array (sangat penting)
        $this->listsubyek = array_values($this->listsubyek);

        session()->flash('success', 'Subyek berhasil dihapus.');
    }
}


    public function DeleteBibliografi($id)
{
    try {
        $b = Bibliografi::with(['lampiran', 'items'])->findOrFail($id);

        // 1. Hapus file gambar utama bila ada
        if ($b->gambar && Storage::disk('public')->exists($b->gambar)) {
            Storage::disk('public')->delete($b->gambar);
        }

        // 2. Hapus file lampiran bila ada
        foreach ($b->lampiran as $l) {
            if ($l->nama_file && Storage::disk('public')->exists($l->nama_file)) {
                Storage::disk('public')->delete($l->nama_file);
            }
        }

        // 3. Hapus relasi pivot
        DB::table('bibliografi_penulis')->where('bibliografi_id', $id)->delete();
        DB::table('bibliografi_topiks')->where('bibliografi_id', $id)->delete();

        // 4. Hapus lampiran & item
        Lampiran::where('bibliografi_id', $id)->delete();
        Item::where('bibliografi_id', $id)->delete();

        // 5. Terakhir, hapus bibliografi
        $b->delete();

        session()->flash('success', 'Bibliografi berhasil dihapus.');

    } catch (\Exception $e) {
        session()->flash('error', 'Gagal menghapus: ' . $e->getMessage());
    }
}


    public function TambahLampiran()
    {
        $this->validate([
            'lampiran.judul' => 'required',
            'lampiranFile' => 'nullable|file|max:2048',
            'lampiran.tipe_akses' => 'required',
        ]);

        try {
            $filePath = null;

            if ($this->lampiranFile) {
                $filePath = $this->lampiranFile->store('lampiran', 'public');
            }


            // Simpan ke JSON array
            $this->listLampiran[] = [
                'judul' => $this->lampiran['judul'],
                'nama_file' => $filePath,   // hanya path
                'deskripsi' => $this->lampiran['deskripsi'],
                'tipe_akses' => $this->lampiran['tipe_akses'],
            ];

            // Reset input setelah tambah
            $this->lampiran = [
                'judul' => '',
                'nama_file' => null,
                'deskripsi' => '',
                'tipe_akses' => '',
            ];
            $this->lampiranFile = null;
            session()->flash('success', 'Lampiran berhasil ditambahkan.');

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function TambahItem()
    {
        $this->validate([
            'item.kode_item' => 'required',
        ]);

        $this->listItem[] = [
            'bibliografi_id' => $this->item['bibliografi_id'],
            'kode_item' => $this->item['kode_item'],
            'call_number' => $this->item['call_number'],
            'kode_inventori' => $this->item['kode_inventori'],
            'lokasi_id' => $this->item['lokasi_id'],
            'rak_id' => $this->item['rak_id'],
            'tipe_koleksi_id' => $this->item['tipe_koleksi_id'],
            'status_id' => $this->item['status_id'],
            'nmr_order' => $this->item['nmr_order'],
            'tgl_order' => $this->item['tgl_order'],
            'tgl_penerimaan' => $this->item['tgl_penerimaan'],
            'invoice' => $this->item['invoice'],
            'supplier_id' => $this->item['supplier_id'],
            'source' => $this->item['source'],
            'tgl_invoice' => $this->item['tgl_invoice'],
            'harga' => $this->item['harga'],
            'harga_currency' => $this->item['harga_currency'],
            'is_fotocopy' => $this->item['is_fotocopy'] ? 1 : 0,
        ];

        $this->item = [
            'bibliografi_id' => '',
            'kode_item' => '',
            'call_number' => '',
            'kode_inventori' => '',
            'lokasi_id' => '',
            'rak_id' => '',
            'tipe_koleksi_id' => '',
            'status_id' => '',
            'nmr_order' => '',
            'tgl_order' => '',
            'tgl_penerimaan' => '',
            'invoice' => '',
            'supplier_id' => '',
            'source' => '',
            'tgl_invoice' => '',
            'harga' => '',
            'harga_currency' => '',
            'is_fotocopy' => false,
        ];

        session()->flash('success', 'Item berhasil ditambahkan.');
    }

public function hapusItem($index)
{
    if (isset($this->listItem[$index])) {

        unset($this->listItem[$index]);

        // Penting: rapikan index biar Livewire tidak error
        $this->listItem = array_values($this->listItem);

        session()->flash('success', 'Item berhasil dihapus.');
    }
}


    // public function refreshPenerbit()
    // {
    //     $this->penerbit = Penerbit::orderBy('nama_penerbit')->get();
    // }

    // public function refreshTempat()
    // {
    //     $this->tempat = TempatPenerbit::orderBy('nama_tempat')->get();
    // }



    // public function mount()
    // {
    //     $this->tipe_koleksi = TipeKoleksi::all();
    //     $this->tipe_rak = Rak::all();
    //     $this->tipe_lokasi = Lokasi::all();
    //     $this->tipe_status = StatusItem::all();
    //     $this->penerbit = Penerbit::orderBy('id', 'desc')->get();
    //     $this->tipe_gmd = Gmd::all();
    //     $this->tipe_supplier = Supplier::all();
    //     $this->bibliografi = Bibliografi::all();
    //     $this->frekuensi = Frekuensi::all();
    //     $this->tempat = TempatPenerbit::orderBy('id', 'desc')->get();
    //     $this->penulis = Penulis::all();
    //     $this->topik = Topik::all();
    //     $this->bahasa = Bahasa::all();
    // }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function setActiveTab($tab)
    {
        $this->tabActive = $tab;
    }

    // public function createBibliografi()
    // {
    //     $this->validate();
    //     try {
    //         $path = null;
    //         if ($this->gambar) {
    //             $path = $this->gambar->store('bibliografi', 'public');
    //         }

    //         $nama_file = null;
    //         if (!empty($this->lampiran['nama_file'])) {
    //             $nama_file = $this->lampiran['nama_file']->store('bibliografi', 'public');
    //         }

    //         $bibliografi = Bibliografi::create([
    //             'judul' => $this->judul,
    //             'edisi' => $this->edisi,
    //             'isbn_issn' => $this->isbn_issn,
    //             'tahun_terbit' => $this->tahun_terbit,
    //             'collation' => $this->collation,
    //             'judul_seri' => $this->judul_seri,
    //             'call_number' => $this->call_number,
    //             'gmd_id' => $this->gmd_id,
    //             'bahasa_id' => $this->bahasa_id,
    //             'tipe_koleksi_id' => $this->tipe_koleksi_id,
    //             'penerbit_id' => $this->penerbit_id,
    //             'klasifikasi' => $this->klasifikasi,
    //             'catatan' => $this->catatan,
    //             'spec_detail_info' => $this->spec_detail_info,
    //             'frekuensi_id' => $this->frekuensi_id,
    //             'is_etalase_hide' => $this->is_etalase_hide ? 1 : 0,
    //             'is_promosi' => $this->is_promosi ? 1 : 0,
    //             'gambar' => $path,
    //             'volume' => $this->volume,
    //         ]);

    //         if ($this->penulis_id) {
    //             $bibliografi->penulis()->attach($this->penulis_id);
    //         }

    //         Lampiran::create([
    //             'bibliografi_id' => $bibliografi->id,
    //             'judul' => $this->lampiran['judul'],
    //             'deskripsi' => $this->lampiran['deskripsi'],
    //             'tipe_akses' => $this->lampiran['tipe_akses'],
    //             'nama_file' => $nama_file
    //         ]);

    //         if ($this->topik_id) {
    //             $bibliografi->topik()->attach($this->topik_id);
    //         }
    //         session()->flash('success', 'Aturan Pemimjaman berhasil ditambahkan.');
    //         $this->dispatch('close-modal');
    //         $this->resetInput();
    //     } catch (Exception $e) {
    //         session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }


public function SimpanBibliografi()
{
    $this->validate([
        'judul' => 'required',
        'gambarFile' => 'nullable|image|max:2048',
    ]);

    try {
        // Upload gambar jika ada
        $gambarPath = $this->gambarFile
            ? $this->gambarFile->store('bibliografi', 'public')
            : null;

        // SIMPAN BIBLIOGRAFI
        $bibliografi = Bibliografi::create([
            'judul' => $this->judul,
            'edisi' => $this->edisi,
            'isbn_issn' => $this->isbn_issn,
            'tahun_terbit' => $this->tahun_terbit,
            'collation' => $this->collation,
            'judul_seri' => $this->judul_seri,
            'call_number' => $this->call_number,
            'gmd_id' => $this->gmd_id,
            'bahasa_id' => $this->bahasa_id,
            'tipe_koleksi_id' => $this->tipe_koleksi_id,
            'klasifikasi' => $this->klasifikasi,
            'catatan' => $this->catatan,
            'spec_detail_info' => $this->spec_detail_info,
            'frekuensi_id' => $this->frekuensi_id,
            'is_etalase_hide' => $this->is_etalase_hide ? 1 : 0,
            'is_promosi' => $this->is_promosi ? 1 : 0,
            'gambar' => $gambarPath,
            'volume' => $this->volume,
            'status_marker' => $this->status_marker ? 1 : 0,
            'penerbit_id' => $this->penerbit_id, // Pastikan kolom ini nullable
        ]);

        $bibliografi_id = $bibliografi->id;

        // Jika tidak ada penulis -> skip
        if (!empty($this->listPengarang)) {
            foreach ($this->listPengarang as $penulis) {
                DB::table('bibliografi_penulis')->insert([
                    'bibliografi_id' => $bibliografi_id,
                    'penulis_id' => $penulis['id'],
                    'tipe' => $penulis['tipe'] ?? null,
                    'level' => $penulis['level'] ?? null,
                    'kategori' => $penulis['kategori'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Jika tidak ada subyek -> skip
        if (!empty($this->listsubyek)) {
            foreach ($this->listsubyek as $subyek) {
                DB::table('bibliografi_topiks')->insert([
                    'bibliografi_id' => $bibliografi_id,
                    'topik_id' => $subyek['id'],
                    'tipe' => $subyek['tipe'] ?? null,
                    'level' => $subyek['level'] ?? null,
                    'kategori' => $subyek['kategori_topik'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Jika tidak ada lampiran -> skip
        if (!empty($this->listLampiran)) {
            foreach ($this->listLampiran as $lampiran) {
                Lampiran::create([
                    'bibliografi_id' => $bibliografi_id,
                    'judul' => $lampiran['judul'] ?? null,
                    'nama_file' => $lampiran['nama_file'] ?? null,
                    'deskripsi' => $lampiran['deskripsi'] ?? null,
                    'tipe_akses' => $lampiran['tipe_akses'] ?? null,
                ]);
            }
        }

        // Jika tidak ada item -> skip
        if (!empty($this->listItem)) {
            foreach ($this->listItem as $item) {
                Item::create([
                    'bibliografi_id' => $bibliografi_id,
                    'kode_item' => $item['kode_item'],
                    'call_number' => $item['call_number'] ?? null,
                    'kode_inventori' => $item['kode_inventori'] ?? null,
                    'lokasi_id' => $item['lokasi_id'] ?? null,
                    'rak_id' => $item['rak_id'] ?? null,
                    'tipe_koleksi_id' => $item['tipe_koleksi_id'] ?? null,
                    'status_id' => $item['status_id'] ?? null,
                    'nmr_order' => $item['nmr_order'] ?? null,
                    'tgl_order' => $item['tgl_order'] ?? null,
                    'tgl_penerimaan' => $item['tgl_penerimaan'] ?? null,
                    'invoice' => $item['invoice'] ?? null,
                    'supplier_id' => $item['supplier_id'] ?? null,
                    'source' => $item['source'] ?? null,
                    'tgl_invoice' => $item['tgl_invoice'] ?? null,
                    'harga' => $item['harga'] ?? null,
                    'harga_currency' => $item['harga_currency'] ?? null,
                    'is_fotocopy' => $item['is_fotocopy'] ?? 0,
                ]);
            }
        }

        session()->flash('success', 'Bibliografi berhasil disimpan.');
    } catch (\Exception $e) {
        session()->flash('error', 'Error: ' . $e->getMessage());
    }
}

    // public function editBibliografi($id)
    // {
    //     $this->editId = $id;
    //     $bibliografi = Bibliografi::with('penulis', 'topik', 'lampiran')->findOrFail($id);
    //     $this->judul = $bibliografi->judul;
    //     $this->edisi = $bibliografi->edisi;
    //     $this->isbn_issn = $bibliografi->isbn_issn;
    //     $this->tahun_terbit = $bibliografi->tahun_terbit;
    //     $this->collation = $bibliografi->collation;
    //     $this->judul_seri = $bibliografi->judul_seri;
    //     $this->call_number = $bibliografi->call_number;
    //     $this->gmd_id = $bibliografi->gmd_id;
    //     $this->bahasa_id = $bibliografi->bahasa_id;
    //     $this->tipe_koleksi_id = $bibliografi->tipe_koleksi_id;
    //     $this->penerbit_id = $bibliografi->penerbit_id;
    //     $this->klasifikasi = $bibliografi->klasifikasi;
    //     $this->catatan = $bibliografi->catatan;
    //     $this->spec_detail_info = $bibliografi->spec_detail_info;
    //     $this->frekuensi_id = $bibliografi->frekuensi_id;
    //     $this->volume = $bibliografi->volume;
    //     $this->gambar = $bibliografi->gambar;
    //     $this->is_etalase_hide = $bibliografi->is_etalase_hide;
    //     $this->is_promosi = $bibliografi->is_promosi;
    //     $this->penulis_id = $bibliografi->penulis->pluck('id')->toArray();
    //     $this->topik_id = $bibliografi->topik->pluck('id')->toArray();

    //     if ($bibliografi->lampiran && $bibliografi->lampiran->count() > 0) {
    //         $lampiran = $bibliografi->lampiran->first();
    //         $this->lampiran = [
    //             'judul' => $lampiran->judul,
    //             'deskripsi' => $lampiran->deskripsi,
    //             'tipe_akses' => $lampiran->tipe_akses,
    //             'nama_file' => $lampiran->nama_file,
    //         ];
    //     }

    //     $this->dispatch('open-modal'); // opsional, untuk buka modal edit
    // }

    // 2. Update data bibliografi
    // public function updateBibliografi()
    // {
    //     $this->validate(); // pakai rules() yang sudah dibuat

    //     try {
    //         $bibliografi = Bibliografi::findOrFail($this->editId);

    //         $path = $this->gambar instanceof \Livewire\TemporaryUploadedFile
    //             ? $this->gambar->store('bibliografi', 'public')
    //             : $bibliografi->gambar;

    //         $nama_file = $this->lampiran['nama_file'] instanceof \Livewire\TemporaryUploadedFile
    //             ? $this->lampiran['nama_file']->store('bibliografi', 'public')
    //             : $this->lampiran['nama_file'];

    //         $bibliografi->update([
    //             'judul' => $this->judul,
    //             'edisi' => $this->edisi,
    //             'isbn_issn' => $this->isbn_issn,
    //             'tahun_terbit' => $this->tahun_terbit,
    //             'collation' => $this->collation,
    //             'judul_seri' => $this->judul_seri,
    //             'call_number' => $this->call_number,
    //             'gmd_id' => $this->gmd_id,
    //             'bahasa_id' => $this->bahasa_id,
    //             'tipe_koleksi_id' => $this->tipe_koleksi_id,
    //             'penerbit_id' => $this->penerbit_id,
    //             'klasifikasi' => $this->klasifikasi,
    //             'catatan' => $this->catatan,
    //             'spec_detail_info' => $this->spec_detail_info,
    //             'frekuensi_id' => $this->frekuensi_id,
    //             'is_etalase_hide' => $this->is_etalase_hide,
    //             'is_promosi' => $this->is_promosi,
    //             'gambar' => $path,
    //             'volume' => $this->volume,
    //         ]);

    //         // Update relasi penulis
    //         $bibliografi->penulis()->sync($this->penulis_id);

    //         // Update relasi topik
    //         $bibliografi->topik()->sync($this->topik_id);

    //         // Update lampiran
    //         if ($bibliografi->lampiran && $bibliografi->lampiran->count() > 0) {
    //             $lampiran = $bibliografi->lampiran->first();
    //             $lampiran->update([
    //                 'judul' => $this->lampiran['judul'],
    //                 'deskripsi' => $this->lampiran['deskripsi'],
    //                 'tipe_akses' => $this->lampiran['tipe_akses'],
    //                 'nama_file' => $nama_file,
    //             ]);
    //         } else if ($this->lampiran['judul'] && $nama_file) {
    //             Lampiran::create([
    //                 'bibliografi_id' => $bibliografi->id,
    //                 'judul' => $this->lampiran['judul'],
    //                 'deskripsi' => $this->lampiran['deskripsi'],
    //                 'tipe_akses' => $this->lampiran['tipe_akses'],
    //                 'nama_file' => $nama_file
    //             ]);
    //         }

    //         session()->flash('success', 'Bibliografi berhasil diperbarui.');
    //         $this->dispatch('close-modal');
    //         $this->resetInput();
    //     } catch (Exception $e) {
    //         session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }

    public function render()
    {
        $items = Bibliografi::with('penulis', 'penerbit', 'topik', 'lampiran')
            ->when($this->search, function ($q) {
                $q->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhereHas('penulis', function ($q2) {
                        $q2->where('nama', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('penerbit', function ($q2) {
                        $q2->where('nama_penerbit', 'like', '%' . $this->search . '%');
                    });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.katalog.bibliofrafi-component', compact('items'));
    }
}
