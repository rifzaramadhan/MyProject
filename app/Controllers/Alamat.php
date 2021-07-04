<?php

namespace App\Controllers;

use App\Models\AlamatModel;
use CodeIgniter\HTTP\Request;

class Alamat extends BaseController
{
    protected $alamatModel;
    protected $validasi;
    public function __construct()
    {
        $this->alamatModel = new AlamatModel();
    }
    public function index()
    {

        $alamat = $this->alamatModel->findAll();
        //dd($alamat);
        $data = [
            'alamat' => $this->alamatModel->getAlamat()
        ];
        return view('alamatView/index', $data);
    }

    // public function validasi()
    // {

    // }


    public function detail($slug)
    {
        // $alamat = $this->alamatModel->getAlamat($slug);
        // dd($alamat);
        $data = [
            'alamat' => $this->alamatModel->getAlamat($slug)
        ];

        if (empty($data['alamat'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Alamat' . $slug . 'tidak ditemukan.');
        }
        return view('alamatView/detail', $data);
    }

    public function create()
    {
        $data = [
            'alamat' => $this->alamatModel->getAlamat(),
            'validation' => \Config\Services::validation()
        ];
        //dd($data['validation']);
        return view('alamatView/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_usaha' => [
                'rules' => 'required|is_unique[alamat.nm_usaha]',
                'errors' => [
                    'required' => 'Nama perusahaan harus diisi. ',
                    'is_unique' => 'Nama perusahaan sudah terdaftar'
                ]
            ],
            'nama_pic' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama PIC perusahaan harus diisi. ',
                ]
            ],
            'alamat_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat perusahaan harus diisi. ',
                ]
            ],
            'telp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor telephone perusahaan harus diisi. ',
                    'numeric' => 'Yang anda inputkan bukan angka'
                ]
            ],
            'koordinat_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Koordinat perusahaan harus diisi. ',
                ]
            ],
            'fotoDepan' => [
                'rules' => 'max_size[fotoDepan,2048]|is_image[fotoDepan]|mime_in[fotoDepan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar. ',
                    'is_image' => 'File yang anda upload bukan gambar. ',
                    'is_mime' => 'File yang anda upload bukan gambar. ',
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            //dd($validation);
            // return redirect()->to('/alamat/create')->withInput()->with('validation', $validation);
            return redirect()->to('/alamat/create')->withInput();
        }

        $fileFoto = $this->request->getFile('fotoDepan');

        if ($fileFoto->getError() == 4) {
            $namaFoto = 'jenengku.jpg';
        } else {
            $namaFoto = $fileFoto->getRandomName();

            $fileFoto->move('img/imgAlamat', $namaFoto);
        }

        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('nama_usaha'), '-', true);
        $this->alamatModel->save([
            'nm_usaha' => $this->request->getVar('nama_usaha'),
            'slug_nm_usaha' => $slug,
            'nm_alamat' => $this->request->getVar('nama_pic'),
            'dt_alamat' => $this->request->getVar('alamat_usaha'),
            'no_telp' => $this->request->getVar('telp'),
            'koordinat' => $this->request->getVar('koordinat_usaha'),
            'foto_depan' => $namaFoto
        ]);

        session()->setFlashdata('Pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/alamat');
    }

    public function delete()
    {


        $id_alamat = $this->request->getVar('id_alamat');
        $alamat = $this->alamatModel->find($id_alamat);

        if ($alamat['foto_depan'] != 'jenengku.jpg') {
            //hapus gambar
            $pathFoto = PUBPATH . "\/img\/imgAlamat\/" . $alamat['foto_depan'];
            //chmod($pathFoto, 0777)
            // dd($pathFoto);
            // dd(PUBPATH);
            unlink($pathFoto);
            //dd(file_exists($pathFoto));
        }

        $this->alamatModel->where('id_alamat', $id_alamat)->delete();
        session()->setFlashdata('Pesan', 'Data berhasil dihapus.');
        // $this->alamatModel->delete($id_alamat);
        return redirect()->to('/alamat');
        //return "cek";
    }

    public function edit($slug)
    {
        $data = [
            'alamat' => $this->alamatModel->getAlamat($slug),
            'validation' => \Config\Services::validation()
        ];
        //dd($this->alamatModel->getAlamat($slug));

        return view('alamatView/edit', $data);
    }

    public function update($id)
    {
        $alamatLama = $this->alamatModel->getAlamat($this->request->getVar('slug'));
        if ($alamatLama['nm_usaha'] == $this->request->getVar('nama_usaha')) {
            $ruleAlamat = 'required';
        } else {
            $ruleAlamat = 'required|is_unique[alamat.nm_usaha]';
        }
        if (!$this->validate([
            'nama_usaha' => [
                'rules' => $ruleAlamat,
                'errors' => [
                    'required' => 'Nama perusahaan harus diisi. ',
                    'is_unique' => 'Nama perusahaan sudah terdaftar'
                ]
            ],
            'nama_pic' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama PIC perusahaan harus diisi. ',
                ]
            ],
            'alamat_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat perusahaan harus diisi. ',
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telephone perusahaan harus diisi. ',
                ]
            ],
            'koordinat_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Koordinat perusahaan harus diisi. ',
                ]
            ],
            'fotoDepan' => [
                'rules' => 'max_size[fotoDepan,2048]|is_image[fotoDepan]|mime_in[fotoDepan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar. ',
                    'is_image' => 'File yang anda upload bukan gambar. ',
                    'is_mime' => 'File yang anda upload bukan gambar. ',
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            //dd($validation);
            //return redirect()->to(base_url() . '/alamat/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/alamat/edit/' . $this->request->getVar('slug'))->withInput();
        }
        // dd($this->request->getVar());
        $fileFoto = $this->request->getFile('fotoDepan');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();

            $fileFoto->move('img/imgAlamat', $namaFoto);

            $pathFoto = PUBPATH . "\/img\/imgAlamat\/" . $this->request->getVar('fotoLama');
            unlink($pathFoto);
        }

        $slug = url_title($this->request->getVar('nama_usaha'), '-', true);
        $this->alamatModel->save([
            'id_alamat' => $id,
            'nm_usaha' => $this->request->getVar('nama_usaha'),
            'slug_nm_usaha' => $slug,
            'nm_alamat' => $this->request->getVar('nama_pic'),
            'dt_alamat' => $this->request->getVar('alamat_usaha'),
            'no_telp' => $this->request->getVar('telp'),
            'koordinat' => $this->request->getVar('koordinat_usaha'),
            'foto_depan' => $namaFoto
        ]);

        session()->setFlashdata('Pesan', 'Data berhasil diubah.');
        return redirect()->to('/alamat');
    }
}
