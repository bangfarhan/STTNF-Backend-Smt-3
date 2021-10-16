<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Tugas Backend Topic 3
    </title>
  </head>
  <body>
    <div class="container mt-5">
      <?php
# membuat class Animal
class Animal
{
# property animals
public $animals = [];
# method constructor - mengisi data awal
# parameter: data hewan (array)
public function __construct($data)
{
$this->animals = $data;
}
# method index - menampilkan data animals
public function index()
{
# gunakan foreach untuk menampilkan data animals (array)
foreach ($this->animals as $animal) {
echo $animal;
echo "<br>";
}
}
# method store - menambahkan hewan baru
# parameter: hewan baru
public function store($data)
{
# gunakan method array_push untuk menambahkan data baru
array_push( $this->animals, $data);
}
# method update - mengupdate hewan
# parameter: index dan hewan baru
public function update($index, $data)
{
$replac = [$data];
$this->animals[$index] = $replac[0];
}
# method delete - menghapus hewan
# parameter: index
public function destroy($index)
{
# gunakan method unset atau array_splice untuk menghapus data array
unset($this->animals[$index]);
}
}
# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['Ayam','Burung']);
echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";
echo "Store - Menambahkan hewan baru <br>";
$animal->store('burung');
$animal->index();
echo "<br>";
echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";
echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";
?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
  </body>
</html>