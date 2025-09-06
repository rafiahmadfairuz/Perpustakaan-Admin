<?php
namespace App\Livewire\Katalog;
use App\Models\Topik;
use App\Models\Bahasa;
use App\Models\Penulis;
use App\Models\Lampiran;
use App\Models\Penerbit;
use App\Models\Frekuensi;
use App\Models\Bibliografi;
    use App\Models\Gmd;
    use Carbon\Carbon;
    use App\Models\Rak;
    use App\Models\Item;
    use App\Models\Lokasi;
    use Livewire\Component;
    use App\Models\Supplier;
    use App\Models\StatusItem;
    use App\Models\TipeKoleksi;
    use Livewire\WithPagination;
    use Livewire\WithFileUploads;
    use Livewire\TemporaryUploadedFile;
    use Exception;


    class BibliofrafiComponent extends Component
    {
        use WithFileUploads;

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
        public $penerbit;
        public $penulis;
        public $bahasa;
        public $frekuensi;
        public $topik;
        public $editId;

        public $penulisLangsung;
        public $pengarang = [
        'nama' => ''
        ];

        public $lampiran = [
        'judul' => '',
        'nama_file' => '',
        'deskripsi' => '',
        'tipe_akses' => '',
        ];

        public $judul, $gmd_id, $tipe_koleksi_id, $judul_seri, $penerbit_id, $tahun_terbit, $edisi, $frekuensi_id, $volume, $isbn_issn, $bahasa_id, $klasifikasi, $call_number, $collation, $is_etalase_hide, $is_promosi, $gambar, $penulis_id, $topik_id, $tipe_akses, $spec_detail_info, $catatan;
        public $nama_topik;

        public $pengarangList = [];
        public $subyekList = [];

        use WithPagination;
        protected $paginationTheme = 'bootstrap';

        #[Url(as: 'q')]
        public $search = '';

        protected function rules()
{
    return [
        'judul'           => 'required|string|max:255',
        'edisi'           => 'nullable|string|max:100',
        'isbn_issn'       => 'nullable|string|max:50',
        'tahun_terbit'    => 'nullable|digits:4|integer',
        'collation'       => 'nullable|string|max:255',
        'judul_seri'      => 'nullable|string|max:255',
        'call_number'     => 'nullable|string|max:50',
        'gmd_id'          => 'required|exists:gmds,id',
        'bahasa_id'       => 'required|exists:bahasas,kode_bahasa',
        'tipe_koleksi_id' => 'required|exists:tipe_koleksis,id',
        'penerbit_id'     => 'required|exists:penerbits,id',
        'klasifikasi'     => 'nullable|string|max:50',
        'catatan'         => 'nullable|string|max:255',
        'spec_detail_info'=> 'nullable|string|max:255',
        'frekuensi_id'    => 'nullable|exists:frekuensis,id',
        'volume'          => 'nullable|string|max:50',
        'penulis_id'      => 'nullable',
        'topik_id' => 'nullable|exists:topiks,id',
        'lampiran.judul'  => 'nullable|string|max:255',
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
    $this->pengarang['nama'] = '';
    $this->nama_topik = '';
    $this->pengarangList = [];
    $this->subyekList = [];
}


public function TambahPengarangLangsung()
{
    try {
        $penulisLangsung = Penulis::create([
            'nama' => $this->pengarang['nama'],
            'tipe' => "Personal Name",
        ]);

        $this->pengarang['nama'] = '';

        session()->flash('success', 'Pengarang baru berhasil ditambahkan.');
    } catch (\Exception $e) {
        session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


public function TambahSubyekLangsung()
{

    try {
        $topiklangsung = Topik::create([
            'nama_topik' => $this->nama_topik,
        ]);
        session()->flash('success', 'Subyek baru berhasil ditambahkan.');
    } catch (\Exception $e) {
        session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


        public function mount()
        {
            $this->tipe_koleksi = TipeKoleksi::all();
            $this->tipe_rak = Rak::all();
            $this->tipe_lokasi = Lokasi::all();
            $this->tipe_status = StatusItem::all();
            $this->penerbit = Penerbit::all();
            $this->tipe_gmd = Gmd::all();
            $this->tipe_supplier = Supplier::all();
            $this->bibliografi = Bibliografi::all();
            $this->frekuensi = Frekuensi::all();
            $this->penulis = Penulis::all();
            $this->topik = Topik::all();
            $this->bahasa = Bahasa::all();
        }

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

        public function createBibliografi()
        {
        $this->validate();
        try {
                    $path = null;
        if ($this->gambar) {
            $path = $this->gambar->store('bibliografi', 'public');
        }

        $nama_file = null;
        if (!empty($this->lampiran['nama_file']) ) {
            $nama_file = $this->lampiran['nama_file']->store('bibliografi', 'public');
        }

            $bibliografi = Bibliografi::create([
                'judul'  => $this->judul,
                'edisi'    => $this->edisi,
                'isbn_issn'          => $this->isbn_issn,
                'tahun_terbit'      => $this->tahun_terbit,
                'collation'    => $this->collation,
                'judul_seri'    => $this->judul_seri,
                'call_number'    => $this->call_number,
                'gmd_id'    => $this->gmd_id,
                'bahasa_id'    => $this->bahasa_id,
                'tipe_koleksi_id'    => $this->tipe_koleksi_id,
                'penerbit_id'    => $this->penerbit_id,
                'klasifikasi'    => $this->klasifikasi,
                'catatan'    => $this->catatan,
                'spec_detail_info'    => $this->spec_detail_info,
                'frekuensi_id'    => $this->frekuensi_id,
                'is_etalase_hide'    => 1,
                'is_promosi'    => 1,
                'gambar'    => $path,
                'volume'    => $this->volume,
            ]);
                    if ($this->penulis_id) {
            $bibliografi->penulis()->attach($this->penulis_id);
        }

        Lampiran::create([
            'bibliografi_id' => $bibliografi->id,
            'judul' => $this->lampiran['judul'],
            'deskripsi' => $this->lampiran['deskripsi'],
            'tipe_akses' => $this->lampiran['tipe_akses'],
            'nama_file' => $nama_file
        ]);

        if ($this->topik_id) {
            $bibliografi->topik()->attach($this->topik_id);
        }
            session()->flash('success', 'Aturan Pemimjaman berhasil ditambahkan.');
            $this->dispatch('close-modal');
            $this->resetInput();
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
}



public function editBibliografi($id)
{
    $this->editId = $id;
    $bibliografi = Bibliografi::with('penulis', 'topik', 'lampiran')->findOrFail($id);

    $this->judul = $bibliografi->judul;
    $this->edisi = $bibliografi->edisi;
    $this->isbn_issn = $bibliografi->isbn_issn;
    $this->tahun_terbit = $bibliografi->tahun_terbit;
    $this->collation = $bibliografi->collation;
    $this->judul_seri = $bibliografi->judul_seri;
    $this->call_number = $bibliografi->call_number;
    $this->gmd_id = $bibliografi->gmd_id;
    $this->bahasa_id = $bibliografi->bahasa_id;
    $this->tipe_koleksi_id = $bibliografi->tipe_koleksi_id;
    $this->penerbit_id = $bibliografi->penerbit_id;
    $this->klasifikasi = $bibliografi->klasifikasi;
    $this->catatan = $bibliografi->catatan;
    $this->spec_detail_info = $bibliografi->spec_detail_info;
    $this->frekuensi_id = $bibliografi->frekuensi_id;
    $this->volume = $bibliografi->volume;
    $this->gambar = $bibliografi->gambar;
    $this->penulis_id = $bibliografi->penulis->pluck('id')->toArray();
    $this->topik_id = $bibliografi->topik->pluck('id')->toArray();

if ($bibliografi->lampiran && $bibliografi->lampiran->count() > 0) {
    $lampiran = $bibliografi->lampiran->first();
    $this->lampiran = [
        'judul' => $lampiran->judul,
        'deskripsi' => $lampiran->deskripsi,
        'tipe_akses' => $lampiran->tipe_akses,
        'nama_file' => $lampiran->nama_file,
    ];
}

    $this->dispatch('open-modal'); // opsional, untuk buka modal edit
}

// 2. Update data bibliografi
public function updateBibliografi()
{
    $this->validate(); // pakai rules() yang sudah dibuat

    try {
        $bibliografi = Bibliografi::findOrFail($this->editId);

        $path = $this->gambar instanceof \Livewire\TemporaryUploadedFile
            ? $this->gambar->store('bibliografi', 'public')
            : $bibliografi->gambar;

        $nama_file = $this->lampiran['nama_file'] instanceof \Livewire\TemporaryUploadedFile
            ? $this->lampiran['nama_file']->store('bibliografi', 'public')
            : $this->lampiran['nama_file'];

        $bibliografi->update([
            'judul'  => $this->judul,
            'edisi'  => $this->edisi,
            'isbn_issn' => $this->isbn_issn,
            'tahun_terbit' => $this->tahun_terbit,
            'collation' => $this->collation,
            'judul_seri' => $this->judul_seri,
            'call_number' => $this->call_number,
            'gmd_id' => $this->gmd_id,
            'bahasa_id' => $this->bahasa_id,
            'tipe_koleksi_id' => $this->tipe_koleksi_id,
            'penerbit_id' => $this->penerbit_id,
            'klasifikasi' => $this->klasifikasi,
            'catatan' => $this->catatan,
            'spec_detail_info' => $this->spec_detail_info,
            'frekuensi_id' => $this->frekuensi_id,
            'is_etalase_hide' => 1,
            'is_promosi' => 1,
            'gambar' => $path,
            'volume' => $this->volume,
        ]);

        // Update relasi penulis
        $bibliografi->penulis()->sync($this->penulis_id);

        // Update relasi topik
        $bibliografi->topik()->sync($this->topik_id);

        // Update lampiran
if ($bibliografi->lampiran && $bibliografi->lampiran->count() > 0) {
    $lampiran = $bibliografi->lampiran->first();
    $lampiran->update([
        'judul' => $this->lampiran['judul'],
        'deskripsi' => $this->lampiran['deskripsi'],
        'tipe_akses' => $this->lampiran['tipe_akses'],
        'nama_file' => $nama_file,
    ]);
} else if ($this->lampiran['judul'] && $nama_file) {
            Lampiran::create([
                'bibliografi_id' => $bibliografi->id,
                'judul' => $this->lampiran['judul'],
                'deskripsi' => $this->lampiran['deskripsi'],
                'tipe_akses' => $this->lampiran['tipe_akses'],
                'nama_file' => $nama_file
            ]);
        }

        session()->flash('success', 'Bibliografi berhasil diperbarui.');
        $this->dispatch('close-modal');
        $this->resetInput();
    } catch (Exception $e) {
        session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

// 3. Delete bibliografi
public function deleteBibliografi($id)
{
    try {
        $bibliografi = Bibliografi::findOrFail($id);

        // Hapus relasi penulis dan topik (many-to-many)
        $bibliografi->penulis()->detach();
        $bibliografi->topik()->detach();

        // Hapus lampiran jika ada

        if ($bibliografi->lampiran && $bibliografi->lampiran->count() > 0) {
    foreach ($bibliografi->lampiran as $lampiran) {
        if ($lampiran->nama_file && \Storage::disk('public')->exists($lampiran->nama_file)) {
            \Storage::disk('public')->delete($lampiran->nama_file);
        }
        $lampiran->delete();
    }
    }

        // Hapus gambar bibliografi jika ada
        if ($bibliografi->gambar && \Storage::disk('public')->exists($bibliografi->gambar)) {
            \Storage::disk('public')->delete($bibliografi->gambar);
        }

        $bibliografi->delete();

        session()->flash('success', 'Bibliografi berhasil dihapus.');
    } catch (Exception $e) {
        session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

        public function render()
        {
            $items = Bibliografi::with('penulis', 'penerbit', 'topik', 'lampiran')
    ->when($this->search, function($q) {
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
?>
