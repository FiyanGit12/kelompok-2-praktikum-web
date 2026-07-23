<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProdukModel();
    }

    // ─── READ ────────────────────────────────────────────────────────────
    public function index()
    {
        $data = [
            'title'   => 'PawStore — Manajemen Produk',
            'produk'  => $this->model->findAll(),
        ];
        return view('produk/index', $data);
    }

    // ─── CREATE ──────────────────────────────────────────────────────────
    public function tambah()
    {
        if ($this->request->getMethod() === 'POST') {
            $insert = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'kategori'    => $this->request->getPost('kategori'),
                'harga'       => (int) $this->request->getPost('harga'),
                'stok'        => (int) $this->request->getPost('stok'),
                'deskripsi'   => $this->request->getPost('deskripsi'),
                'gambar'      => $this->request->getPost('gambar'),
            ];
            $this->model->insert($insert);
            return redirect()->to(base_url('/produk'))->with('success', 'Produk berhasil ditambahkan!');
        }
        return view('produk/tambah', ['title' => 'Tambah Produk Baru']);
    }

    // ─── UPDATE (modal inline — edit dibuka via JS di halaman index) ─────
    public function edit($id)
    {
        if ($this->request->getMethod() === 'POST') {
            $update = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'kategori'    => $this->request->getPost('kategori'),
                'harga'       => (int) $this->request->getPost('harga'),
                'stok'        => (int) $this->request->getPost('stok'),
                'deskripsi'   => $this->request->getPost('deskripsi'),
                'gambar'      => $this->request->getPost('gambar'),
            ];
            $this->model->update($id, $update);
            return redirect()->to(base_url('/produk'))->with('success', 'Produk berhasil diperbarui!');
        }

        // GET: modal sudah dibuka via JavaScript di index,
        // tidak perlu render view terpisah — redirect saja ke index
        return redirect()->to(base_url('/produk'));
    }

    // ─── DELETE ───────────────────────────────────────────────────────────
    public function hapus($id)
    {
        $this->model->delete($id);
        return redirect()->to(base_url('/produk'))->with('success', 'Produk berhasil dihapus!');
    }
}
