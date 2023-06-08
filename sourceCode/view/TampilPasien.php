<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil($id)
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td> <a href='index.php?editForm&id=" . $this->prosespasien->getId($i) . "'><button type='button' class='btn btn-success'>Edit</button></a>
			<a href='index.php?delete&id=" . $this->prosespasien->getId($i) . "'><button type='button' class='btn btn-danger' >Delete</button></a></td>";
		}

		if ($id == null) {
			$add = '
				<div class="container-fluid d-flex">
				<div class="col-lg-3 col-md-4 col-sm-4 col-4">
					<div class="card p-3 mr-6">
					<h2 class="card-title">Add Pasien</h2>
					<form action="index.php" method="POST">
						<div class="form-row">
						<div class="form-group col">
							<label for="tjudul">NIK</label>
							<input type="text" class="form-control" name="nik" required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Nama</label>
							<input type="text" class="form-control" name="nama" required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Tempat</label>
							<input type="text" class="form-control" name="tempat" required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Tanggal Lahir</label>
							<input type="date" class="form-control" name="ttl" required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tauthor">Jenis Kelamin</label>
							<select class="custom-select form-control" name="kelamin">
							<option value="Laki - Laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Email</label>
							<input type="email" class="form-control" name="email" required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">No telepon</label>
							<input type="text" class="form-control" name="telp" required />
						</div>
						</div>
			
						<button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
					</form>
					</div>
				</div>';
		}else{
			$j = $this->prosespasien->getIndex($id);
			$add = '
				<div class="container-fluid d-flex">
				<div class="col-lg-3 col-md-4 col-sm-4 col-4">
					<div class="card p-3 mr-6">
					<h2 class="card-title">Add Pasien</h2>
					<form action="index.php" method="POST">
						<div class="form-row">
						<div class="form-group col">
							<label for="tjudul">NIK</label>
							<input type="hidden" class="form-control" name="id" value = "'. $this->prosespasien->getId($j) . '" required />
							<input type="text" class="form-control" name="nik" value = "'. $this->prosespasien->getNik($j) . '" required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Nama</label>
							<input type="text" class="form-control" name="nama" value = "'. $this->prosespasien->getNama($j) . '" required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Tempat</label>
							<input type="text" class="form-control" name="tempat" value = "'. $this->prosespasien->getTempat($j) . '"  required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Tanggal Lahir</label>
							<input type="date" class="form-control" name="ttl" value = "'. $this->prosespasien->getTl($j) . '"  required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tauthor">Jenis Kelamin</label>
							<select class="custom-select form-control" name="kelamin"  value = "'. $this->prosespasien->getGender($j) . '" >
							<option value="Laki-laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">Email</label>
							<input type="email" class="form-control" name="email" value = "'. $this->prosespasien->getEmail($j) . '"  required />
						</div>
						</div>
			
						<div class="form-row">
						<div class="form-group col">
							<label for="tpenerbit">No telepon</label>
							<input type="text" class="form-control" name="telp" value = "'. $this->prosespasien->getTelp($j) . '"  required />
						</div>
						</div>
			
						<button type="submit" name="edit" class="btn btn-primary mt-3">Edit</button>
					</form>
					</div>
				</div>';
		}
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_ADDEDIT", $add);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function addData($nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$this->prosespasien->addData($nik, $nama, $tempat, $tl, $gender, $email, $telp);
		header("location:index.php");
	}

	function editData($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$this->prosespasien->editData($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
		header("location:index.php");
	}

	function deleteData($id)
	{
		$this->prosespasien->deleteData($id);
		header("location:index.php");
	}
}
